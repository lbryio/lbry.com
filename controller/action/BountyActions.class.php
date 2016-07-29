<?php

class BountyActions extends Actions
{
  const URL_BOUNTY_LIST = '/bounty';

  public static function executeList()
  {
    $selectedStatus = static::param('status');
    $selectedCategory = static::param('category');

    $filters = array_filter(['category' => $selectedCategory, 'status' => $selectedStatus]);
    $allBounties = Post::find(ROOT_DIR . '/posts/bounty');

    $allCategories = array_unique(array_map(function(Post $post) {
      $metadata = $post->getMetadata();
      return isset($metadata['category']) ? $metadata['category'] : null;
    }, $allBounties));

    $bounties = $filters ? Post::filter($allBounties, $filters) : $allBounties;

    uasort($bounties, function($postA, $postB) {
      $metadataA = $postA->getMetadata();
      $metadataB = $postB->getMetadata();
      if ($metadataA['award'] != $metadataB['award'])
      {
        return $metadataA['award'] > $metadataB['award'] ? -1 : 1;
      }
      return $metadataA['title'] < $metadataB['title'] ? -1 : 1;
    });

    return ['bounty/list', [
      'bounties' => $bounties,
      'categories' => $allCategories,
      'selectedCategory' => $selectedCategory,
      'selectedStatus' => $selectedStatus
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