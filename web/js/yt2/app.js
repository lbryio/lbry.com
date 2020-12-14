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

  // Binding events
  this._bindEvents();
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
