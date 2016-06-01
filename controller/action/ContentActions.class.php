<?php

/**
 * Description of ContentActions
 *
 * @author jeremy
 */
class ContentActions extends Actions
{
  const RSS_SLUG = 'rss.xml',
        URL_NEWS = '/news',
        URL_FAQ = '/faq',
        VIEW_FOLDER_NEWS = ROOT_DIR . '/posts/news',
        VIEW_FOLDER_FAQ = ROOT_DIR . '/posts/faq';

  public static function executeHome()
  {
    return ['content/home', [
      'totalUSD' => CreditApi::getTotalDollarSales(),
      'totalPeople' => CreditApi::getTotalPeople()
    ]];
  }

  public static function executeFaq()
  {
    $posts = Post::find(static::VIEW_FOLDER_FAQ);
    return ['content/faq', [
      'posts' => $posts
    ]];
  }

  public static function executeNews()
  {
    $posts = Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC);
    return ['content/news', [
      'posts' => $posts,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }


  public static function executeRss()
  {
    $posts = Post::find(static::VIEW_FOLDER_NEWS, Post::SORT_DATE_DESC);
    return ['content/rss', [
      'posts' => array_slice($posts, 0, 10),
      '_no_layout' => true
    ], [
      'Content-Type' => 'text/xml; charset=utf-8'
    ]];
  }

  public static function executePost($relativeUri)
  {
    $post = Post::load(ltrim($relativeUri, '/'));
    if (!$post)
    {
      return ['page/404', []];
    }
    return ['content/post', [
      'post' => $post,
      View::LAYOUT_PARAMS => [
        'showRssLink' => true
      ]
    ]];
  }

  public static function preparePostAuthorPartial(array $vars)
  {
    $post = $vars['post'];
    return [
      'authorName' => $post->getAuthorName(),
      'photoImgSrc' => $post->getAuthorPhoto(),
      'authorBioHtml' => $post->getAuthorBioHtml()
    ];
  }
}
