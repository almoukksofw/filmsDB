<?php

namespace app\controllers;
use app\controllers\Controller;
use app\models\Films;
use core\Router;

require 'controller.class.php';

class filmController extends Controller{

    public function films_index(){
        $data=[];
        $films=Films::index();

        foreach($films as $film){
            $data[]=$film->getData();
        }
        $this->json->add( 'films', $data);
        $this->json->render();
    }



    public function FilmShow(){

        $film = new Films();
        $UriString=explode('/' , $_SERVER['REQUEST_URI']); 
        $id=$UriString[sizeof($UriString)-1 ] ; 
        
        $film->setId($id);
        $film->load($success);
        if (!$success){
        }else{
            $filmData=$film->getData();
            $filmData["acteurs"]=$film->getActeurs();
            $filmData["regisseur"]=$film->getRegisseur();
            $this->json->add('film', $filmData  );   
        }
        $this->json->render();
    }
    

}