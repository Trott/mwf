/**
 * Click events can take 300 ms or so to register on a mobile device because 
 * the device is waiting to see if it's a double click or a touch-and-drag 
 * event.  Use touchStart etc. to work around this issue, but it's not as 
 * straightforward as one might hope.
 * 
 * fastLink.js is a modifications of fastButtons created and shared by Google and
 * used according to terms described in the Creative Commons 3.0 Attribution 
 * License.  fastButtons can be found at: 
 * http://code.google.com/mobile/articles/fast_buttons.html
 *
 * @package full
 * @subpackage js
 *
 * @author trott
 * @copyright Copyright (c) 2011 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111206
 *
 * @requires mwf
 * @requires mwf.standard.preferences
 * @requires mwf.full.fastLinks
 * 
 */

mwf.full.fastLink = function(element, handler) {
  this.element = element;
  this.handler = handler;

  element.addEventListener('touchstart', this, false);
  element.addEventListener('click', this, false);
};

mwf.full.fastLink.prototype.handleEvent = function(event) {
  switch (event.type) {
    case 'touchstart': this.onTouchStart(event); break;
    case 'touchmove': this.onTouchMove(event); break;
    case 'touchend': this.onClick(event); break;
    case 'click': this.onClick(event); break;
  }
};

mwf.full.fastLink.prototype.onTouchStart = function(event) {
  event.stopPropagation();

  this.element.addEventListener('touchend', this, false);
  document.body.addEventListener('touchmove', this, false);

  this.startX = event.touches[0].clientX;
  this.startY = event.touches[0].clientY;
};

mwf.full.fastLink.prototype.onTouchMove = function(event) {
  if (Math.abs(event.touches[0].clientX - this.startX) > 10 ||
      Math.abs(event.touches[0].clientY - this.startY) > 10) {
    this.reset();
  }
};

mwf.full.fastLink.prototype.onClick = function(event) {
  event.stopPropagation();
  this.reset();
  this.handler(event);

  if (event.type == 'touchend') {
    mwf.clickBuster.preventGhostClick(this.startX, this.startY);
  }
};

mwf.full.fastLink.prototype.reset = function() {
  this.element.removeEventListener('touchend', this, false);
  document.body.removeEventListener('touchmove', this, false);
};

mwf.clickBuster = function() {
};

mwf.clickBuster.preventGhostClick = function(x, y) {
  mwf.clickBuster.coordinates.push(x, y);
  window.setTimeout(mwf.clickBuster.pop, 2500);
};

mwf.clickBuster.pop = function() {
  mwf.clickBuster.coordinates.splice(0, 2);
};

mwf.clickBuster.onClick = function(event) {
  for (var i = 0; i < mwf.clickBuster.coordinates.length; i += 2) {
    var x = mwf.clickBuster.coordinates[i];
    var y = mwf.clickBuster.coordinates[i + 1];
    if (Math.abs(event.clientX - x) < 25 && Math.abs(event.clientY - y) < 25) {
      event.stopPropagation();
      event.preventDefault();
    }
  }
};

document.addEventListener('click', mwf.clickBuster.onClick, true);
mwf.clickBuster.coordinates = [];