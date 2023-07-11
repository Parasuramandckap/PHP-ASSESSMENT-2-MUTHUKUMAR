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

         $dbname = $tableData["database"];
         $tableName = $tableData["table-name"];
         $columnName = $tableData["clounm-name"];
         $datatype = $tableData["data-type"];
        $this->userModel->creationTable($dbname,$tableName,$columnName,$datatype);
    }
    public function showRecordForm(){

        $allDB = $this->userModel->getDatabase();
        require "views/user/addRecord/addRecord.php";


    }
    public function getTable($data){
       $getTable = $this->userModel->getTable($data);
       echo json_encode($getTable);
    }
    public function getRow($insetRow){

        $tableName = $insetRow['tbName'];
        $databaseName = $insetRow["database"];
        $tableData =  $this->userModel->getRow($databaseName,$tableName);
        echo json_encode($tableData);


    }

}
