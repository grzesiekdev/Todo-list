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
}