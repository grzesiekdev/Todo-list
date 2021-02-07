<?php
class Task{
    public string $content;
    public string $date;
    public string $category;

    function __construct($content, $date, $category){
        $this->content = $content;
        $this->date = $date;
        $this->category = $category;
    }

    function insert_into_db(): string{
        return 'INSERT INTO todolist.tasks (content, Date, Category) VALUES ("' . $this->content . '", "' . $this->date . '", "' . $this->category . '")';
    }

    function render_task($id){
        return '<li class="result" id="task_id_' . $id . '"><input type="checkbox" style="margin:10px;" class="task_done" id="check_' . $id . '">' . $id. '. ' . $this->content . ' <div class="date"> ' . $this->date . '</div><button class="delete-task btn btn-danger" id="' . $id . '" onclick="delete_task()">X</button></li>';
    }
}