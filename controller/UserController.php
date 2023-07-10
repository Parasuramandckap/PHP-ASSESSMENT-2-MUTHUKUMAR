<?php
require "models/UserModel.php";

class UserController{
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        require "views/user/index.php";
    }
    public function showDbForm(){
        require "views/user/addDatabase/create_database.php";
    }
    public function createDb($databaseName){
       $this->userModel->createDatabase($databaseName["db-name"]);
        header("location: / ");
    }
    public function showTableForm(){
        $allDb =  $this->userModel->getDatabase();
        require "views/user/addTable/addTable.php";

    }
    public function createTable($tableData){
        $this->userModel->creationTable($tableData);
    }
    public function showRecordForm(){
        $allDB = $this->userModel->getDatabase();
        require "views/user/addRecord/addRecord.php";
    }


}
