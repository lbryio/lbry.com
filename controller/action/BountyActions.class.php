<?php

class BountyActions extends Actions
{
  const URL_BOUNTY_LIST = '/bounty';

  public static function executeList()
  {
    $posts = Post::find(ROOT_DIR . '/posts/bounty');

    $allCategories = array_unique(array_map(function($post) {
      $metadata = $post->getMetadata();
      return isset($metadata['category']) ? $metadata['category'] : null;
    }, $posts));

    uasort($posts, function($postA, $postB) {
      $metadataA = $postA->getMetadata();
      $metadataB = $postB->getMetadata();
      if ($metadataA['award'] != $metadataB['award'])
      {
        return $metadataA['award'] > $metadataB['award'] ? -1 : 1;
      }
      return $metadataA['title'] < $metadataB['title'] ? -1 : 1;
    });

    $completeStatuses = ['any', 'incomplete', 'complete'];

    return ['bounty/list', [
      'posts' => $posts,
      'categories' => $allCategories,
      'completeStatuses' => $completeStatuses
    ]];
  }

  public static function executeShow($relativeUri)
  {
    list($metadata, $postHtml) = View::parseMarkdown(ROOT_DIR . '/posts/' . $relativeUri . '.md');
    if (!$postHtml)
    {
      return ['page/404', []];
    }
    return ['bounty/show', [
      'postHtml' => $postHtml,
      'metadata' => $metadata
    ]];
  }
}