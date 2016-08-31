<?php

function js_start()
{
  ob_start('Response::jsOutputCallback');
}

function js_end()
{
  ob_end_flush();
}

class View
{
  const LAYOUT_PARAMS = '_layout_params';

  public static function render($template, array $vars = [])
  {
    if (!static::exists($template) || substr_count($template, '/') !== 1)
    {
      throw new InvalidArgumentException(sprintf('The template "%s" does not exist or is unreadable.', $template));
    }

    if (static::isMarkdown($template))
    {
      return static::markdownToHtml(static::getFullPath($template));
    }

    list($module, $view) = explode('/', $template);

    $isPartial = $view[0] === '_';
    $actionClass  = ucfirst($module) . 'Actions';
    $method = 'prepare' . ucfirst(ltrim($view, '_')) . ($isPartial ? 'Partial' : '');

    if (method_exists($actionClass, $method))
    {
      $vars = $actionClass::$method($vars);
    }

    if ($vars === null)
    {
      return;
    }

    return static::interpolateTokens(static::getTemplateSafely($template, $vars));
  }

  /**
   * This is its own function because we don't want in-scope variables to leak into the template
   *
   * @param string $___template
   * @param array  $___vars
   *
   * @return string
   * @throws Throwable
   */
  protected static function getTemplateSafely(string $___template, array $___vars): string
  {
    extract($___vars);
    ob_start();
    ob_implicit_flush(0);

    try
    {
      require(static::getFullPath($___template));
      return ob_get_clean();
    }
    catch (Throwable $e)
    {
      // need to end output buffering before throwing the exception
      ob_end_clean();
      throw $e;
    }
  }

  public static function markdownToHtml($path)
  {
    return ParsedownExtra::instance()->text(trim(file_get_contents($path)));
  }

  public static function exists($template)
  {
    return is_readable(static::getFullPath($template));
  }

  protected static function isMarkdown($nameOrPath)
  {
    return strlen($nameOrPath) > 3 && substr($nameOrPath, -3) == '.md';
  }

  protected static function getFullPath($template)
  {
    if ($template && $template[0] == '/')
    {
      return $template;
    }

    if (static::isMarkdown($template))
    {
      return ROOT_DIR . '/posts/' . $template;
    }

    return ROOT_DIR . '/view/template/' . $template . '.php';
  }

  public static function imagePath($image)
  {
    return '/img/' . $image;
  }

  public static function parseMarkdown($template)
  {
    $path = static::getFullPath($template);
    list($ignored, $frontMatter, $markdown) = explode('---', file_get_contents($path), 3);
    $metadata = Spyc::YAMLLoadString(trim($frontMatter));
    $html = ParsedownExtra::instance()->text(trim($markdown));
    return [$metadata, $html];
  }

  public static function compileCss()
  {
    $scssCompiler = new \Leafo\ScssPhp\Compiler();

    $scssCompiler->setImportPaths([ROOT_DIR.'/web/scss']);

    $compress = true;
    if ($compress)
    {
      $scssCompiler->setFormatter('Leafo\ScssPhp\Formatter\Crunched');
    }
    else
    {
      $scssCompiler->setFormatter('Leafo\ScssPhp\Formatter\Expanded');
      $scssCompiler->setLineNumberStyle(Leafo\ScssPhp\Compiler::LINE_COMMENTS);
    }

    $css = $scssCompiler->compile(file_get_contents(ROOT_DIR.'/web/scss/all.scss'));
    file_put_contents(ROOT_DIR.'/web/css/all.css', $css);
  }

  protected static function interpolateTokens($html)
  {
    return preg_replace_callback('/{{[\w\.]+}}/is', function($m) {
      return i18n::translate(trim($m[0], '}{'));
    }, $html);
  }
}