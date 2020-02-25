jQuery(document).ready(function($){


// use jQuery to disable Revision button after it's been selected
    if($("input[value='one']:checked")){
        $("input[value='one']:checked").prop("disabled",true);
    };

    if($("input[value='two']:checked")){
        $("input[value='two']:checked").prop("disabled",true);
    };

    if($("input[value='three']:checked")){
        $("input[value='three']:checked").prop("disabled",true);
    };


    //prevent form submission once:
    stopSend function(){
        $("input[value='submitfeedback']").addEventListener("click", function(event){
            event.preventDefault();
            alert('form submission stopped');
        });
    }




});
