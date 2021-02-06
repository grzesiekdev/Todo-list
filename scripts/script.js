function delete_task(){
    let id = $(event.target)[0].id;
    $.ajax({
        type: 'POST',
        url: '../src/delete_task.php',
        data: {id: $(event.target)[0].id},
        success: function(result){
            $("#task_id_" + id).remove();
        },
        error: function (data){
            console.log(data);
        }
    });
}