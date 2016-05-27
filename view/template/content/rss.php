<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
  <channel>
    <title>LBRY News</title>
    <link>https://lbry.io<?php echo ContentActions::URL_NEWS ?></link>
    <description>Recent news about LBRY</description>
    <generator>https://github.com/lbryio/lbry.io</generator>
    <language>en</language>
    <?php //<lastBuildDate>Sat, 07 Sep 2002 09:42:31 GMT</lastBuildDate> ?>
    <atom:link href="https://lbry.io<?php echo ContentActions::URL_NEWS . '/' . ContentActions::RSS_SLUG ?>" rel="self" type="application/rss+xml" />
    <?php foreach ($posts as $post): ?>
    <item>
      <title><?php echo htmlspecialchars($post->getTitle()) ?></title>
      <link>https://lbry.io<?php echo $post->getRelativeUrl() ?></link>
      <guid>https://lbry.io<?php echo $post->getRelativeUrl() ?></guid>
      <pubDate><?php echo $post->getDate()->format('r') ?></pubDate>
      <author><?php echo htmlspecialchars($post->getAuthorEmail()) ?> (<?php echo htmlspecialchars($post->getAuthorName()) ?>)</author>
      <description><?php echo htmlspecialchars($post->getContentText(50, true)) ?></description>
      <content:encoded><![CDATA[
        <?php echo $post->getContentHtml() ?>
      ]]></content:encoded>
    </item>
    <?php endforeach ?>
  </channel>
</rss>