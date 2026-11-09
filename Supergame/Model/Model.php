<?php class Model{
    protected PDO $bdd;

    public function __construct(){
        $this->bdd = new PDO("mysql:host={$_ENV['dbhost']};dbname={$_ENV['dbname']}",$_ENV['login'],$_ENV['password']);
    }

    public function getBdd():PDO{
        return $this->bdd;
    }
}?>