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

    function render_task($id): string{
        return '<li class="result" id="task_id_' . $id . '"><div class="col-1"><input type="checkbox" style="margin:10px;" class="task_done" id="check_' . $id . '">' . $id. '. </div><div class="col-6" style="word-wrap: break-word;">' . $this->content . ' </div><div class="col-3" style="margin-left: 10%;"> ' . $this->date . '</div><div class="col-2"><button class="delete-task btn btn-danger" id="' . $id . '" onclick="delete_task()">X</button></div></li>';
    }
}