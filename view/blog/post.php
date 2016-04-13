<?php Response::setMetaDescription($post->getTitle()) ?>
<?php echo View::render('nav/header') ?>
<main class='blog-post'>

  <header class="content">
    <a href="/blog"><< Return to LBRY Front Desk</a>
  </header>

  <div class="content">
    <div class="date" title="<?php echo $post->getDate()->format('F jS, Y') ?>">
      <?php echo $post->getDate()->format('M j') ?>
    </div>
    <h1><?php echo htmlentities($post->getTitle()) ?></h1>
    <?php echo $post->getContentHtml() ?>
  </div>

  <nav class="content prev-next row-fluid">
    <div class="prev span5">
      <?php if ($prevPost = $post->getPrevPost()): ?>
        <div class="prev-next-label">
          <a href="/blog/<?php echo $prevPost->getSlug() ?>"><< Previous</a>
        </div>
        <a class="prev-next-title" href="/blog/<?php echo $prevPost->getSlug() ?>">
          <?php echo htmlentities($prevPost->getTitle()) ?>
        </a>
      <?php endif ?>
    </div>
    <div class="next span2"></div>
    <div class="next span5">
      <?php if ($nextPost = $post->getNextPost()): ?>
        <div class="prev-next-label">
          <a href="/blog/<?php echo $nextPost->getSlug() ?>">Next >></a>
        </div>
        <a class="prev-next-title" href="/blog/<?php echo $nextPost->getSlug() ?>">
          <?php echo htmlentities($nextPost->getTitle()) ?>
        </a>
      <?php endif ?>
    </div>
  </nav>

  <section class="author">
    <div class="content">
      <em>Author</em>
      <?php switch(strtolower($post->getAuthor())):
        case 'jeremy' ?>
        <h2>Jeremy Kauffman</h2>
        <p>
          Jeremy is the creator of TopScore (usetopscore.com), LBRY (lbry.io), and that joke where the first two items in your list are serious while the third one is a run-on sentence.
        </p>
        <?php break ?>
      <?php case 'mike': ?>
        <h2>Mike Vine</h2>
        <?php break ?>
      <?php case 'jimmy': ?>
        <h2>Jimmy Kiselak</h2>
        <?php break ?>
      <?php case 'jack': ?>
        <h2>Jack Robison</h2>
        <p>
          Jack was one of the first people to discover LBRY and took to it so fast he may understand more about it than anyone. He has Asperger's Syndrome and is actively involved in the autism community.
        </p>
        <?php break ?>
      <?php case 'lbry': ?>
        <h2>Samuel Bryan</h2>
        <p>
          Much of our writing is a collaboration between LBRY team members, so we use SamueL BRYan to share credit. Sam has become a friend... an imaginary friend... even though we're adults...
        </p>
        <?php break ?>
      <?php endswitch ?>
    </div>
  </section>

</main>
<?php echo View::render('nav/footer') ?>
