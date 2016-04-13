<?php

class BlogActions extends Actions
{
  public static function execute($uri)
  {
    $slug = preg_replace('#^/blog(/|$)#', '', $uri);
    if ($slug)
    {
      return static::executePost($slug);
    }
    return static::executeHome();
  }

  public static function executeHome()
  {
    $posts = Blog::getPosts();
    usort($posts, function(Post $a, Post $b) {
      return strcasecmp($b->getDate()->format('Y-m-d'), $a->getDate()->format('Y-m-d'));
    });
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    return ['blog/home', [
      'posts' => $posts,
      'page' => $page
    ]];
  }

  public static function executePost($slug)
  {
    $post = Blog::getPost($slug);
    if (!$post)
    {
      return ['page/404', []];
    }
    return ['blog/post', [
      'post' => $post
    ]];
  }
}
