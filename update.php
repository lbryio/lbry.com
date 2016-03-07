#!/usr/bin/php
<?php

include __DIR__.'/bootstrap.php';

chdir(ROOT_DIR);

Shell::exec('rm ./web/css/*');
Shell::exec('git checkout master && git pull');

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
