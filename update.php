#!/usr/bin/php
<?php

include __DIR__.'/bootstrap.php';

$options = getopt('f');
$force = isset($options['f']); // update even if no NEEDS_UPDATE file exists

$needsUpdateFile = ROOT_DIR . '/data/writeable/NEEDS_UPDATE';
if (!$force && !file_exists($needsUpdateFile))
{
  echo "No update necessary\n";
  return;
}

@unlink($needsUpdateFile);

chdir(ROOT_DIR);

Shell::exec('git fetch && git reset --hard origin/master');

View::compileCss();
View::gzipAssets();
