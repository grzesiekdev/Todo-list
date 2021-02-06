<?php
class Config{
    private string $host = 'localhost';
    private string $database = 'todolist';
    private string $login = 'debian-sys-maint';
    private string $password = '';

    public function get_access(): array
    {
        return array(
            'host' => $this->host,
            'database' => $this->database,
            'login' => $this->login,
            'password' => $this->password
        );
    }

}