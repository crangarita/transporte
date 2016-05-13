<?php

class vehiculoController extends Controller
{   
    public function __construct() {
        parent::__construct();
        Session::acceso('admin');
        $this->_vehiculo = $this->loadModel('vehiculo');
        $this->_radioaccion = $this->loadModel('radioaccion');
        $this->_marca = $this->loadModel('marca');
        $this->_tipo = $this->loadModel('tipo');
        $this->_tipocombustible = $this->loadModel('tipocombustible');
        /*
        $this->_estado = $this->loadModel('estado');
        $this->_categoria = $this->loadModel('categoria');
        $this->_sector = $this->loadModel('sector');
        /*
        $this->_vacuna = $this->loadModel('vacuna');
        $this->_servicio = $this->loadModel('servicio');
        $this->_vacunacion = $this->loadModel('vacunacion');
        $this->_servicioMascota = $this->loadModel('serviciomascota');
        */
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

        $datos['Placa'] = $obj->getPlaca();
        $datos['Marca'] = $obj->getMarca();
        $datos['Nummotor'] = $obj->getNummotor();
        $datos['Linea'] = $obj->getLinea();
        $datos['Numchasis'] = $obj->getNumchasis();
        $datos['Tipocarroceria'] = $obj->getTipocarroceria();
        $datos['Cilindraje'] = $obj->getCilindraje();
        $datos['Capacidad'] = $obj->getCapacidad();
        $datos['Area'] = $obj->getArea();
        $datos['Servicio'] = $obj->getServicio();
        $datos['Modelo'] = $obj->getModelo();
        $datos['Numpuertas'] = $obj->getNumpuertas();
        $datos['Numlicencia'] = $obj->getNumlicencia();
        $datos['Numtarjoperacional'] = $obj->getNumtarjoperacional();
        $datos['Area'] = $obj->getArea();
        $datos['Servicio'] = $obj->getServicio();
        $datos['Fecvenctarjoperacional'] = $obj->getFecvenctarjoperacional();
        $datos['Fecvenctecnomecanico'] = $obj->getFecvenctecnomecanico();
        $datos['Observacion'] = $obj->getObservacion();

        $datos['Radio'] = $obj->getRadio()->getDescripcion();
        $datos['Marca'] = $obj->getMarca()->getDescripcion();
        $datos['Tipo'] = $obj->getTipo()->getDescripcion();
        $datos['Tipocombustible'] = $obj->getTipocombustible()->getDescripcion();


        $arrayRta['datos'] = $datos;
        echo json_encode($arrayRta);
        exit; 
    }

    public function agregar()
    {
    	$this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Agregar';
        
		$this->_view->marcas = $this->_marca->resultList();
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

    public function actualizar($id=0)
    {
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());

        $this->_view->titulo = ucwords($this->_presentRequest->getControlador()).' :: Actualizar';

        $this->_view->marcas = $this->_marca->resultList();
        $this->_view->tipos = $this->_tipo->resultList();
        $this->_view->radios = $this->_radioaccion->resultList();
        $this->_view->tipocombustibles = $this->_tipocombustible->resultList();


        //$this->_view->razas = $this->_raza->resultList();
        //$this->_view->clientes = $this->_cliente->resultList();
        //$this->_view->vacunas = $this->_vacuna->findBy(array('veterinario' => Session::get('usuario')));
        //$this->_view->servicios = $this->_servicio->findBy(array('veterinario' => Session::get('usuario')));

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

        $this->_view->metodo = "editar";
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

        $this->_model->getInstance()->setPlaca($this->getTexto('placa'));
        $this->_model->getInstance()->setMarca($this->getTexto('marca'));
        $this->_model->getInstance()->setNummotor($this->getTexto('nummotor'));
        $this->_model->getInstance()->setLinea($this->getTexto('linea'));
        $this->_model->getInstance()->setNumchasis($this->getTexto('numchasis'));

        $this->_model->getInstance()->setTipocarroceria($this->getTexto('tipocarroceria'));
        $this->_model->getInstance()->setCilindraje($this->getTexto('cilindraje'));
        $this->_model->getInstance()->setCapacidad($this->getInt('capacidad'));
        $this->_model->getInstance()->setArea($this->getInt('area'));
        $this->_model->getInstance()->setServicio($this->getTexto('servicio'));

        $this->_model->getInstance()->setModelo($this->getTexto('modelo'));
        $this->_model->getInstance()->setNumpuertas($this->getInt('numpuertas'));
        $this->_model->getInstance()->setNumlicencia($this->getTexto('numlicencia'));
        $this->_model->getInstance()->setNumtarjoperacional($this->getTexto('numtarjoperacional'));

        $this->_model->getInstance()->setArea($this->getInt('area'));
        $this->_model->getInstance()->setServicio($this->getTexto('servicio'));

        $this->_model->getInstance()->setFecvenctarjoperacional(new \DateTime($this->getFecha($this->getTexto('fecvenctarjoperacional'))));
        $this->_model->getInstance()->setFecvenctecnomecanico(new \DateTime($this->getFecha($this->getTexto('fecvenctecnomecanico'))));

        $this->_model->getInstance()->setRadio($this->_radioaccion->get($this->getInt('radio')));
        $this->_model->getInstance()->setMarca($this->_marca->get($this->getInt('marca')));
        $this->_model->getInstance()->setTipo($this->_tipo->get($this->getInt('tipo')));
        $this->_model->getInstance()->setCombustible($this->_tipocombustible->get($this->getInt('tipocombustible')));

        $this->_model->getInstance()->setObservacion($this->getTexto('observacion'));

        for ($i=1; $i <= 2; $i++) { 
            
            if ($_FILES['imagen'.$i]['tmp_name']){

                $configSubir = array();
                $configRender = array();

                $configSubir['allowed_types'] = 'jpg|png|jpeg';
                $configSubir['file_name'] = $this->_model->getInstance()->getPlaca()."_".$i;

                $configRender['new_image']=ROOT.'public'.DS.'img'.DS.'vehiculos'.DS;
                $configRender['width']=600;//245
                $configRender['height']=388;//184

                /*if($this->_model->getInstance()->getImagen()){
                    unlink(ROOT.'public'.DS.'img'.DS.'nosotros'.DS.$empresa.'.'.$this->_model->getInstance()->getImagen());
                }*/

                $rta = $this->subirImg($configSubir,$configRender,'imagen'.$i);
            
                if($rta){
                    Session::set('error',$rta.'</b>');
                    $this->redireccionar("vehiculo");
                    exit;
                }

            }
        }
        
        if($new){
            $this->_model->save(); 
            Session::set('mensaje','Registro Creado con Exito.');
        }else{
            $this->_model->update(); 
            Session::set('mensaje','Registro Actualizado con Exito.');
        }

        $this->redireccionar($this->_presentRequest->getControlador().'/');
    }




    

