<?php

function js_start()
{
  ob_start('Response::jsOutputCallback');
}

function js_end()
{
  ob_end_flush();
}

/**
 * Description of View
 *
 * @author jeremy
 */
class View
{
  protected static $metaDescription = '',
                   $metaImg = '',
                   $layout = 'basic';

  public static function render($template, array $vars = [])
  {
    if (!static::exists($template) || substr_count($template, '/') !== 1)
    {
      throw new InvalidArgumentException(sprintf('The template "%s" does not exist or is unreadable.', $template));
    }

    list($module, $view) = explode('/', $template);

    $actionClass  = ucfirst($module) . 'Actions';
    $method = 'prepare' . ucfirst($view);

    if (method_exists($actionClass, $method))
    {
      $vars = $actionClass::$method($vars);
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

  public static function setMetaDescription($description)
  {
    static::$metaDescription = $description;
  }

  public static function setMetaImage($url)
  {
    static::$metaImg = $url;
  }

  public static function getMetaDescription()
  {
    return static::$metaDescription ?: 'A Content Revolution';
  }

  public static function getMetaImage()
  {
    return static::$metaImg ?: 'http://lbry.io/img/lbry-dark-1600x528.png';
  }

  public static function setLayout($layout)
  {
    static::$layout = $layout;
  }

  public static function getLayout()
  {
    return static::$layout;
  }
}