/**
 * Click events can take 300 ms or so to register on a mobile device because 
 * the device is waiting to see if it's a double click or a touch-and-drag 
 * event.  Use touchStart etc. to work around this issue, but it's not as 
 * straightforward as one might hope.
 * 
 * clickBuster is a modifications of a portion of fastButtons created and 
 * shared by Google and used according to terms described in the Creative 
 * Commons 3.0 Attribution License.  fastButtons can be found at: 
 * http://code.google.com/mobile/articles/fast_buttons.html
 *
 * @package full
 * @subpackage js
 *
 * @author trott
 * @copyright Copyright (c) 2011 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120422
 *  
 * @requires mwf
 */

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