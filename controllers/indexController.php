<?php

class indexController extends Controller
{   
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
    	$this->_view->titulo = '';

    	if(Session::get('autenticado') /*|| $this->_presentRequest->getControlador() == 'login'*/){
        	$this->_view->renderizar('indexLogin', 'inicio');
        }else{
        	$this->_view->renderizar('index', 'inicio');
	        //$this->redireccionar("home");
		//header('Location: http://www.cuidavet.com/home/');
        	//$this->_view->renderizar('login', 'inicio');
        }
        
    }
}

?>