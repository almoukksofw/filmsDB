<?php

namespace core;

class Router{

    private static $instance;
    private $allowed_routes;
    private $request;
    private $active_route;
    private $webroot;
    

    private function __construct(){ 
    }


    public static function getInstance(){
        if (!isset(self::$instance))
        {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    
    private function getAllowedRoutes()
    {
        if (!isset($this->allowed_routes))
        {
            require '../include/routes.conf.php';
        }
        return $this->allowed_routes;
    }
    
    private function getRequest()
    {
        if (!isset($this->request))
        {
            $this->request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
        }
        return $this->request;
    }

    public function getWebroot(){
        if (!isset($this->webroot))
        {
        
            $script = $_SERVER['SCRIPT_NAME'];

            $this->webroot = dirname($script);
    
            if ($this->webroot != '/') {
                $this->webroot .= '/';
            }
        }
        return $this->webroot;
    }


    private function matchRequest()
    {
        foreach ($this->getAllowedRoutes() as $route)
        {
            if ($route->matches($this->getRequest()))
            {
                $this->active_route = $route;           
                return true;                         
            }
        }
        return false;
    }


    public function go()
    {
        if (!$this->matchRequest())
        {
            header("HTTP/1.0 404 Not Found");
            $view = new View();
            $view->setTemplate('404');
            $view->render();
        }
        else
        {
            $this->active_route->deploy();
        }
    }
}