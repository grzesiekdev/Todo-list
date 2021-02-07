function delete_task(){
    let id = $(event.target)[0].id;
    $.ajax({
        type: 'POST',
        url: '../src/check_func.php',
        data: {id: $(event.target)[0].id, func: "delete_task"},
        success: function(result){
            $("#task_id_" + id).remove();
        },
        error: function (data){
            console.log(data);
        }
    });
}

function delete_category(){
    let cat_id = $(event.target)[0].id;
    $.ajax({
        type: 'POST',
        url: '../src/check_func.php',
        data: {cat_id: $(event.target)[0].id, func: "delete_category"},
        success: function(result){
            $("#cat_"+cat_id).remove();
        },
        error: function (data){
            console.log(data);
        }
    });
}
function add_category(){
    $.ajax({
        type: 'POST',
        url: '../src/check_func.php',
        data: {added_category: $("#added_category").val(), func: "add_category"},
        success: function(data){
            $('#message').html(data);
            document.getElementById("cat_form").reset();
        },
        error: function (data, text,errorThrown) {
            alert("ERROR");
        },
    });
}

function add_task(){
    $.ajax({
        type: 'POST',
        url: '../src/check_func.php',
        data: {task: $("#task").val(), category: $("#categories").val(), func: "add_task"},
        success: function(data){
            $('#message').html(data);
            document.getElementById("task_form").reset();
        },
        error: function (data, text,errorThrown) {
            alert("ERROR");
        },
    });
}
function get_tasks(){
    $.ajax({
        type: 'POST',
        url: '../src/check_func.php',
        data: {func: "get_tasks"},
        success: function(data){
            $('main').html(data);
        },
        error: function (data, text,errorThrown) {
            alert("ERROR");
        },
    });
}

window.onload = get_tasks();