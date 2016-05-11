<?php

class veterinarioController extends Controller
{   
    public function __construct() {
        parent::__construct();
        //Session::acceso('admin');
    }
    
    public function index()
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Listado';

    	$this->_view->datos = $this->_model->resultList();

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

        $datos['Codigo'] = $obj->getCodigo();
        $datos['Nombre'] = $obj->getNombre();
        $datos['Usuario'] = $obj->getUsuario();
        $datos['Direccion'] = $obj->getDireccion();
        $datos['Telefono'] = $obj->getTelefono();
        $datos['Email'] = $obj->getEmail();

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
            Session::set('error','Registro No Encontrado.');
            $this->redireccionar();
        }

        $this->_model->get($this->filtrarInt($id));

        if(!$this->_model->getInstance()){
            Session::set('error','Registro No Encontrado.');
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
        $arrayTexto = array('nombre', 'direccion', 'telefono', 'usuario', 'email');
        $rta = $this->validarArrays($arrayTexto);
        if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }
        if($new){
          $user = $this->_model->findByObject(array('usuario' => $this->getTexto('usuario')));
          if($user){
              Session::set('error','El Usuario ya Existe, Debe Cambiarlo');
              $this->redireccionar($this->_presentRequest->getUrl());
              exit;
          }
        }

        $this->_model->getInstance()->setNombre($this->getTexto('nombre'));
        if($new){
            $this->_model->getInstance()->setUsuario($this->getTexto('usuario'));
        }
        $this->_model->getInstance()->setClave(Hash::getHash('sha1', '1234', HASH_KEY));
        $this->_model->getInstance()->setDireccion($this->getTexto('direccion'));
        $this->_model->getInstance()->setTelefono($this->getTexto('telefono'));
        $this->_model->getInstance()->setEmail($this->getTexto('email'));

        if($new){
            $this->_model->save(); 
            Session::set('mensaje','Registro Creado con Exito.');
        }else{
            $this->_model->update(); 
            Session::set('mensaje','Registro Actualizado con Exito.');
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

}

?>