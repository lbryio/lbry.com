<footer class="footer">
  <div class="inner-wrap inner-wrap--footer-top">
    <ul>
      <li>Company</li>
      <li><a href="/what" title="Wonder what LBRY is about? Find out here!">About</a></li>
      <li><a href="/news" title="The latest news from LBRY HQ">Blog</a></li>
      <!--/ <li class="hiring"><a href="/join-us" title="Our team is always looking for awesome folks to learn from">Jobs</a></li> /-->
      <li><a href="/roadmap" title="Where are we going? Good thing we have a map!">Roadmap</a></li>
      <li><a href="https://shop.lbry.com" title="LBRY swag for purchase">Shop</a></li>
      <li><a href="/team" title="The people who bring LBRY to YOU">Team</a></li>
    </ul>

    <ul>
      <li>Download LBRY</li>
      <li><a href="/android" title="Get LBRY on Android">Android</a></li>
      <li><a href="/linux" title="Get LBRY on Linux">Linux</a></li>
      <li><a href="/ios" title="Get LBRY on iOS">iOS</a></li>
      <li><a href="/osx" title="Get LBRY macOS">macOS</a></li>
      <li><a href="/windows" title="Get LBRY on Windows">Windows</a></li>
    </ul>

    <ul>
      <li>Social</li>
      <li><a href="https://chat.lbry.com" title="LBRY's Discord channel">Chat</a></li>
      <li><a href="https://twitter.com/lbryio" title="LBRY's Twitter page">Twitter</a></li>
      <li><a href="https://reddit.com/r/lbry" title="LBRY's subreddit">Reddit</a></li>
      <li><a href="https://facebook.com/lbryio" title="LBRY's Facebook page">Facebook</a></li>
      <li><a href="https://t.me/lbryofficial" title="LBRY's Telegram channel">Telegram</a></li>
    </ul>

    <ul>
      <li>Support</li>
      <li><a href="mailto:hello@lbry.com" title="Send us an email!">hello@lbry.com</a></li>
      <li><a href="/contact" title="Send us an email!">Contact</a></li>
      <li><a href="/privacypolicy" title="View our Privacy Policy">Privacy</a></li>
      <li><a href="/termsofservice" title="Terms of Service">TOS</a></li>
      <li><a href="/faq" title="Frequently Asked Questions about LBRY">FAQ</a></li>
    </ul>
  </div>

  <hr/>

  <div class="inner-wrap inner-wrap--footer-bottom">
    <ul>
      <li class="free-speech"><a href="https://en.wikipedia.org/wiki/Free_Speech_Flag" title="">Free Speech Flag</a></li>
      <li><a href="#" id="elevator" title="Scroll to the top of the page">Back to top</a></li>
    </ul>

    <?php js_start() ?>
      $("#elevator").click(event => {
        event.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
      });
    <?php js_end() ?>
  </div>
</footer>
