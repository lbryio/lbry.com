<?php

class Post
{
  protected $slug, $title, $author, $date, $contentHtml;

  public static function fromFile($filename)
  {
    list($ignored, $frontMatter, $content) = explode('---', file_get_contents($filename), 3);
    return new static(Blog::getSlugFromFilename($filename), Spyc::YAMLLoadString(trim($frontMatter)), trim($content));
  }

  public function __construct($slug, $frontMatter, $markdown)
  {
    $this->slug = $slug;
    $this->title = isset($frontMatter['title']) ? $frontMatter['title'] : null;
    $this->author = isset($frontMatter['author']) ? $frontMatter['author'] : null;
    $this->date = isset($frontMatter['date']) ? new DateTime($frontMatter['date']) : null;
    $this->contentHtml = ParsedownExtra::instance()->text(trim($markdown));
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

  public function getContentHtml()
  {
    return $this->contentHtml;
  }

  public function getPrevPost()
  {
    $slugs = array_keys(Blog::getSlugMap());
    $key = array_search($this->getSlug(), $slugs);
    return $key === false || $key === 0 ? null : Blog::getPost($slugs[$key-1]);
  }

  public function getNextPost()
  {
    $slugs = array_keys(Blog::getSlugMap());
    $key = array_search($this->getSlug(), $slugs);
    return $key === false || $key >= count($slugs)-1 ? null : Blog::getPost($slugs[$key+1]);
  }
}