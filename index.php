<?php
session_start();
require "router.php";
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

$controller->route();








