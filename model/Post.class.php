<?php

class PostNotFoundException extends Exception
{
}

class PostMalformedException extends Exception
{
}

class Post
{
    const SORT_DATE_DESC = 'sort_date_desc',
        SORT_ORD_ASC = 'sort_ord_asc';

    protected static $slugMap = [];
    protected $path;
    protected $slug;
    protected $title;
    protected $metadata;
    protected $author;
    protected $date;
    protected $markdown;
    protected $contentText;
    protected $contentHtml;
    protected $cover;
    protected $postType;
    protected $category;
    protected $isCoverLight = false;

    public static function load($relativeOrAbsolutePath)
    {
        $pathTokens = explode('/', $relativeOrAbsolutePath);
        if (count($pathTokens) <= 1) {
            throw new LogicException('Cannot load a post without a path.');
        }

        $postType = $pathTokens[count($pathTokens) - 2];
        $filename = $pathTokens[count($pathTokens) - 1];
        $isRelative = $relativeOrAbsolutePath[0] != '/';
        $slug = strpos($filename, '.md') !== false ? static::getSlugFromFilename($filename) : $filename;
        $path = ($isRelative ? ContentActions::CONTENT_DIR . '/' : '') .
              $relativeOrAbsolutePath .
              (substr($filename, -3) !== '.md' ? '.md' : '');

        if (!file_exists($path) && $isRelative) { //may have come in without a post number
            if ($isRelative) {
                $slugMap = static::getSlugMap($postType);
                if (isset($slugMap[$slug])) {
                    return static::load($slugMap[$slug]);
                }
            }
            throw new PostNotFoundException('No post found for path: ' . $relativeOrAbsolutePath);
        }

        list($ignored, $frontMatter, $content) = explode('---', file_get_contents($path), 3) + ['','',''];
        if (!$frontMatter || !$content) {
            throw new PostMalformedException('Post "' . basename($path) . '" is missing front matter or content');
        }
        return new static($path, $postType, $slug, Spyc::YAMLLoadString(trim($frontMatter)), trim($content));
    }

    public function __construct($path, $postType, $slug, $frontMatter, $markdown)
    {
        $this->path = $path;
        $this->postType = $postType;
        $this->slug = $slug;
        $this->markdown = $markdown;
        $this->metadata = $frontMatter;
        $this->title = $frontMatter['title'] ?? null;
        $this->author = $frontMatter['author'] ?? null;
        $this->date = isset($frontMatter['date']) ? new DateTime($frontMatter['date']) : null;
        $this->cover = $frontMatter['cover'] ?? null;
        $this->isCoverLight = isset($frontMatter['cover-light']) && $frontMatter['cover-light'] == 'true';
        $this->category = $frontMatter['category'] ?? null;
    }

    public static function find($folder, $sort = null)
    {
        $posts = [];
        foreach (glob(rtrim($folder, '/') . '/*.md') as $file) {
            $posts[] = static::load($file);
        }

        if ($sort) {
            switch ($sort) {
        case static::SORT_DATE_DESC:
          usort($posts, function (Post $a, Post $b) {
              return strcasecmp($b->getDate()->format('Y-m-d'), $a->getDate()->format('Y-m-d'));
          });
          break;

        case static::SORT_ORD_ASC:
          usort($posts, function (Post $a, Post $b) {
              $aMeta = $a->getMetadata();
              $bMeta = $b->getMetadata();
              if (!isset($aMeta['order']) && !isset($bMeta['order'])) {
                  return $a->getTitle() < $b->getTitle() ? -1 : 1;
              }
              if (isset($aMeta['order']) && isset($bMeta['order'])) {
                  return $aMeta['order'] < $bMeta['order'] ? -1 : 1;
              }
              return isset($aMeta['order']) ? -1 : 1;
          });
          break;
      }
        }
        return $posts;
    }

