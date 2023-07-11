<?php
require "router.php";
session_start();
require "controller/UserController.php";




$controller = new Router();
$controller->post("/","index");
//database creation;
$controller->post("/add-db","add_db");
$controller->post("/create-db","create-db");
//table creation;
$controller->post("/add-table","add-table");
$controller->post("/create-table","create-table");
//add record or row
$controller->post("/add-row","add-row");



$userController  = new UserController();
$userController->getTable($_POST["database"]);

if (isset($_POST["tbName"])){
   $userController->getRow($_POST);
}


$controller->route();








