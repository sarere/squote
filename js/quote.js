$(document).ready(function(){
    
    $('#search').keyup(function() {
        var input  = $('#search').val();
        if(input != ""){
            $.ajax({
                url:'ajaxfilter.php',
                type:'POST',
                data:'request='+input,
                beforeSend:function(){
                    $(".left-side").html('Working on...');
                },
                success:function(data){
                    $(".left-side").html(data);
                    adjustment();
                }
            });
        }
        else{
            $.ajax({
                url:'ajaxfilter.php',
                type:'POST',
                data:'request=',
                beforeSend:function(){
                    $(".left-side").html('Working on...');
                },
                success:function(data){
                    $(".left-side").html(data);
                    adjustment();
                }
            });
        }
    });
});