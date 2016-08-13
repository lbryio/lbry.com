<?php Response::setMetaDescription('roadmap.description') ?>
<?php NavActions::setNavUri('/learn') ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>

<main>
  <div class="content content-light">
    <h1>{{roadmap.title}}</h1>
    <div class="help">
      The LBRY roadmap pulls in information dynamically from our internal project management system and public
      <a href="https://github.com/lbryio" class="link-primary">GitHub</a> page.
    </div>
    <h2>Scheduled Changes</h2>
    <?php foreach($tasks as $category => $categoryTasks): ?>
      <section>
        <h3><?php echo ucfirst($category) ?></h3>
        <table class="content full-table">
        <?php foreach($categoryTasks as $task): ?>
          <tr>
            <td><?php echo $task['name'] ?></td>
            <td style="width: 20%"><?php echo $task['project'] ?></td>
            <td style="width: 15%"><?php echo $task['due_on'] ?></td>
            <td style="width: 20%"><?php echo $task['assignee'] ?></td>
          </tr>
        <?php endforeach ?>
        </table>
      </section>
    <?php endforeach ?>
  </div>
</main>