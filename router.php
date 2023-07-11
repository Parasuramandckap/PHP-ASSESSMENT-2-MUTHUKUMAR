<?php

class Router
{
    public $routes = [];
    public $controller = [];
    public function __construct()

    {
        $this->controller =  new UserController();
    }

    public function get($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'GET',
        ];

    }

    public function post($uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
        ];

    }

    public function route()
    {
        foreach ($this->routes as $route){
            if($route["uri"] === $_SERVER["REQUEST_URI"]){
                $action  = $route["controller"];
                switch ($action){
                    case "index":
                        $this->controller->index();
                        break;
                    case "add_db":
                        $this->controller->showDbForm();
                        break;
                    case "create-db":
                        $this->controller->createDb($_POST);
                        break;
                    case "add-table":
                        $this->controller->showTableForm();
                        break;
                    case "create-table":
                        $this->controller->createTable($_POST);
                        break;
                    case "add-row":
                        $this->controller->showRecordForm();
                        break;
                }
            }
        }
    }
}
