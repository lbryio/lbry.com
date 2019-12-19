"use strict";



function App(api, parameters) {
  this._elem = window;
  this._html = document.getElementsByTagName("html")[0];
  this._body = document.body;
  this._elem.addEventListener("load", this._onLoad.bind(this), false);
}



App.prototype._onLoad = function() {
  // Header animation setup
  this._points = [];
  this._lines = [];

  Array.prototype.slice.call(document.getElementsByClassName("shape")[0].getElementsByTagName("div"), 0).forEach(function(point, i) {
    const p = new Point(point);
    this._points.push(p);

    const path = document.getElementsByTagName("path")[i];
    const index = parseFloat(path.getAttribute("data-from"));

    const origin = {
      x: window.innerWidth * 0.4,
      y: 0
    };

    const from = index < 0 ?
      origin :
      this._points[index].getOffset();

    const to = this._points[i].getOffset();
    const l = new Line(path, from, to);

    this._lines.push(l);
  }, this);

  // Section how
  this._how = document.getElementsByClassName("yt-how")[0];
  this._percent = 0;
  this._offset = 100;
  this._journey = this._how.getElementsByClassName("journey")[0];
  this._steps = Array.prototype.slice.call(this._how.getElementsByClassName("step"), 0);
  this._start = this._how.offsetTop - this._how.scrollTop - window.innerHeight / 2 - this._offset;
  this._end = this._start + window.innerHeight / 2;

  // XHR request
  this._getDataFromCoinMarketCap();

  // Binding events
  this._bindEvents();
};

App.prototype._getDataFromCoinMarketCap = function(e) {
  this._xhr = new XMLHttpRequest();
  this._xhr.addEventListener("readystatechange", this._onReadyStateChange.bind(this), false);
  this._xhr.open("GET", "https://api.lbry.com/lbc/exchange_rate");
  this._xhr.send();
};

App.prototype._onReadyStateChange = function(e) {
  if (this._xhr.readyState === 4) {
    if (this._xhr.status === 200) {
      const response = JSON.parse(this._xhr.responseText);
      const lines = document.querySelectorAll(".lbc-to-usd");
      const price = parseFloat(response.data.lbc_usd);

      lines.forEach(function(line) {
        const amount = line.dataset.lbcAmount;
        const total = amount * price; //api returns per month

        line.innerHTML = this._addCommas(total.toFixed(2)) + " <small class='meta'>USD</small>";
      }, this);

      document.getElementsByClassName("current-value")[0].innerHTML = `$${price.toFixed(4)} USD`;
    }
  }
};

App.prototype._addCommas = function(nStr) {
  nStr += "";

  const rgx = /(\d+)(\d{3})/;
  const x = nStr.split(".");
  const x2 = x.length > 1 ?
    "." + x[1] :
    "";
  let x1 = x[0];

  while (rgx.test(x1))
    x1 = x1.replace(rgx, "$1" + "," + "$2");

  return x1 + x2;
};

App.prototype._bindEvents = function() {
  TweenMax.ticker.addEventListener("tick", this._onTick.bind(this));
  this._elem.addEventListener("resize", this._onResize.bind(this), false);
};

App.prototype._onResize = function() {
  this._points.forEach(function(point, i) {
    point.resetOrigin();
  }, this);

  this._start = this._how.offsetTop - this._how.scrollTop - window.innerHeight / 2 - this._offset;
  this._end = this._start + window.innerHeight / 2;
};

App.prototype._onTick = function() {
  // Header animation
  this._points.forEach(function(point, i) {
    const line = this._lines[i];
    const path = line.getElement();
    const index = parseFloat(path.getAttribute("data-from"));

    const origin = {
      x: window.innerWidth * 0.4,
      y: 0
    };

    const from = index < 0 ?
      origin :
      this._points[index].getOffset();

    const to = point.getOffset();

    line.draw(from, to);
  }, this);

  // Get current scroll y position
  const current = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;

  // How section animation on scroll
  if (window.innerWidth > 1024) {
    let percent;

    if (current <= this._start) {
      percent = 0;
    } else if (current >= this._end) {
      percent = 100;
    } else {
      percent = (current-this._start) / (window.innerHeight / 2) * 100;
    }

    this._percent += (percent - this._percent) * 0.1;

    if (this._percent < 0.1)
      this._percent = 0;
    else if (this._percent > 99.9)
      this._percent = 100;

    TweenLite.set(this._journey, {
      width: this._percent + "%"
    });

    this._steps.forEach(function(step) {
      const enableAt = parseFloat(step.getAttribute("data-enable"));

      if (this._percent > enableAt) {
        if (step.className.indexOf("enabled") !== -1)
          step.className = step.className.replace(" enabled", "");
      } else {
        if (step.className.indexOf("enabled") === -1)
          step.className += " enabled";
      }
    }, this);
  } else {
    this._steps.forEach(function(step) {
      if (step.className.indexOf("enabled") === -1)
        step.className += " enabled";
    }, this);
  }
};



/**
 *  Point
 *  Header animation
 */
function Point(elem) {
  this._elem = elem;
  this._originX = this._elem.offsetLeft - this._elem.scrollLeft + this._elem.offsetWidth / 2;
  this._originY = this._elem.offsetTop - this._elem.scrollTop + this._elem.offsetHeight / 2;
  this._x = 0;
  this._y = 0;

  if (this._elem.className.indexOf("circle") !== -1)
    this._move();
}

Point.prototype._move = function() {
  const distance = 20;

  TweenLite.to(this._elem, 3 + 3 * Math.random(), {
    x: -distance + Math.random() * (distance * 2),
    y: -distance + Math.random() * (distance * 2),
    ease: Power2.easeOutIn,
    onUpdate: this._onUpdate,
    onUpdateScope: this,
    onComplete: this._move,
    onCompleteScope: this
  });
};

Point.prototype._onUpdate = function() {
  this._x = this._elem._gsTransform.x;
  this._y = this._elem._gsTransform.y;
};

Point.prototype.getOffset = function() {
  return {
    x: this._originX + this._x,
    y: this._originY + this._y
  }
};

Point.prototype.resetOrigin = function() {
  this._originX = this._elem.offsetLeft - this._elem.scrollLeft + this._elem.offsetWidth / 2;
  this._originY = this._elem.offsetTop - this._elem.scrollTop + this._elem.offsetHeight / 2;
};



/**
 *  Line
 *  Header animation
 */
function Line(elem, from, to) {
  this._elem = elem;
  this.draw(from,to);
}

Line.prototype.getElement = function() {
  return this._elem;
};

Line.prototype.draw = function(from, to) {
  this._elem.setAttribute("d", "M " + from.x + "," + from.y + " L " + to.x + "," + to.y);
};



// Let's start :)
new App();



// Clicking CTAs introduces a smooth scroll to the appropriate section
const youtubeCtas = document.querySelectorAll("[data-id='scroll-to-claim']");

youtubeCtas.forEach(cta => {
  cta.onclick = () => {
    const element = document.getElementById("claim-section");
    const elementOffset = element.offsetTop - 2;

    window.scroll({ top: elementOffset, behavior: "smooth" });

    setTimeout(() => { // give the scroll time to finish before focusing
      document.getElementById("lbry_channel_name").focus();
    }, 300);
  };
});



// Scroll to error messages if they exist
window.addEventListener("load", (event) => {
  const youtubeErrors = document.querySelectorAll(".error-block");

  youtubeErrors.forEach(error => {
    if (!error.hidden) {
      const errorDivOffset = error.offsetTop;

      window.scroll({ top: errorDivOffset });
      return;
    }
  });
});
