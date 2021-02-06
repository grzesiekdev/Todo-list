<?php
include '../config/config.php';
include 'task.php';

$conf = new Config;
$access = $conf->get_access();
ini_set('display_errors', 1);
$GLOBALS['mysqli'] = new mysqli($access['host'], $access['login'], $access['password'], $access['database']);

function add_task(){
    if(isset($_POST['task']) && !empty($_POST['task'])){
        $content = $_POST['task'];
        $date = date('Y-m-d H:i:s');
        $task = new Task($content, $date);

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
    if($result = $GLOBALS['mysqli'] -> query('SELECT * FROM todolist.tasks')){
        echo '<ul>';
        while($row = $result -> fetch_row()){
            echo '<li class="result" id="task_id_' . $row[0] . '">Id: ' . $row[0] . ', content: ' . $row[1] . ', date: ' . $row[2] . '<button class="delete-task btn btn-danger" id="' . $row[0] . '" onclick="delete_task()">X</button></li>';
        }
        echo '</ul>';
    }
}
