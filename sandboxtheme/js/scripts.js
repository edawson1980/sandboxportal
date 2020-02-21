// use jQuery to disable Revision button after it's been selected
jQuery(document).ready(function($){

    $("input[value='one']").click(function(){
        $("input[value='one']").prop("disabled",true);
    });

});
