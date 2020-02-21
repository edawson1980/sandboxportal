// use jQuery to disable Revision button after it's been selected
jQuery(document).ready(function($){

    //checks for checked radio button on page load.  just disabling the button upon click event does not record the value to the backend.
    if($("input[value='one']:checked")){
        $("input[value='one']").prop("disabled", true);

    }

});
