// use jQuery to remove footer from Google Docs iframe
jQuery(document).ready(function($){
    var head = jQuery("#iframe").contents().find("head");
    var css = '<style type="text/css" >' +
              '#header{display:none};' +
              '</style>';
    jQuery(head).append(css);
});
