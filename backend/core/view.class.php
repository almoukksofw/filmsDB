<?php


namespace core;

class View
{

    private $template;
    

    private $vars;
    
  
    public function __construct(){
        $this->vars = [];
        $this->add('_webroot', Router::getInstance()->getWebroot());
    }
    

    public function setTemplate($value){
        $this->template = '../templates/' . $value . '.template.php';
    }
 

    public function add($key, $value)
    {
        $this->vars[$key] = $value;
    }
    

    public function render()
    {
        extract($this->vars);
        require $this->template;
    }
}
