<?php

class Blog
{
  protected static $slugMap = [];

  public static function getPosts()
  {
    $posts = [];
    foreach(glob(ROOT_DIR.'/blog/posts/*.md') as $file)
    {
      $posts[] = Post::fromFile($file);
    }
    return $posts;
  }

  public static function getPost($slug)
  {
    static::initSlugMap();
    if (isset(static::$slugMap[$slug]) && is_readable(static::$slugMap[$slug]))
    {
      return Post::fromFile(static::$slugMap[$slug]);
    }
    return null;
  }

  public static function getSlugFromFilename($filename)
  {
    return strtolower(preg_replace('#^\d+\-#', '', basename(trim($filename), '.md')));
  }

  protected static function initSlugMap()
  {
    if (!static::$slugMap)
    {
      foreach(glob(ROOT_DIR.'/blog/posts/*.md') as $file)
      {
        static::$slugMap[static::getSlugFromFilename($file)] = $file;
      }
    }
  }

  public static function getSlugMap()
  {
    static::initSlugMap();
    return static::$slugMap;
  }
}