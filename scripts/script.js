$(document).ready(function(){
    $(".task_done").change(function (){
        let is_checked = $(this).is(":checked");
        let parent = $(this).parent().attr('id');
        if(is_checked){
            $('#'+parent).css({"opacity": "0.3", "text-decoration": "line-through"});
        } else{
            $('#'+parent).css({"opacity": "1", "text-decoration": "none"});
        }
    });
});

