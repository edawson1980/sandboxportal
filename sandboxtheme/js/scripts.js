// use jQuery to remove footer from Google Docs iframe
jQuery(document).ready(function($){
    var head = $("iframe").contents().find("head");
    var css = '<style type="text/css" >' +
              '#header{display:none};' +
              '</style>';
    $(head).append(css);
});
