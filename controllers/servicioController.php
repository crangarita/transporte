<?php

class servicioController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('veterinario');

        $this->_veterinario = $this->loadModel('veterinario');

    }
    
    public function index()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Listado';

    	$this->_view->datos = $this->_model->findBy(array('veterinario' => Session::get('usuario')));

    	$this->_view->setJsP(array('dataTables/jquery.dataTables','dataTables/dataTables.bootstrap'));
        $this->_view->setCssP(array('dataTables.bootstrap'));

        $this->_view->renderizar('index', ucwords(strtolower($this->_presentRequest->getControlador())));
    }

    public function get()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	header('Content-type: application/json');
        
        $arrayRta = array('error'=>false);

        if(!$_POST){
            $arrayRta['error'] = 'Error';
            echo json_encode($arrayRta);
            exit;   
        }

        if($this->getInt('id')<1){
            $arrayRta['error'] = 'Error de id';
            echo json_encode($arrayRta);
            exit;   
        }

        $obj = $this->_model->get($this->getInt('id'));
        if(!$obj){
        	$arrayRta['error'] = ' Elemento no existe';
            echo json_encode($arrayRta);
            exit; 
        }

        $datos = array();

        $datos['Codigo'] = $obj->getId();
        $datos['Descripcion'] = $obj->getDescripcion();

        $arrayRta['datos'] = $datos;
        echo json_encode($arrayRta);
        exit; 
    }

    public function agregar()
    {
    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Agregar';

    	if($_POST){
        	$this->_model = $this->loadModel($this->_presentRequest->getControlador());
            $this->obj();
        }
    	
        $this->_view->renderizar('obj', ucwords(strtolower($this->_presentRequest->getControlador())));

    }

    public function actualizar($id=0)
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

        $this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Actualizar'; 

        if($this->filtrarInt($id)<1){
            Session::set('error','Registro no encontrado.');
            $this->redireccionar();
        }

        $this->_model->get($this->filtrarInt($id));

        if(!$this->_model->getInstance()){
            Session::set('error','Registro no encontrado.');
            $this->redireccionar();
        }

        $this->_view->dato = $this->_model->getInstance();

        if($_POST){
            $this->obj(false);
        }

        $this->_view->renderizar('obj', ucwords(strtolower($this->_presentRequest->getControlador())));
    }

    private function obj($new = true)
    {
        $rta = $this->validarArrays($arrayTexto);
        if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }

        $this->_model->getInstance()->setDescripcion($this->getTexto('descripcion'));
        $this->_model->getInstance()->setVeterinario($this->_veterinario->get(Session::get('usuario')));

        if($new){
            $this->_model->save(); 
            Session::set('mensaje','Registro creado con exito.');
        }else{
            $this->_model->update(); 
            Session::set('mensaje','Registro actualizado con exito.');
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

}

?>