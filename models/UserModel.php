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

    public function getTable($datbaseName){
      return $this->database->query("SELECT TABLE_NAME AS tablesname,TABLE_SCHEMA FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA='$datbaseName'")->fetchAll(PDO::FETCH_OBJ);
    }
    public function getRow($database,$tableName){
        return $this->database->query("SELECT column_name as columns FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$database'AND TABLE_NAME='$tableName'")->fetchAll(PDO::FETCH_OBJ);
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