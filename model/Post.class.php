<?php

class Post
{
  const SORT_DATE_DESC = 'sort_date_desc';

  protected static $slugMap = [];
  protected $slug, $title, $author, $date, $markdown, $contentText, $contentHtml, $cover, $postType, $category;
  protected $isCoverLight = false;

  public static function load($relativeOrAbsolutePath)
  {
    $pathTokens = explode('/', $relativeOrAbsolutePath);
    if (count($pathTokens) <= 1)
    {
      throw new LogicException('Cannot load a post without a path.');
    }
    $postType = $pathTokens[count($pathTokens) - 2];
    $filename = $pathTokens[count($pathTokens) - 1];
    $isRelative = $relativeOrAbsolutePath[0] != '/';
    $slug = strpos($filename, '.md') !== false ? static::getSlugFromFilename($filename) : $filename;
    $path = ($isRelative ? ROOT_DIR . '/posts/' : '') .
              $relativeOrAbsolutePath .
              (substr($filename, -3) !== '.md' ? '.md' : '');

    if (!file_exists($path) && $isRelative) //may have come in without a post number
    {
      if ($isRelative)
      {
        $slugMap = static::getSlugMap($postType);
        if (isset($slugMap[$slug]))
        {
          return static::load($slugMap[$slug]);
        }
      }
      throw new InvalidArgumentException('No post found for path: ' . $relativeOrAbsolutePath);
    }

    list($ignored, $frontMatter, $content) = explode('---', file_get_contents($path), 3);
    return new static($postType, $slug, Spyc::YAMLLoadString(trim($frontMatter)), trim($content));
  }

  public function __construct($postType, $slug, $frontMatter, $markdown)
  {
    $this->postType = $postType;
    $this->slug = $slug;
    $this->markdown = $markdown;
    $this->title = isset($frontMatter['title']) ? $frontMatter['title'] : null;
    $this->author = isset($frontMatter['author']) ? $frontMatter['author'] : null;
    $this->date = isset($frontMatter['date']) ? new DateTime($frontMatter['date']) : null;
    $this->cover = isset($frontMatter['cover']) ? $frontMatter['cover'] : null;
    $this->isCoverLight = isset($frontMatter['cover-light']) && $frontMatter['cover-light'] == 'true';
    $this->category = isset($frontMatter['category']) ? $frontMatter['category'] : null;
  }

  public static function find($folder, $sort = null)
  {
    $posts = [];
    foreach(glob(rtrim($folder, '/') . '/*.md') as $file)
    {
      $posts[] = static::load($file);
    }
    if ($sort)
    {
      switch ($sort)
      {
        case static::SORT_DATE_DESC:
          usort($posts, function(Post $a, Post $b) {
            return strcasecmp($b->getDate()->format('Y-m-d'), $a->getDate()->format('Y-m-d'));
          });
          break;
      }
    }
    return $posts;
  }

  public function getRelativeUrl()
  {
    return $this->postType . '/' . $this->slug;
  }

