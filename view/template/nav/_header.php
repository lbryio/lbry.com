<?php if (!defined('HEADER_RENDERED')): ?>
  <?php define('HEADER_RENDERED', 1) ?>
  <?php extract([
    'isDark' => false,
    'isAbsolute' => false,
    'isLogoOnly' => false,
    'isBordered' => true
  ], EXTR_SKIP) ?>
  <header class="header<?php echo $isDark ? ' header--dark' : ' header--light' ?>">
    <div class="inner-wrap">
      <a href="/" class="header__logo">LBRY</a>

      <drawer-navigation>
        <drawer-section>
          <drawer-title>
            Community
            <drawer-navigation-helper/>
          </drawer-title>

          <drawer-wrap>
            <drawer-children>
              <drawer-child>
                <a href="/get">
                  <strong>Get LBRY</strong>
                  <span>Use LBRY on your computer or phone</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/faq">
                  <strong>Frequently Asked Questions</strong>
                  <span>Got questions? We probably have answers!</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/news">
                  <strong>News</strong>
                  <span>The latest from the LBRY team and community</span>
                </a>
              </drawer-child>

              <drawer-child class="drawer--no-border drawer--social">
                <div>
                  <strong>Social</strong>
                  <span>
                    <a href="https://www.facebook.com/lbryio"><span class="icon icon-facebook-square"></span></a>
                    <a href="https://twitter.com/lbryio"><span class="icon icon-twitter"></span></a>
                    <a href="https://reddit.com/r/lbry"><span class="icon icon-reddit"></span></a>
                    <a href="https://t.me/lbryofficial"><span class="icon icon-telegram"></span></a>
                  </span>
                </div>
              </drawer-child>

              <drawer-child>
                <a href="https://chat.lbry.com">
                  <strong>Chat</strong>
                  <span>Talk with LBRY fans and team members, right now</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="https://explorer.lbry.com">
                  <strong>Blockchain Explorer</strong>
                  <span>Lookup transactions and claims on the LBRY blockchain</span>
                </a>
              </drawer-child>

            </drawer-children>
          </drawer-wrap>
        </drawer-section>

        <drawer-section>
          <drawer-title>
            Creators
            <drawer-navigation-helper/>
          </drawer-title>

          <drawer-wrap>
            <drawer-children>
              <drawer-child>
                <a href="/publish">
                  <strong>Publish to LBRY</strong>
                  <span>Make your content available to everyone using LBRY</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/youtube">
                  <strong>YouTube Partner Program</strong>
                  <span>Sync your content instantly and start earning</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/faq?category=publisher">
                  <strong>Creator Questions</strong>
                  <span>Frequently asked questions and answers for creators</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="https://lbry.fund">
                  <strong>lbry.fund Content Funding</strong>
                  <span>Get support for your latest creation</span>
                </a>
              </drawer-child>
            </drawer-children>
          </drawer-wrap>
        </drawer-section>

        <drawer-section>
          <drawer-title>
            Company
            <drawer-navigation-helper/>
          </drawer-title>

          <drawer-wrap>
            <drawer-children>
              <drawer-child>
                <a href="/team">
                  <strong>The Team</strong>
                  <span>Meet the people building LBRY and why they're doing it</span>
                </a>
              </drawer-child>

              <!--/
              <drawer-child>
                <a href="/join-us">
                  <strong>Join Us</strong>
                  <span>Work with the LBRY team</span>
                </a>
              </drawer-child>
              /-->

              <drawer-child>
                <a href="/contact">
                  <strong>Contact</strong>
                  <span>Have a question or want to connect with the LBRY, Inc. team?</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/credit-reports">
                  <strong>Credit Reports</strong>
                  <span>Quarterly reports on LBRY's funds</span>
                </a>
              </drawer-child>
            </drawer-children>
          </drawer-wrap>
        </drawer-section>

        <drawer-section>
          <drawer-title>
            Developers
            <drawer-navigation-helper/>
          </drawer-title>

          <drawer-wrap>
            <drawer-children>
              <drawer-child>
                <a href="https://lbry.tech">
                  <strong>LBRY.tech</strong>
                  <span>Find a technical overview, specification, APIs, and more</span>
                </a>
              </drawer-child>

            <drawer-child>
              <a href="https://lbry.tech/spec">
                <strong>The Spec</strong>
                <span>Read a formal technical description of how LBRY works</span>
              </a>
            </drawer-child>

              <drawer-child>
                <a href="https://github.com/lbryio">
                  <strong>GitHub</strong>
                  <span>All LBRY code is public and open-source</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="https://lbry.tech/contribute">
                  <strong>Contributor's Guide</strong>
                  <span>Become a contributor to the LBRY project</span>
                </a>
              </drawer-child>
            </drawer-children>
          </drawer-wrap>
        </drawer-section>
      </drawer-navigation>

      <a href="#" class="header__toggle" id="menuToggle">Menu</a>

      <?php js_start() ?>
        document.getElementById("menuToggle").addEventListener("click", event => {
          event.preventDefault();

          if (window.innerWidth < 951) {
            const body = document.querySelector("body");
            const navigation = document.querySelector("drawer-navigation");

            navigation.classList.toggle("active");

            // Get rid of double scrollbars
            if (navigation.classList.contains("active"))
              body.style["overflow-y"] = "hidden";
            else
              body.style["overflow-y"] = "initial";
          }
        });
      <?php js_end() ?>

      <span class="header__download">
        <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary'])?>
      </span>
    </div>
  </header>
<?php endif ?>
