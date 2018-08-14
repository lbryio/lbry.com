<?php Response::setMetaTitle(__('title.join')) ?>
<?php Response::setMetaDescription(__('description.join')) ?>
<?php echo View::render('nav/_header', ['isDark' => false]) ?>
<main>
    <div class="content">
        <div class="row-fluid">
            <div class="span9">
                <h1>{{page.email_settings}}</h1>
                <?php if ($error ?? false): ?>
                    <div class="notice notice-error spacer1"><?php echo $error ?></div>
                <?php endif ?>
                <?php echo View::render('mail/_settingsForm',['returnUrl' => $nextUrl ?? '/']) ?>
            </div>
            <div class="span3">
                <h3>{{social.also}}</h3>
                <?php echo View::render('social/_list') ?>
            </div>
        </div>
    </div>
</main>
<?php echo View::render('nav/_footer', ['showLearnFooter' => $learnFooter ?? false]) ?>