  public function getSlug()
  {
    return $this->slug;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getAuthor()
  {
    return $this->author;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function getCover()
  {
    return $this->cover;
  }

  public function getIsCoverLight()
  {
    return $this->isCoverLight;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public function getContentText($wordLimit = null, $appendEllipsis = false)
  {
    if ($this->markdown && !$this->contentText)
    {
//      $this->contentText = $this->markdownToText(trim($this->markdown));
      $this->contentText = html_entity_decode(str_replace('&nbsp;', ' ', strip_tags($this->getContentHtml())), ENT_COMPAT, 'utf-8');
    }

    return $wordLimit === null ? $this->contentText : $this->limitWords($this->contentText, $wordLimit, $appendEllipsis);
  }

  public function getContentHtml()
  {
    if ($this->markdown && !$this->contentHtml)
    {
      $this->contentHtml = ParsedownExtra::instance()->text(trim($this->markdown));
    }
    return $this->contentHtml;
  }

  public function getPostNum()
  {
    return array_search($this->getSlug(), array_keys(static::getSlugMap($this->postType)));
  }

  public function getPrevPost()
  {
    $slugs = array_keys(Post::getSlugMap($this->postType));
    $postNum = $this->getPostNum();
    return $postNum === false || $postNum === 0 ? null : Post::load($this->postType . '/' . $slugs[$postNum-1]);
  }

  public function getNextPost()
  {
    $slugs = array_keys(Post::getSlugMap($this->postType));
    $postNum = $this->getPostNum();
    return $postNum === false || $postNum >= count($slugs)-1 ? null : Post::load($this->postType . '/' . $slugs[$postNum+1]);
  }

  public function hasAuthor()
  {
    return $this->author !== null;
  }

  public function hasDate()
  {
    return $this->date !== null;
  }

  public function hasPrevNext()
  {
    return $this->postType == 'post';
  }

  public function getAuthorName()
  {
    switch(strtolower($this->author))
    {
      case 'jeremy':
        return 'Jeremy Kauffman';
      case 'mike':
        return 'Mike Vine';
      case 'jimmy':
        return 'Jimmy Kiselak';
      case 'jack':
        return 'Jack Robison';
      case null:
      case '':
        return '';
      case 'lbry':
      default:
        return 'Samuel Bryan';
    }
  }

  public function getAuthorEmail()
  {
    switch(strtolower($this->author))
    {
      case 'jeremy':
        return 'jeremy@lbry.io';
      case 'mike':
        return 'mike@lbry.io';
      case 'jimmy':
        return 'jimmy@lbry.io';
      case 'jack':
        return 'jack@lbry.io';
      case 'lbry':
      default:
        return 'hello@lbry.io';
    }
  }

  public function getAuthorPhoto()
  {
    switch(strtolower($this->author))
    {
      case 'jeremy':
        return 'jeremy-kauffman-644x450.jpg';
      case 'mike':
        return 'mike-vine-644x450.jpg';
      case 'jimmy':
        return 'jimmy-kiselak-644x450.jpg';
      case 'jack':
        return 'jack-robison-644x450.jpg';
      case 'lbry':
      default:
        return 'spooner-644x450.jpg';
    }
  }

  public function getAuthorBioHtml()
  {
    switch(strtolower($this->author))
    {
      case 'jeremy':
        return '<p>Jeremy is the creator of TopScore (usetopscore.com), LBRY (lbry.io), and that joke where the first two items in your list are serious while the third one is a run-on sentence.</p>';
      case 'mike':
      case 'jimmy':
        return '<p>' . $this->getAuthorName() . ' is one of the founding members of LBRY.</p>';
      case 'jack':
        return '<p>Jack was one of the first people to discover LBRY and took to it so fast he may understand more about it than anyone. He has Asperger\'s Syndrome and is actively involved in the autism community.</p>';
      case 'lbry':
      default:
        return '<p>Much of our writing is a collaboration between LBRY team members, so we use SamueL BRYan to share credit. Sam has become a friend... an imaginary friend... even though we\'re adults...</p>';
    }
  }

  public function getCoverBackgroundStyle($maxStyles)
  {
    return $this->getPostNum() % $maxStyles + 1;
  }

  public function getImageUrls()
  {
    $matches = [];
    preg_match_all('/!\[.*?\]\((.*?)\)/', $this->markdown, $matches);
    return $matches ? $matches[1] : [];
  }

  protected function markdownToText($markdown)
  {
    $replacements = [
//      '/<(.*?)>/' => '$1', // HTML tags
      '/^[=\-]{2,}\s*$/' => '', // setext-style headers
      '/\[\^.+?\](\: .*?$)?/' => '', // footnotes
      '/\s{0,2}\[.*?\]: .*?$/' => '', // footnotes
      '/\!\[.*?\][\[\(].*?[\]\)]/' => '', // images
      '/\[(.*?)\][\[\(].*?[\]\)]/' => '$1', // inline links
      '/^\s*>/' => '', // blockquotes
      '/^\s{1,2}\[(.*?)\]: (\S+)( ".*?")?\s*$/' => '', // reference-style links

      '/\n={2,}/' => '\n', // underlined headers
      '/^\#{1,6}\s*([^#]*)\s*(\#{1,6})?/m' => '$1', // atx-style headers
      '/([\*_]{1,3})(\S.*?\S)\1/' => '$2', // bold/italics
      '/~~/' => '', // strikethrough
      '/(`{3,})(.*?)\1/m' => '$2', // codeblocks
//      '/`{3}.*\n/' => '', // fenced codeblocks
      '/^-{3,}\s*$/' => '', // hr
      '/`(.+?)`/' => '$1', // inline code
      '/\n{2,}/' => '\n\n', // multiple newlines
    ];

    return preg_replace(array_keys($replacements), array_values($replacements), strip_tags($markdown));
  }

  protected function limitWords($string, $wordLimit, $appendEllipsis = false)
  {
    $regexp = '/\s+/u';
    $words = preg_split($regexp, $string, $wordLimit + 1);
    $numWords = count($words);

    # TBB: if there are $wordLimit words or less, this check is necessary
    # to prevent the last word from being lost.
    if ($numWords > $wordLimit)
    {
      array_pop($words);
    }

    $string = implode(' ', $words);

    if ($appendEllipsis && $numWords > $wordLimit)
    {
      $ellipsis = '…';
      $string .= $ellipsis;
    }

    return $string;
  }

  public static function getSlugFromFilename($filename)
  {
    return strtolower(preg_replace('#^\d+\-#', '', basename(trim($filename), '.md')));
  }

  public static function getSlugMap($postType)
  {
    if (!isset(static::$slugMap[$postType]))
    {
      static::$slugMap[$postType] = [];
      foreach(glob(ROOT_DIR . '/posts/' . $postType . '/*.md') as $file)
      {
        static::$slugMap[$postType][static::getSlugFromFilename($file)] = $file;
      }
    }
    return static::$slugMap[$postType];
  }
}