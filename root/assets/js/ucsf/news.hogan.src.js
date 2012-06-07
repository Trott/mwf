// require hogan
var hogan = require("hogan.js");

// construct template string
var template = '<div class="menu detailed">';
    template += '<h2 clas="light">{{title}}</h2>';
    template += '<ol>';
    template += '{{#entries}}<li><a rel="external" href="{{link}}">{{title}}</a></li>{{/entries}}'
    template += '</ol>';
    template += '</div>';

// compile template
var output = hogan.compile(template, {asString: true});

console.log(output);
