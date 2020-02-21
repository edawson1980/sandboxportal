// use jQuery to disable Revision button after it's been selected
jQuery(document).ready(function($){

    //checks for checked radio button on page load.  just disabling the button upon click event does not record the value to the backend.
    // if($("input[value='one']:checked")){
    //     $("input[value='one']").prop("disabled", true);
    // }else if($("input[value='two']:checked")){
    //     $("input[value='two']").prop("disabled", true);
    // }else if($("input[value='three']:checked")){
    //     $("input[value='three']").prop("disabled", true);
    // }else{
    //
    // };

    if($("input[value='one']:checked")){
        $("input[value='one']:checked").prop("disabled",true);
    };

    if($("input[value='two']:checked")){
        $("input[value='two']:checked").prop("disabled",true);
    };

    if($("input[value='three']:checked")){
        $("input[value='three']:checked").prop("disabled",true);
    };

});
