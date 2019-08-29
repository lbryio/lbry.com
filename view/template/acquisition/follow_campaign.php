<?php Response::setMetaDescription('Watch ' . $title . ' on a platform that shares your values.') ?>
<?php Response::setMetaTitle($title . ' on LBRY') ?>
<main class="ancillary">
    <section class="hero hero--half-height" style="background-image: url(<?php echo $coverUrl ?>)">
        <div class="inner-wrap inner-wrap--center-hero">
            <h1>Watch <?php echo $title ?></h1>
            <h3>On a platform that shares your values.</h3>
        </div>
    </section>

    <section>
        <div class="inner-wrap">
            <div class="inline-image-and-text">
                <img
                        alt="cctv camera"
                        class="inline-image"
                        src="/img/icon--cctv.svg"
                />

                <p>Predatory platforms like Facebook and YouTube abuse users, censor creators, enforce rules arbitrarily, and spy on everything you do.</p>
            </div>
            <div class="inline-image-and-text">
                <p>LBRY is a user-controlled, open-source platform that stands for user freedom and personal choice. It has <em><?php echo $claimCount ?> videos from <?php echo $claim['name'] ?></em>.</p>
                <img
                        alt="smile icon"
                        class="inline-image"
                        src="/img/icon--smile.svg"
                />
            </div>
        </div>
    </section>
    <section>
        <div class="inner-wrap">
            <h3>Step 1: Download LBRY</h3>
            <p>LBRY is an open-source application available on Windows, macOS, Linux, and Android, with iOS coming soon.</p>
            <br/>
            <div class="align-text--center">
                <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary'])?>
                <a href="/get?showall=1" class="button--link">show all platforms</a>
            </div>
            <br/>
        </div>
    </section>
    <section>
        <div class="inner-wrap">
            <h3>Step 2: Search and Follow <?php echo $claim['name'] ?></h3>
            <p>Type <?php echo $claim['name'] ?> in the search bar and then click Follow.</p>
            <div class="align-text--center" style="margin-top: 1rem; margin-bottom: 1rem;">
                <img src="https://via.placeholder.com/600" alt="How to follow <?php echo $claim['name'] ?> on LBRY" />
            </div>
            <p>If you provide your email address, you'll be notified about every new video.</p>
        </div>
        <br/>
    </section>
    <section>
        <div class="inner-wrap">
            <h3>Step 3 (Optional): Support <?php echo $claim['name'] ?></h3>
            <p>Use the Tip button to support <?php echo $claim['name'] ?> and help others discover his content.</p>
            <p>If you verify your account, you'll receive free credits that you can send to <?php echo $claim['name'] ?> or other creators.</p>
            <small><em>Having trouble?</em> Read <a href="/faq/rewards">the rewards FAQ</a> for help.</small>
            <div class="align-text--center" style="margin-top: 1rem; margin-bottom: 1rem;">
                <img src="https://via.placeholder.com/600" alt="How to support <?php echo $claim['name'] ?> on LBRY" />
            </div>
        </div>
        <br/>
    </section>
    <section>
        <div class="inner-wrap">
            <h3>Step 4: Enjoy Peace of Mind</h3>
            <p>When you watch <?php echo $title ?> on LBRY, you're watching via a platform that is open-source, user-controlled, and censorship-resistant.</p>
            <p>Unlike other platforms, it is <em>literally impossible</em> for LBRY to put it's thumb on the scales.</p>
            <p>So what are you waiting for? Try LBRY today!</p>
            <br/>
            <div class="align-text--center">
                <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary'])?>
                <a href="/get?showall=1" class="button--link">show all platforms</a>
            </div>
            <br/>
            <div>
                <small>Not enough details for you? Read the <a href="/what">manifesto</a> or the <a href="//lbry.tech">docs</a>.</small>
            </div>
        </div>
    </section>
</main>
