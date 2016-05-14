<?php

class mantenimientoController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('admin');
        $this->_mantenimiento = $this->loadModel('mantenimiento');
        //Session::acceso('veterinario');
        $this->_frecuencia = $this->loadModel('frecuencia');
        $this->_vehiculo = $this->loadModel('vehiculo');
        $this->_itemfrecuencia = $this->loadModel('itemfrecuencia');
        $this->_itemmantenimientoprev = $this->loadModel('itemmantenimientoprev');
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

        $datos['Fecha'] = $obj->getFecha();
        $datos['Observaciones'] = $obj->getObservaciones();
        $datos['Falla'] = $obj->getFalla();
        $datos['Reparacion'] = $obj->getReparacion();

        $datos['Conductor'] = $obj->getConductor();
        $datos['Revisor'] = $obj->getRevisor();
        $datos['Tipo'] = $obj->getTipo();


        $datos['Frecuencia'] = $obj->getFrecuencia()->getDescripcion();



        $arrayRta['datos'] = $datos;
        echo json_encode($arrayRta);
        exit; 
    }

    public function agregar($id=0)
    {
        $this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Agregar';
        $this->_view->frecuencias = $this->_frecuencia->resultList();
        $this->_view->itemfrecuencias = $this->_itemfrecuencia->dql("SELECT i FROM Entities\Itemfrecuencia i 
            JOIN i.frecuencia f 
            WHERE f.id =:idFrec", array('idFrec' => '2'));
        $this->_view->vehiculo = $this->_vehiculo->get($id);

        if($_POST){
            $this->_model = $this->loadModel($this->_presentRequest->getControlador());
            $this->obj();
        }
        
        $this->_view->renderizar('obj', ucwords(strtolower($this->_presentRequest->getControlador())));

    }

     private function obj($new = true)
    {
        //$arrayTexto = array('nombre', 'fechaNac', 'descripcion');
        //$arrayInt = array('raza', 'cliente');
        //$rta = $this->validarArrays($arrayTexto,$arrayInt);
        /*if($rta){
            Session::set('error','Falto digitar o seleccionar <b>'.$rta.'</b>');
            $this->redireccionar($this->_presentRequest->getUrl());
            exit;  
        }*/

        $this->_model->getInstance()->setFecha(new \DateTime($this->getFecha($this->getTexto('fecha'))));
        $this->_model->getInstance()->setObservaciones($this->getTexto('observacion'));
        $this->_model->getInstance()->setTipo($this->getInt('tipo'));
        if($this->getInt('tipo') == 2){
            $this->_model->getInstance()->setFrecuencia($this->_frecuencia->get(1));    
        }else{
            $this->_model->getInstance()->setFrecuencia($this->_frecuencia->get($this->getInt('frecuencia')));
        }
        $this->_model->getInstance()->setFrecuencia($this->_frecuencia->get($this->getInt('frecuencia')));
        $this->_model->getInstance()->setRevisor($this->getTexto('revisor'));
        $this->_model->getInstance()->setConductor($this->getTexto('conductor'));
        $this->_model->getInstance()->setVehiculo($this->_vehiculo->get($this->getInt('vehiculo')));
        
        if($this->getInt('tipo') == 2){
            $this->_model->getInstance()->setFalla($this->getTexto('falla'));
            $this->_model->getInstance()->setReparacion($this->getTexto('reparacion'));
            $this->_model->save();
        }else{
            $temp = $this->_itemfrecuencia->findBy(array('frecuencia' => $this->getInt("frecuencia")));
            $this->_model->save();
            foreach ($temp as $key => $value) {
                $this->_itemmantenimientoprev = $this->loadModel('itemmantenimientoprev');
                $this->_itemmantenimientoprev->getInstance()->setMantenimiento($this->_model->getInstance()); 
                $this->_itemmantenimientoprev->getInstance()->setItemFrecuencia($this->_itemfrecuencia->get($value->getId())); 
                $valor = "radio".$value->getId();
               // echo $valor;
                $this->_itemmantenimientoprev->getInstance()->setEstado($this->getPostParam($valor));
                //exit;
                //var_dump($this->_itemmantenimientoprev->getInstance());
                //exit;
                $this->_itemmantenimientoprev->save();
            }
        }

        if($new){
            Session::set('mensaje','Registro Creado con Exito.');
        }else{
            $this->_model->update(); 
            Session::set('mensaje','Registro Actualizado con Exito.');
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }

    public function cargarItem(){

        header('Content-type: application/json');
        $frecuencia = $this->getInt("frecuencia");
        $arrayRta = array();
        $array = array();
        $arrayInt = array();
        $temp = $this->_itemfrecuencia->findBy(array("frecuencia" => $frecuencia));
        foreach ($temp as $key => $value) {
            $array['id'] = $value->getId();
            $array['descripcion'] = $value->getItem()->getDescripcion();
            $arrayInt[] = $array;
        }
        $arrayRta['datos'] = $arrayInt;
        echo json_encode($arrayRta);
        exit; 
    }

}

?>