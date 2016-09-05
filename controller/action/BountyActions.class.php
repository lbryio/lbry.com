<?php

class BountyActions extends Actions
{
  const
    SLUG_BOUNTY = 'bounty',
    URL_BOUNTY = '/' . self::SLUG_BOUNTY,
    VIEW_FOLDER_FAQ = ROOT_DIR . '/posts/' . self::SLUG_BOUNTY;

  public static function executeList(string $slug = null): array
  {
    Response::enableHttpCache();

    if ($slug)
    {
      list($metadata, $postHtml) = View::parseMarkdown(static::VIEW_FOLDER_FAQ . '/' . $slug . '.md');
      if (!$postHtml)
      {
        return NavActions::execute404();
      }

      return ['bounty/show', [
        'postHtml' => $postHtml,
        'metadata' => $metadata
      ]];
    }

    $allBounties = Post::find(ROOT_DIR . '/posts/bounty');

    $allCategories = ['' => ''] + Post::collectMetadata($allBounties, 'category');
    $allStatuses = ['' => ''] + array_merge(Post::collectMetadata($allBounties, 'status'), ['complete' => 'unavailable']);

    $selectedStatus = static::param('status', 'available');
    $selectedCategory = static::param('category');

    $filters = array_filter([
      'category' => $selectedCategory && isset($allCategories[$selectedCategory]) ? $selectedCategory : null,
      'status' => $selectedStatus && isset($allStatuses[$selectedStatus]) ? $selectedStatus : null
    ]);

    $bounties = $filters ? Post::filter($allBounties, $filters) : $allBounties;

    uasort($bounties, function($postA, $postB) {
      $metadataA = $postA->getMetadata();
      $metadataB = $postB->getMetadata();
      $awardA = strpos('-', $metadataA['award']) !== false ? rtrim(explode('-', $metadataA['award'])[0], '+') : $metadataA['award'];
      $awardB = strpos('-', $metadataB['award']) !== false ? rtrim(explode('-', $metadataB['award'])[0], '+') : $metadataB['award'];
      if ($awardA != $awardB)
      {
        return $awardA > $awardB ? -1 : 1;
      }
      return $metadataA['title'] < $metadataB['title'] ? -1 : 1;
    });

    return ['bounty/list', [
      'bounties' => $bounties,
      'categories' => $allCategories,
      'statuses' => $allStatuses,
      'selectedCategory' => $selectedCategory,
      'selectedStatus' => $selectedStatus
    ]];
  }
}