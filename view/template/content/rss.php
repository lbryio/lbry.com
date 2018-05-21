<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:content="http://purl.org/rss/1.0/modules/content/">
  <channel>
    <title>{{rss.title}}</title>
    <link><?php echo Request::getHostAndProto() . ContentActions::URL_NEWS ?></link>
    <description>{{rss.description}}</description>
    <generator>https://github.com/lbryio/lbry.io</generator>
    <language>{{rss.lang}}</language>
    <?php //<lastBuildDate>Sat, 07 Sep 2002 09:42:31 GMT</lastBuildDate>?>
    <atom:link href="<?php echo Request::getHostAndProto() . ContentActions::URL_NEWS . '/' . ContentActions::SLUG_RSS ?>" rel="self" type="application/rss+xml" />
    <?php foreach ($posts as $post): ?>
    <item>
      <title><?php echo htmlspecialchars($post->getTitle()) ?></title>
      <link><?php echo Request::getHostAndProto() . $post->getRelativeUrl() ?></link>
      <guid><?php echo Request::getHostAndProto() . $post->getRelativeUrl() ?></guid>
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
