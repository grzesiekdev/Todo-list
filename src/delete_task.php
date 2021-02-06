<?php
include '../config/config.php';
$query = 'DELETE FROM todolist.tasks WHERE TaskId="' . $_POST["id"] . '";';
$conf = new Config;
$access = $conf->get_access();
$mysqli = new mysqli($access['host'], $access['login'], $access['password'], $access['database']);
if($mysqli -> query($query) === TRUE){
    echo "Deleted successfully";
} else{
    echo "Error occurred during deleting record!" . $mysqli -> error;
}