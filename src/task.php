<?php
class Task{
    public string $content;
    public string $date;

    function __construct($content, $date){
        $this->content = $content;
        $this->date = $date;
    }

    function insert_into_db(): string{
        return 'INSERT INTO todolist.tasks (content, Date) VALUES ("' . $this->content . '", "' . $this->date . '")';
    }
}