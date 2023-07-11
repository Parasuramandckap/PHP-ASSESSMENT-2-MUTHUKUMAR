<?php


class UserModel extends database {
    public function createDatabase($name){
        $databaseName = $name;
        $this->database->query("CREATE DATABASE $databaseName");
    }

    public function getDatabase(){
        return $this->database->query("show databases")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function creationTable($dbname,$tablename,$column,$datatype){




        $this->database->query("
        USE $dbname;
        CREATE TABLE $tablename (
        id int auto_increment,
        primary key (id)
        )
        ");
        for ($i=0;$i<count($column);$i++){
            $this->database->query("
                USE $dbname;
                ALTER TABLE $tablename ADD COLUMN $column[$i] $datatype[$i];
                ");
        }
        header("location:/");
    }


}




class Database{
    public $database;
    public function __construct()
    {
        try{
            $this->database = new PDO('mysql:host=localhost','admin','welcome');
        }
        catch (exception $e){;
            die("connection error".$e->getMessage());
        }
    }
}