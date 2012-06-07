// require hogan
var hogan = require("hogan.js");

// construct template string
var template = '{{#feed}}'
    template += '<div class="menu detailed">';
    template += '<h2>{{title}}</h2>';
    template += '<ol>';
    template += '{{#entries}}<li><a rel="external" href="{{link}}">{{title}}</a></li>{{/entries}}'
    template += '</ol>';
    template += '</div>';
    template += '{{/feed}}';
    template += '{{^feed}}';
    template += '<div class="content">';
    template += '<p>News feed could not be loaded.</p>';
    template += '</div>';
    template += '{{/feed}}';

// compile template
var output = hogan.compile(template, {asString: true});

console.log(output);

