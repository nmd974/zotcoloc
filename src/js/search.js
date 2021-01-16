$(document).ready(function(){
    $("#result-search").keyup(function(){
        var search = $(this).val();
        var data = "ville=" + search;
        if(search.length>1){
            $.ajax({
                type : "GET",
                url : "roommateSearch.php",
                data : data,
                success : function(server_response){
                    $("#result-search")
                }
            });

        }
    });
});