    public static function filter(array $posts, array $filters)
    {
        return array_filter($posts, function (Post $post) use ($filters) {
            $metadata = $post->getMetadata();
            foreach ($filters as $filterAttr => $filterValue) {
                if (!isset($metadata[$filterAttr]) || (
            ($metadata[$filterAttr] != $filterValue) &&
            (!is_array($metadata[$filterAttr]) || !in_array($filterValue, $metadata[$filterAttr]))
        )) {
                    return false;
                }
            }
            return true;
        });
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function getMetadataItem($key, $default = null)
    {
        return $this->metadata[$key] ?? $default;
    }

    public function setMetadataItem($key, $value)
    {
        $this->metadata[$key] = $value;
    }

    public function getRelativeUrl()
    {
        return '/' . $this->postType . '/' . $this->slug;
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

    public function getAuthorGithubID()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);
        if (array_key_exists("github", $post)) {
            return $post["github"];
        }
    }

    public function getAuthorTwitterID()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);
        if (array_key_exists("twitter", $post)) {
            return $post["twitter"];
        }
    }

    public function getAuthorEmail()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);
        if (array_key_exists("email", $post)) {
            return $post["email"];
        }
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
        if ($this->markdown && !$this->contentText) {
//      $this->contentText = $this->markdownToText(trim($this->markdown));
            $this->contentText = html_entity_decode(str_replace('&nbsp;', ' ', strip_tags($this->getContentHtml())), ENT_COMPAT, 'utf-8');
        }

        return $wordLimit === null ? $this->contentText : $this->limitWords($this->contentText, $wordLimit, $appendEllipsis);
    }

    public function getContentHtml()
    {
        if ($this->markdown && !$this->contentHtml) {
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

    public function getAuthorName()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);

        return $post["name"];
    }

    public function getAuthorPostEmail()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);

        return $post["email"];
    }

    public function getAuthorPhoto()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);

        return $post['imgSrc'];
    }

    public function getAuthorBioHtml()
    {
        $post = ContentActions::prepareBioPartial(['person' =>$this->author]);

        return $post["bioHtml"];
    }

    public function getCoverBackgroundStyle($maxStyles)
    {
        return $this->getPostNum() % $maxStyles + 1;
    }

    public function getImageUrls()
    {
        $urls = [];

        $cover = $this->getCover();
        if ($cover) {
            $urls[] = 'https://' .  Request::getHost() . '/img/blog-covers/' . $cover;
        }

        $matches = [];
        preg_match_all('/!\[.*?\]\((.*?)\)/', $this->markdown, $matches);

        if ($matches) {
            $urls = array_merge($urls, $matches[1]);
        }

        return $urls;
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
        if ($numWords > $wordLimit) {
            array_pop($words);
        }

        $string = implode(' ', $words);

        if ($appendEllipsis && $numWords > $wordLimit) {
            $ellipsis = '…';
            $string .= $ellipsis;
        }

        return $string;
    }

    public static function getSlugFromFilename($filename)
    {
        return strtolower(preg_replace('#^\d{1,3}\-#', '', basename(trim($filename), '.md')));
    }

    public static function collectMetadata(array $posts, $field)
    {
        $values = array_unique(array_map(function (Post $post) use ($field) {
            $metadata = $post->getMetadata();
            return $metadata[$field] ?? null;
        }, $posts));
        sort($values);
        return array_combine($values, $values);
    }

    public static function getSlugMap($postType)
    {
        if (!isset(static::$slugMap[$postType])) {
            static::$slugMap[$postType] = [];
            $files = glob(ContentActions::CONTENT_DIR . '/' . $postType . '/*.md');
            usort($files, 'strnatcasecmp');
            foreach ($files as $file) {
                static::$slugMap[$postType][static::getSlugFromFilename($file)] = $file;
            }
        }
        return static::$slugMap[$postType];
    }

    public function getGithubEditUrl()
    {
        return 'https://github.com/lbryio/lbry.io/tree/master' . str_replace(ROOT_DIR, '', $this->path);
    }
}
