<?php
include "functions.php";
if(isset($_POST['func']) && !empty($_POST['func'])){

    $function = $_POST['func'];
    switch ($function){
        case 'delete_task':
            delete_task();
            break;
        case 'delete_category':
            delete_category();
            break;
        case 'add_category':
            add_category();
            break;
        case 'add_task':
            add_task();
            break;
        case 'get_tasks':
            get_tasks();
            break;
    }
}