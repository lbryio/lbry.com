<?php

/**
 * Description of View
 *
 * @author jeremy
 */
class View
{
  public static function render($template, array $vars = [])
  {
    if (!static::exists($template))
    {
      throw new InvalidArgumentException(sprintf('The template "%s" does not exist or is unreadable.', $template));
    }

    extract($vars);
    ob_start();
    ob_implicit_flush(0);

    try
    {
      require(static::getFullPath($template));
    }
    catch (Exception $e)
    {
      // need to end output buffering before throwing the exception
      ob_end_clean();
      throw $e;
    }

    return ob_get_clean();
  }

  public static function exists($template)
  {
    return is_readable(static::getFullPath($template));
  }

  protected static function getFullPath($template)
  {
    return $_SERVER['ROOT_DIR'] . '/view/' . $template . '.php';
  }

  public static function imagePath($image)
  {
    return '/img/' . $image;
  }
}