    public function agregarVacuna(){

        $this->_vacunacion->getInstance()->setMascota($this->_mascota->get($this->getInt("mascota")));
        $this->_vacunacion->getInstance()->setVacuna($this->_vacuna->get($this->getInt("vacuna")));
        $this->_vacunacion->getInstance()->setFechaProg(new \DateTime($this->getFecha($this->getTexto('fechaProg'))));
        $this->_vacunacion->getInstance()->setObservacion($this->getTexto('observacion'));
        try {
            $this->_vacunacion->save();
            Session::set('mensaje','La <b>Vacuna</b> se Registro Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->_mascota->getInstance()->getId()."/");

    }

    public function agregarServicio(){

        $this->_servicioMascota->getInstance()->setMascota($this->_mascota->get($this->getInt("mascota")));
        $this->_servicioMascota->getInstance()->setServicio($this->_servicio->get($this->getInt("servicio")));
        $this->_servicioMascota->getInstance()->setFechaProg(new \DateTime($this->getFecha($this->getTexto('fechaProg'))));
        $this->_servicioMascota->getInstance()->setObservacion($this->getTexto('observacion'));
        try {
            $this->_servicioMascota->save();
            Session::set('mensaje','El <b>Servicio</b> se Registro Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');            
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->_mascota->getInstance()->getId()."/");

    }

    public function asignarVacuna(){

        $this->_vacunacion->get($this->getInt("vacuna"));
        $this->_vacunacion->getInstance()->setFechaReal(new \DateTime($this->getFecha('fechaRealVacuna')));
        try {
            $this->_vacunacion->update();
            Session::set('mensaje','La <b>Vacuna</b> se Asigno Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');          
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->getInt("mascota")."/");

    }

    public function asignarServicio(){

        $this->_servicioMascota->get($this->getInt("servicio"));
        $this->_servicioMascota->getInstance()->setFechaReal(new \DateTime($this->getFecha('fechaRealServicio')));
        try {
            $this->_servicioMascota->update();
            Session::set('mensaje','El <b>Servicio</b> se Asigno Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');   
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$this->getInt("mascota")."/");

    }

    public function desactivarVacuna($mascota=0,$vacuna=0){

        $this->_vacunacion->get($vacuna);
        try {
            $this->_vacunacion->delete();
            Session::set('mensaje','La <b>Vacuna</b> se Elimino Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$mascota."/");

    }

    public function desactivarServicio($mascota=0,$servicio=0){

        $this->_servicioMascota->get($servicio);
        try {
            $this->_servicioMascota->delete();
            Session::set('mensaje','La <b>Vacuna</b> se Elimino Correctamente.');
        } catch (Exception $e) {
            Session::set('error','Error en el Proceso.');
        }
        $this->redireccionar($this->_presentRequest->getControlador().'/actualizar/'.$mascota."/");
        
    }
	
	
	public function fichaVehiculo($placa=""){
		//$this->_model->get($this->filtrarInt($id));
		
		$this->getLibrary('phpjasperxml/jasperpdf');
		
		$pdf = new Jasperpdf();
		
		$pdf->generarFicha($placa);
	}

}

?>