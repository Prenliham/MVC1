<?php

class App{
    private $controller = "HomeController",
            $method = "index",
            $params = [];

    public function __construct()
    {
        $url = $this->parseURL();

        // controller 
        if (!empty($url)) {
            $controller =ucfirst($url[0]);
            $controller.= "Controller";
            if (file_exists("../app/controllers/".$controller.".php")) {
                $this->controller = $controller;
                unset($url[0]);
            }
        }

        require_once "../app/controllers/" . $this->controller . ".php";
        $this->controller = new $this->controller();

        // method 
        if (isset($url[1])) {
            $method = $url[1];
            if (method_exists($this->controller, $method)) {
                $this->method = $method;
                unset($url[1]);
            }else{
                header("Location:". BASEURL . "/home");
                exit;
            }
        }

        // params 
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    
    }


    public function parseURL()
    {
        if (isset($_GET['url'])) {
            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}