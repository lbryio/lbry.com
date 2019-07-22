<?php $valuse = $values ?? [] ?>
<?php $errors = $errors ?? [] ?>

<main class="ancillary">
  <section class="hero hero--half-height">
    <div class="inner-wrap inner-wrap--center-hero">
      <h1>{{dmca.header}}</h1>
    </div>
  </section>

  <section>
    <div class="inner-wrap">
      <?php echo View::render('nav/_flashes') ?>

      <form action="<?php echo Request::getRelativeUri() ?>" method="POST">
        <?php echo View::render('form/_formRow', [
          'field'    => 'name',
          'value'    => $values['name'] ?? null,
          'error'    => $errors['name'] ?? null,
          'label'    => __('dmca.form_labels.name'),
          'required' => true
        ]) ?>

        <?php echo View::render('form/_formRow', [
          'field'    => 'rightsholder',
          'value'    => $values['rightsholder'] ?? null,
          'error'    => $errors['rightsholder'] ?? null,
          'label'    => __('dmca.form_labels.rightsholder'),
          'help'     => __('dmca.form_help.rightsholder'),
          'required' => true
        ]) ?>

        <?php echo View::render('form/_formRow', [
          'field'    => 'email',
          'type'     => 'email',
          'value'    => $values['email'] ?? null,
          'error'    => $errors['email'] ?? null,
          'label'    => __('dmca.form_labels.email'),
          'help'     => __('dmca.form_help.email'),
          'required' => true
        ]) ?>

        <?php echo View::render('form/_formRow', [
          'field'    => 'identifier',
          'value'    => $values['identifier'] ?? null,
          'error'    => $errors['identifier'] ?? null,
          'label'    => __('dmca.form_labels.identifier'),
          'help'     => __('dmca.form_help.identifier'),
          'required' => true
        ]) ?>

        <input type="submit" value="{{dmca.form_submit}}"/>
      </form>

      <small class="meta">You may also submit content that you want to flag for being illegal. To learn more about reporting infringing or illegal content and DMCA procedures, please see our <a href="/faq/dmca">DMCA article</a>.</small>
    </div>
  </section>
</main>
