<?php

class BlogActions extends Actions
{
  const URL_STEM = '/news';
  const RSS_SLUG = 'rss.xml';

  public static function executeIndex()
  {
    $posts = Blog::getPosts();
    usort($posts, function(Post $a, Post $b) {
      return strcasecmp($b->getDate()->format('Y-m-d'), $a->getDate()->format('Y-m-d'));
    });
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    return ['blog/index', [
      'posts' => $posts,
      'page' => $page,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }

  public static function executeRss()
  {
    $posts = Blog::getPosts();
    usort($posts, function(Post $a, Post $b) {
      return strcasecmp($b->getDate()->format('Y-m-d'), $a->getDate()->format('Y-m-d'));
    });
    return ['blog/rss', [
      'posts' => array_slice($posts, 0, 10),
      '_no_layout' => true
    ], [
      'Content-Type' => 'text/xml; charset=utf-8'
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
      'post' => $post,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
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
