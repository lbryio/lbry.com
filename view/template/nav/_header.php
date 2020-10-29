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
            <a href="/get">Download</a>
          </drawer-title>
        </drawer-section>

        <drawer-section class="header--mobile-only">
          <drawer-title>
            <a href="https://lbry.tv">Use on Web (lbry.tv)</a>
          </drawer-title>
        </drawer-section>

        <drawer-section class="header--mobile-only">
          <drawer-title>
            <a href="https://odysee.com">Use Odysee (odysee.com)</a>
          </drawer-title>
        </drawer-section>

        <drawer-section>
          <drawer-title>
            Community ⌄
            <drawer-navigation-helper/>
          </drawer-title>

          <drawer-wrap>
            <drawer-children>
              <drawer-child>
                <a href="https://lbry.org">
                  <strong>lbry.org</strong>
                  <span>Meet, chat, and party in the heart of the LBRY community.</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/youtube">
                  <strong>Sync your YouTube Channel</strong>
                  <span>Sync your content instantly and start earning</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/faq">
                  <strong>Frequently Asked Questions</strong>
                  <span>Got questions? We probably have answers!</span>
                </a>
              </drawer-child>

                <drawer-child>
                    <a href="https://explorer.lbry.com">
                        <strong>Blockchain Explorer</strong>
                        <span>Look up transactions and claims on the LBRY blockchain</span>
                    </a>
                </drawer-child>


              <drawer-child class="drawer--no-border drawer--social">
                <div>
                  <strong>Social</strong>
                  <span>
                    <a href="https://twitter.com/lbrycom"><span class="icon icon-twitter"></span></a>
                    <a href="https://reddit.com/r/lbry"><span class="icon icon-reddit"></span></a>
                    <a href="https://www.facebook.com/lbrycom"><span class="icon icon-facebook-square"></span></a>
                    <a href="https://t.me/lbryofficial"><span class="icon icon-telegram"></span></a>
                  </span>
                </div>
              </drawer-child>


            </drawer-children>
          </drawer-wrap>
        </drawer-section>

        <drawer-section>
          <drawer-title>
            Company ⌄
            <drawer-navigation-helper/>
          </drawer-title>

          <drawer-wrap>
            <drawer-children>
                <drawer-child>
                    <a href="https://open.lbry.com/@lbry">
                        <strong>@lbry on LBRY</strong>
                        <span>Everything about LBRY, from LBRY, on LBRY</span>
                    </a>
                </drawer-child>

                <drawer-child>
                    <a href="/news">
                        <strong>Company News</strong>
                        <span>The latest from the LBRY team</span>
                    </a>
                </drawer-child>

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
                <a href="/roadmap">
                  <strong>Roadmap</strong>
                  <span>The next steps in our journey</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/contact">
                  <strong>Contact</strong>
                  <span>Have a question or want to connect with the LBRY, Inc. team?</span>
                </a>
              </drawer-child>

              <drawer-child>
                <a href="/credit-reports">
                  <strong>Credit Reports</strong>
                  <span>Quarterly reports on LBRY's blockchain assets</span>
                </a>
              </drawer-child>
            </drawer-children>
          </drawer-wrap>
        </drawer-section>

        <drawer-section>
          <drawer-title>
            Developers ⌄
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
                  <a href="https://open.lbry.com/@lbrytech">
                      <strong>Follow @lbrytech on LBRY</strong>
                      <span>From the devs, for the devs.</span>
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

      <search-container>
        <a
          class="header__search-toggle"
          href="#"
          id="searchToggle"
        >Search</a>

        <input
          id="searchInput"
          placeholder="Search LBRY.com"
          type="search"
        />
      </search-container>

      <a href="https://lbry.tv" class="button button--primary header__lbrytv header--mobile-only">lbry.tv</a>
      <a href="#" class="header__toggle" id="menuToggle">Menu</a>

      <?php js_start() ?>
        document.getElementById("searchToggle").addEventListener("click", event => {
          event.preventDefault();

          document.querySelector("search-container").classList.toggle("active");

          if (document.querySelector("drawer-navigation").style.display === "none") {
            document.querySelector("drawer-navigation").style.display = "inline-flex";
            document.getElementById("searchInput").value = "";
          } else {
            document.querySelector("drawer-navigation").style.display = "none";
            document.getElementById("searchInput").focus();
          }
        });

        document.getElementById("searchInput").value = "";

        document.getElementById("searchInput").addEventListener("keyup", event => {
          const key = event.keyCode ? event.keyCode : event.which;
          const self = document.getElementById("searchInput");

          if (key === 13)
            location.href = `https://duckduckgo.com/?q=${self.value} site:lbry.com`;

          if (key === 27)
            document.getElementById("searchToggle").click();
        });

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
        <a href="https://open.lbry.com" class="button button--primary">Open LBRY</a>
      </span>
    </div>
  </header>
<?php endif ?>
