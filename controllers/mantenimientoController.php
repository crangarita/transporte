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
        //$this->_cliente = $this->loadModel('cliente');
        //$this->_mascota = $this->loadModel('mascota');
        //$this->_vacuna = $this->loadModel('vacuna');
        //$this->_servicio = $this->loadModel('servicio');
        //$this->_vacunacion = $this->loadModel('vacunacion');
        //$this->_servicioMascota = $this->loadModel('serviciomascota');
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

        /*
        $this->_view->itemfrecuencias = 

         $this->_view->estudiantes = $this->_asisEstudiante->dql("SELECT a FROM Entities\AsisEstudiante a 
            JOIN a.estudiante est where a.numAsistencia =:numAsistencia 
            ORDER BY est.estapellido1, est.estapellido2, est.estnombre1, est.estnombre2 ", 
            array('numAsistencia' => $this->_asistencia->getInstance()->getNumero()));
           

        foreach ($this->_itemfrecuencia->resultList() as $key => $dato) {

        }
        */
        /*
        $this->_view->tipos = $this->_tipo->resultList();
        $this->_view->radios = $this->_radioaccion->resultList();
        $this->_view->tipocombustibles = $this->_tipocombustible->resultList();
        /*
        $this->_view->categorias = $this->_categoria->resultList();
        $this->_view->sectores = $this->_sector->resultList();
        */
        //$this->_view->clientes = $this->_cliente->findBy(array('veterinario' => Session::get('usuario')));

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
        $this->_model->getInstance()->setFrecuencia($this->_frecuencia->get($this->getInt('frecuencia')));
        $this->_model->getInstance()->setRevisor($this->getTexto('revisor'));
        $this->_model->getInstance()->setConductor($this->getTexto('conductor'));
        $this->_model->getInstance()->setVehiculo($this->_vehiculo->get($this->getInt('vehiculo')));
        $this->_model->getInstance()->setFalla($this->getTexto('falla'));
        $this->_model->getInstance()->setReparacion($this->getTexto('reparacion'));




        
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