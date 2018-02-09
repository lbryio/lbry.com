<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<?php $valuse = $values ?? [] ?>
<?php $errors = $errors ?? [] ?>

  <main>
    <div class="content">
      <div class="row-fluid">
        <div class="span9">
          <h1>{{dmca.header}}</h1>
          <br>

          <?php echo View::render('nav/_flashes') ?>

          <form action="<?php echo Request::getRelativeUri() ?>" method="POST">
            <?php echo View::render('form/_formRow', [
              'field'    => 'name',
              'value'    => $values['name'] ?? null,
              'error'    => $errors['name'] ?? null,
              'label'    => __('dmca.form_labels.name'),
              'required' => true,
            ]) ?>

            <?php echo View::render('form/_formRow', [
              'field'    => 'rightsholder',
              'value'    => $values['rightsholder'] ?? null,
              'error'    => $errors['rightsholder'] ?? null,
              'label'    => __('dmca.form_labels.rightsholder'),
              'help'     => __('dmca.form_help.rightsholder'),
              'required' => true,
            ]) ?>

            <?php echo View::render('form/_formRow', [
              'field'    => 'email',
              'type'     => 'email',
              'value'    => $values['email'] ?? null,
              'error'    => $errors['email'] ?? null,
              'label'    => __('dmca.form_labels.email'),
              'help'     => __('dmca.form_help.email'),
              'required' => true,
            ]) ?>

            <?php echo View::render('form/_formRow', [
              'field'    => 'identifier',
              'value'    => $values['identifier'] ?? null,
              'error'    => $errors['identifier'] ?? null,
              'label'    => __('dmca.form_labels.identifier'),
              'help'     => __('dmca.form_help.identifier'),
              'required' => true,
            ]) ?>

            <input type="submit" value="{{dmca.form_submit}}" class="btn-primary">
          </form>

        </div>
      </div>
    </div>
  </main>

<?php echo View::render('nav/_footer', ['showLearnFooter' => $learnFooter ?? false]) ?>
