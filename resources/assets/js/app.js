window.$ = window.jQuery = require('jquery');
require('selectize');
var bootstrap = require('sass');

$(document).ready(function () {
    $('#tags').selectize({
        delimiter: ',',
        persist: false,
        valueField: 'tag',
        labelField: 'tag',
        searchField: 'tag',
        options: tags,
        create: function (input) {
            return {
                tag: input
            }
        }
    });
});
