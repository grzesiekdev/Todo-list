<!DOCTYPE HTML>
<html>
<head>
    <title>Todo list v0.2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/style.css" type="text/css">
    <script type="text/javascript" src="../scripts/ajax_calls.js"></script>
    <script type="text/javascript" src="../scripts/script.js"></script>
</head>
<body>
<?php include '../src/functions.php'; ?>
<?php $categories = get_categories(); ?>
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <small class="text-muted">11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        Hello, world! This is a toast message.
    </div>
</div>
<div id="message"></div>
    <div class="container-1">
        <div class="row">
            <div class="col-12">
                <form method="POST" class="form" id="task_form">
                    Task:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" name="task" id="task"/>
                    Category: <select name="category" id="categories" class="form-select form-select-sm" aria-label=".form-select-sm example" value="choose">
                        <option value="choose" hidden>Choose category of your task</option>
                        <?php
                        foreach ($categories as $val){
                            echo '<option value="' . $val . '">' . $val . '</option>';
                        }
                        ?>
                    </select>
                    <button type="submit" name="submit" value="Submit" class="btn btn-primary" onclick="add_task(); get_tasks();"> Add task </button>
                </form>
            </div>
            <div class="col-12">
                <form method="POST" class="form" id="cat_form">
                    Category: <input type="text" name="added_category" id="added_category" />
                    <button type="submit" name="submit" value="Submit" class="btn btn-primary"> Add category </button>
                </form>
            </div>
        </div>
        <div class="row">
            <main onload="get_tasks();"></main>
        </div>
    </div>
</body>
</html>