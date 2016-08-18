<?php Response::setMetaDescription('roadmap.description') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main>
  <div class="content content-light spacer2">
    <h1>{{roadmap.title}}</h1>
    <div class="help spacer2">
      Recent, ongoing and upcoming changes to LBRY.
    </div>
    <section class="spacer2">
      <h2>Recent Changes</h2>
      <table class="content full-table" id="changeset-table">
        <?php $setCount = 0 ?>
        <thead>
          <th>Release</th>
          <th>Date</th>
          <th>Notes</th>
        </thead>
        <?php foreach($changesets as $version => $changeset): ?>
          <tr <?php echo ++$setCount > 5 ? 'style="display: none"' : '' ?>>
            <th style="width: 15%">
              <?php echo $version ?>
              <?php if ($changeset['prerelease']): ?>
                <span class="badge badge-info">prerelease</span>
              <?php endif ?>
            </th>
            <td style="width: 15%" class="center"><?php echo $changeset['published_at'] ?></td>
            <td><?php echo $changeset['body'] ?></td>
          </tr>
          <?php if ($version == 'v0.2.2'): ?>
            <tr style="display: none">
              <th>v0.1-v0.2.2</th>
              <td></td>
              <td>These releases were not tagged and noted properly. We were too busy creating awesome!</td>
            </tr>
          <?php endif ?>
        <?php endforeach ?>
      </table>
      <a href="javascript:;" class="link-primary" id="show-all-changesets">show all changes</a>
      <?php js_start() ?>
        $('#show-all-changesets').click(function() {
          $(this).hide();
          $('#changeset-table').find('tr').show();
        });
      <?php js_end() ?>
    </section>
    <?php foreach($tasks as $category => $categoryTasks): ?>
      <section class="spacer2">
        <h2><?php echo ucfirst($category) ?> Changes</h2>
        <table class="content full-table">
          <thead>
            <th>Item</th>
            <th>Date</th>
            <th>Component</th>
            <th>Owner</th>
          </thead>
          <?php foreach($categoryTasks as $task): ?>
            <tr>
              <td><?php echo $task['name'] ?></td>
              <td style="width: 15%"><?php echo $task['due_on'] ?></td>
              <td style="width: 20%">
                <?php if ($task['url']): ?>
                  <a href="<?php echo $task['url'] ?>" class="link-primary"><?php echo $task['project'] ?></a>
                <?php else: ?>
                  <?php echo $task['project'] ?>
                <?php endif ?>
              </td>
              <td style="width: 20%">
                <?php echo $task['assignee'] ?: '<em>unassigned</em>' ?>
              </td>
            </tr>
          <?php endforeach ?>
        </table>
      </section>
    <?php endforeach ?>
  </div>
</main>
<?php echo View::render('nav/_footer') ?>