<?php

class BlogActions extends Actions
{
  const URL_STEM = '/news';

  public static function executeIndex()
  {
    $posts = Blog::getPosts();
    usort($posts, function(Post $a, Post $b) {
      return strcasecmp($b->getDate()->format('Y-m-d'), $a->getDate()->format('Y-m-d'));
    });
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    return ['blog/index', [
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

  public static function prepareAuthorPartial(array $vars)
  {
    $post = $vars['post'];
    return [
      'authorName' => $post->getAuthorName(),
      'photoImgSrc' => $post->getAuthorPhoto(),
      'authorBioHtml' => $post->getAuthorBioHtml()
    ];
  }
}
