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

  const WEB_DIR  = ROOT_DIR . '/web';
  const SCSS_DIR = self::WEB_DIR . '/scss';
  const CSS_DIR  = self::WEB_DIR . '/css';
  const JS_DIR   = self::WEB_DIR . '/js';

  public static function render($template, array $vars = []): string
  {
    if (static::isMarkdown($template))
    {
      return static::markdownToHtml(static::getFullPath($template));
    }

    if (!static::exists($template) || substr_count($template, '/') !== 1)
    {
      throw new InvalidArgumentException(sprintf('The template "%s" does not exist or is unreadable.', $template));
    }

    list($module, $view) = explode('/', $template);

    $isPartial   = $view[0] === '_';
    $actionClass = ucfirst($module) . 'Actions';
    $method      = 'prepare' . ucfirst(ltrim($view, '_')) . ($isPartial ? 'Partial' : '');

    if (method_exists($actionClass, $method))
    {
      $vars = $actionClass::$method($vars);
    }

    if ($vars === null)
    {
      return [];
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

  public static function markdownToHtml($path): string
  {
    return ParsedownExtra::instance()->text(trim(file_get_contents($path)));
  }

  public static function exists($template): bool
  {
    return is_readable(static::getFullPath($template));
  }

  protected static function isMarkdown($nameOrPath): bool
  {
    return strlen($nameOrPath) > 3 && substr($nameOrPath, -3) == '.md';
  }

  protected static function getFullPath($template): string
  {
    if ($template && $template[0] == '/')
    {
      return $template;
    }

    if (static::isMarkdown($template))
    {
      return ContentActions::CONTENT_DIR . '/' . $template;
    }

    return ROOT_DIR . '/view/template/' . $template . '.php';
  }

  public static function imagePath($image): string
  {
    return '/img/' . $image;
  }

  public static function parseMarkdown($template): array
  {
    $path = static::getFullPath($template);
    list($ignored, $frontMatter, $markdown) = explode('---', file_get_contents($path), 3);
    $metadata = Spyc::YAMLLoadString(trim($frontMatter));
    $html     = ParsedownExtra::instance()->text(trim($markdown));
    return [$metadata, $html];
  }

  public static function compileCss()
  {
    $scssCompiler = new \Leafo\ScssPhp\Compiler();

    $scssCompiler->setImportPaths([self::SCSS_DIR]);

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

    $all_css = $scssCompiler->compile(file_get_contents(self::SCSS_DIR . '/all.scss'));
    file_put_contents(self::CSS_DIR . '/all.css', $all_css);

    $yt2_css = $scssCompiler->compile(file_get_contents(self::SCSS_DIR . '/yt2.scss'));
    file_put_contents(self::CSS_DIR . '/yt2.css', $yt2_css);
  }

  public static function gzipAssets()
  {
    foreach ([self::CSS_DIR => 'css', self::JS_DIR => 'js'] as $dir => $ext)
    {
      foreach (glob("$dir/*.$ext") as $file)
      {
        Gzip::compressFile($file);
      }
    }
  }

  protected static function interpolateTokens($html): string
  {
    return preg_replace_callback('/{{[\w\.]+}}/is', function ($m)
    {
      return i18n::translate(trim($m[0], '}{'));
    }, $html);
  }

  protected static function escapeOnce($value): string
  {
    return preg_replace('/&amp;([a-z]+|(#\d+)|(#x[\da-f]+));/i', '&$1;', htmlspecialchars((string)$value, ENT_QUOTES, 'utf-8'));
  }

  protected static function attributesToHtml($attributes): string
  {
    return implode('', array_map(function ($k, $v)
    {
      return $v === true ? " $k" : ($v === false || $v === null || ($v === '' && $k != 'value') ? '' : sprintf(' %s="%s"', $k, static::escapeOnce($v)));
    }, array_keys($attributes), array_values($attributes)));
  }

  public static function renderTag($tag, $attributes = []): string
  {
    return $tag ? sprintf('<%s%s />', $tag, static::attributesToHtml($attributes)) : '';
  }

  public static function renderContentTag($tag, $content = null, $attributes = []): string
  {
    return $tag ? sprintf('<%s%s>%s</%s>', $tag, static::attributesToHtml($attributes), $content, $tag) : '';
  }

  public static function renderJson($data): array
  {
    Response::setHeader(Response::HEADER_CONTENT_TYPE, 'application/json');
    return ['internal/json', ['json' => $data, '_no_layout' => true]];
  }
}