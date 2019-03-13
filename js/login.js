$(document).ready(function() {

    $("#email").keyup(function(){
        var q = $("#email").val();
        query(q); 
        });

        function query(q){
        $.ajax({
            url: "get_avatar.php?q="+q+"",      
        }).success(function(response) {
            if (response != ""){
             $("#avatar").html(response);
            }
        });
    }
})

