'use strict';

/**
 *  App
 *  Driving application.
 */
function App(api,parameters) {
    this._elem = window;
    this._html = document.getElementsByTagName('html')[0];
    this._body = document.body;
    this._elem.addEventListener('load',this._onLoad.bind(this),false);
}

App.prototype._onLoad = function() {
    // Hero button
    this._button = document.getElementsByClassName('hero')[0].getElementsByClassName('button')[0];

    // To top button
    this._toTop = document.getElementsByClassName('to-top')[0];
    this._isVisible = false;

    // Header animation setup
    this._points = [];
    this._lines = [];
    Array.prototype.slice.call(document.getElementsByClassName('shape')[0].getElementsByTagName('div'),0).forEach(function(point,i){
        var p = new Point(point);
        this._points.push(p);
        var path = document.getElementsByTagName('path')[i];
        var index = parseFloat(path.getAttribute('data-from'));
        var origin = {x:window.innerWidth*0.4,y:0};
        var from = index < 0 ? origin:this._points[index].getOffset();
        var to = this._points[i].getOffset();
        var l = new Line(path,from,to);
        this._lines.push(l);
    },this);

    // Section how
    this._how = document.getElementsByClassName('how')[0];
    this._percent = 0;
    this._offset = 100;
    this._journey = this._how.getElementsByClassName('journey')[0];
    this._steps = Array.prototype.slice.call(this._how.getElementsByClassName('step'),0);
    this._start = this._how.offsetTop - this._how.scrollTop - window.innerHeight / 2 - this._offset;
    this._end = this._start + window.innerHeight / 2;

    // XHR request
    this._getDataFromCoinMarketCap();

    // Binding events
    this._bindEvents();
};


App.prototype._getDataFromCoinMarketCap = function(e) {
    this._xhr = new XMLHttpRequest();
    this._xhr.addEventListener('readystatechange',this._onReadyStateChange.bind(this),false);
    this._xhr.open('GET','https://api.lbry.com/lbc/exchange_rate');
    this._xhr.send();
};

App.prototype._onReadyStateChange = function(e) {
    if (this._xhr.readyState === 4) {
        if (this._xhr.status === 200) {
            const response = JSON.parse(this._xhr.responseText);
            const lines = Array.prototype.slice.call(document.getElementsByClassName('line'),0);
            const price = parseFloat(response.data.lbc_usd);

            lines.forEach(function(line) {
                const subscriber = line.getElementsByTagName('p')[0];
                const monthly = line.getElementsByTagName('p')[1];
                const amount = line.getElementsByTagName('p')[2];
                const total = parseFloat(monthly.innerHTML.replace(new RegExp(',', 'g'), '')) * price;

                amount.innerHTML = this._addCommas(total.toFixed(2)) + ' <i>USD</i>';
            },this);

            document.getElementsByClassName('current-value')[0].innerHTML = "(" + price.toFixed(4) + " USD)";
        }
    }
};

App.prototype._addCommas = function(nStr) {
    nStr += '';
    var x = nStr.split('.');
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
};

App.prototype._bindEvents = function() {
    var click = 'ontouchstart' in document ? 'touchstart':'click';
    this._button.addEventListener(click,this._goToContent.bind(this),false);
    this._toTop.addEventListener(click,this._goToTop.bind(this),false);
    TweenMax.ticker.addEventListener('tick',this._onTick.bind(this));
    this._elem.addEventListener('resize',this._onResize.bind(this),false);
};

App.prototype._goToContent = function() {
    TweenMax.to(this._elem,0.8,{scrollTo:window.innerHeight});
};

App.prototype._goToTop = function() {
    TweenMax.to(this._elem,0.8,{scrollTo:0});
};

App.prototype._onTick = function() {
    // Header animation
    this._points.forEach(function(point,i) {
        var line = this._lines[i];
        var path = line.getElement();
        var index = parseFloat(path.getAttribute('data-from'));
        var origin = {x:window.innerWidth*0.4,y:0};
        var from = index < 0 ? origin:this._points[index].getOffset();
        var to = point.getOffset();
        line.draw(from,to);
    },this);

    // Get current scroll y position
    var current = window.scrollY || document.documentElement.scrollTop || document.body.scrollTop;

    // To top animation
    if (current >= window.innerHeight) {
        if (!this._isVisible) {
            this._isVisible = true;
            TweenMax.to(this._toTop,0.4,{autoAlpha:1,ease:Quint.easeOut});
        }
    } else {
        if (this._isVisible) {
            this._isVisible = false;
            TweenMax.to(this._toTop,0.4,{autoAlpha:0,ease:Quint.easeOut});
        }
    }


    // How section animation on scroll
    if (window.innerWidth > 1024) {
        var percent;

        if (current <= this._start) {
            percent = 0;
        } else if (current >= this._end) {
            percent = 100;
        } else {
            percent = (current-this._start) / (window.innerHeight / 2) * 100;
        }

        this._percent += (percent - this._percent) * 0.1;
        if (this._percent < 0.1) {
            this._percent = 0;
        } else if (this._percent > 99.9) {
            this._percent = 100;
        }

        TweenLite.set(this._journey,{width:this._percent+'%'});

        this._steps.forEach(function(step) {
            var enableAt = parseFloat(step.getAttribute('data-enable'));
            if (this._percent > enableAt) {
                if (step.className.indexOf('enabled') !== -1) {
                    step.className = step.className.replace(' enabled','');
                }
            } else {
                if (step.className.indexOf('enabled') === -1) {
                    step.className += ' enabled';
                }
            }
        },this);
    } else {
        this._steps.forEach(function(step) {
            if (step.className.indexOf('enabled') === -1) {
                step.className += ' enabled';
            }
        },this);
    }
};

App.prototype._onResize = function() {
    this._points.forEach(function(point,i) {
        point.resetOrigin();
    },this);
    this._start = this._how.offsetTop - this._how.scrollTop - window.innerHeight / 2 - this._offset;
    this._end = this._start + window.innerHeight / 2;
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
    if (this._elem.className.indexOf('circle') !== -1) {
        this._move();
    }
}

Point.prototype._move = function() {
    var distance = 20;
    TweenLite.to(this._elem,3+3*Math.random(),{x:-distance+Math.random()*(distance*2),y:-distance+Math.random()*(distance*2),ease:Power2.easeOutIn,onUpdate:this._onUpdate,onUpdateScope:this,onComplete:this._move,onCompleteScope:this});
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
function Line(elem,from,to) {
    this._elem = elem;
    this.draw(from,to);
}

Line.prototype.getElement = function() {
    return this._elem;
};

Line.prototype.draw = function(from,to) {
    this._elem.setAttribute('d','M '+from.x+','+from.y+' L '+to.x+','+to.y);
};



// Let's start :)
var app = new App();
