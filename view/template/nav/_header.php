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
                  <strong>Use LBRY</strong>
                  <span>Download LBRY for your computer or phone</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/faq">
                  <strong>Frequently Asked Questions</strong>
                  <span>Got questions? We might have answers!</span>
                </a>
              </drawer-child>
              
              <drawer-child>
                <a href="/news">
                  <strong>News</strong>
                  <span>The latest from the LBRY team and community</span>
                </a>
              </drawer-child> 
              
              <drawer-child class="drawer--no-border">
                <div>
                  <strong>Social</strong>
                  <span>
                    <a href="https://www.facebook.com/lbryio"><span class="icon icon-facebook-official"></span></a>
                    <a href="https://twitter.com/lbryio"><span class="icon icon-twitter"></span></a>
                    <a href="https://reddit.com/r/lbry"><span class="icon icon-reddit"></span></a>
                  </span>
                </div>
              </drawer-child>    
              
              <drawer-child>
                <a href="">
                  <strong>Chat</strong>
                  <span>Talk with LBRY fans and team members, immediately!</span>
                </a>
              </drawer-child>              

              <drawer-child>
                <a href="">
                  <strong>Blockchain Explorer</strong>
                  <span>Lookup and verify transactions on the LBRY blockchain</span>
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
                <a href="https://lbry.io/get">
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
                <a href="https://lbry.io/faq?category=publisher">
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

              <drawer-child>
                <a href="/join-us">
                  <strong>Join Us</strong>
                  <span>Work with the LBRY team</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="">
                  <strong>Contact</strong>
                  <span>Have a question or want to connect with the LBRY, Inc. team?</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/credit-reports">
                  <strong>Credit Reports</strong>
                  <span>Quarterly reports on the state and usage of LBRY's funds</span>
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
                  <span>Find out how the heck all of this works</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="https://github.com/lbryio">
                  <strong>GitHub</strong>
                  <span>The LBRY code is open source, check out the repos</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="https://lbry.tech/contribute">
                  <strong>Contributor's Guide</strong>
                  <span>Tips and guidelines for being a contributor to the LBRY projects</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="https://forum.lbry.tech">
                  <strong>Forum</strong>
                  <span>If you have a question for the LBRY, Inc. development team, post it here</span>
                </a>
              </drawer-child>
            </drawer-children>
          </drawer-wrap>
        </drawer-section>
      </drawer-navigation>

      <span class="header__download">
        <?php echo View::render('download/_downloadButton', ['buttonStyle' => 'primary'])?>
      </span>
    </div>
  </header>
<?php endif ?>
