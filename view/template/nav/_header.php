<nav class="navigation">
  <div class="inner-wrap">
    <a class="navigation__item logo" href="/">LBRY</a>

    <div class="navigation-wrap">
      <?php echo View::render("nav/_globalItems") ?>
    </div>

    <a class="navigation__item menu" href="#">Menu</a>
  </div>
</nav>

<script>
  const toggleNavigationBackground = debounce(() => {
    const nav = document.getElementsByClassName("navigation")[0];

    switch (true) {
      case window.pageYOffset >= 151:
        nav.classList.add("scrolled");
        break;

      case window.pageYOffset <= 150:
        nav.classList.remove("scrolled");
        break;
    }
  }, 50);

  window.addEventListener("scroll", toggleNavigationBackground);

  function debounce(func, wait, immediate) {
  	let timeout;

  	return function () {
  		const context = this;
      const args = arguments;

  		const later = () => {
  			timeout = null;
  			if (!immediate) func.apply(context, args);
  		};

  		const callNow = immediate && !timeout;
  		clearTimeout(timeout);

  		timeout = setTimeout(later, wait);
  		if (callNow) func.apply(context, args);
  	};
  };
</script>
