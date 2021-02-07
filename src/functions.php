<?php
include '../config/config.php';
include 'task.php';

$conf = new Config;
$access = $conf->get_access();
ini_set('display_errors', 1);
$GLOBALS['mysqli'] = new mysqli($access['host'], $access['login'], $access['password'], $access['database']);

function add_task(){
    if(isset($_POST['task']) && !empty($_POST['task'])){
        if(isset($_POST['category']) && $_POST['category'] != '' && $_POST['category'] != 'choose'){
            $category = $_POST['category'];
        } else {
            echo '<span style="color: red;">You must choose category!</span>';
            return;
        }
        $content = $_POST['task'];
        $date = date('Y-m-d H:i:s');
        $task = new Task($content, $date, $category);

        if ($GLOBALS['mysqli'] -> connect_errno){
            die('Connection failed :( please try again later. Error: ' . $GLOBALS['mysqli'] -> connect_error);
        }

        if ($GLOBALS['mysqli'] -> query($task->insert_into_db()) === TRUE){
            echo '<span style="color: forestgreen;">Successfully added new task to list.</span><br>';
        } else {
            echo 'Error occurred: ' . $GLOBALS['mysqli'] -> error;
        }
    }
    else{
        echo '<span style="color: red"> Form is empty or filled incorrectly! </span>';
    }
}

function get_tasks(){
    $categories = get_categories();
    foreach ($categories as $val){
        echo '<div id="cat_'. $val .'"><span style="margin-left: 20px; font-size: 18px; font-weight: 600; text-transform: capitalize;"> ' . $val . '</span><button id="'. $val .'" style="margin-bottom: 10px; margin-left: 10px;" class="btn btn-warning" onclick="delete_category();">X</button>';
        if($result = $GLOBALS['mysqli'] -> query('SELECT * FROM todolist.tasks WHERE tasks.Category = "' . $val . '";')){
            echo '<ul>';
            while($row = $result -> fetch_row()){
                $task = new Task($row[1], $row[2], $val);
                echo $task->render_task($row[0]);
            }
            echo '</ul></div>';
        } else {
            echo $GLOBALS['mysqli'] -> error;
        }
    }
}

function get_categories(){
    $categories = array();
    if($result = $GLOBALS['mysqli'] -> query('SELECT * FROM todolist.categories')){
        while($row = $result -> fetch_row()){
            $categories[$row[0]] = $row[1];
        }
        return $categories;
    }
}

function delete_task(){
    $query = 'DELETE FROM todolist.tasks WHERE TaskId="' . $_POST["id"] . '";';
    if($GLOBALS['mysqli'] -> query($query) === TRUE){
        echo "Deleted successfully";
    } else{
        echo "Error occurred during deleting record!" . $GLOBALS['mysqli'] -> error;
    }
}

function delete_category(){
    if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])){
        $category_name = $_POST['cat_id'];
        $query_tasks = 'DELETE FROM todolist.tasks WHERE Category = "' . $category_name . '";';
        $query_categories = 'DELETE FROM todolist.categories WHERE Name = "' . $category_name . '";';

        if ($GLOBALS['mysqli'] -> query($query_tasks) === TRUE && $GLOBALS['mysqli'] -> query($query_categories) === TRUE){
            echo "Deleted whole category";
        }
    } else{
        echo "wrong query";
    }
}
function add_category(){
    if(isset($_POST['added_category']) && !empty($_POST['added_category'])){
        $categories = get_categories();
        if(in_array($_POST['added_category'], $categories)){
            echo "This category already exists!";
        } else {
            $query = 'INSERT INTO todolist.categories (Name) VALUES("' . $_POST["added_category"] . '");';
            if($GLOBALS['mysqli'] -> query($query) === TRUE){
                echo '<span style="color: green;">Added category</span>';
            } else{
                echo "Error occurred during adding category!" . $GLOBALS['mysqli'] -> error;
            }
        }
    } else {
        echo '<span style="color: red">You have to provide category name!</span>';
    }
}