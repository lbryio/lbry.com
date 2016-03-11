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

$scss = new \Leafo\ScssPhp\Compiler();

$scss->setImportPaths([ROOT_DIR.'/web/scss']);

$compress = true;
if ($compress)
{
  $scss->setFormatter('Leafo\ScssPhp\Formatter\Crunched');
}
else
{
  $scss->setFormatter('Leafo\ScssPhp\Formatter\Expanded');
  $scss->setLineNumberStyle(Leafo\ScssPhp\Compiler::LINE_COMMENTS);
}

file_put_contents(ROOT_DIR.'/web/css/all.css', $scss->compile(file_get_contents(ROOT_DIR.'/web/scss/all.scss')));
