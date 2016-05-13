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
        $datos['Numero Motor'] = $obj->getNummotor();
        $datos['Linea'] = $obj->getLinea();
        $datos['Numero Chasis'] = $obj->getNumchasis();
        $datos['Tipo Carroceria'] = $obj->getTipocarroceria();
        $datos['Cilindraje'] = $obj->getCilindraje();
        $datos['Capacidad'] = $obj->getCapacidad();
        $datos['Area'] = $obj->getArea();
        $datos['Servicio'] = $obj->getServicio();
        $datos['Modelo'] = $obj->getModelo();
        $datos['Numero Puertas'] = $obj->getNumpuertas();
        $datos['Numero Licencia'] = $obj->getNumlicencia();
        $datos['Numero Tarjeta Operacional'] = $obj->getNumtarjoperacional();
        $datos['Area'] = $obj->getArea();
        $datos['Servicio'] = $obj->getServicio();
        if($obj->getFecvenctarjoperacional() != null){
            $datos['Fecha Vencimiento Tarjeta Operacional'] = $obj->getFecvenctarjoperacional()->format("d/m/Y");
        }else{
            $datos['Fecha Vencimiento Tarjeta Operacional'] = "";
        }
        if($obj->getFecvenctecnomecanico() != null){
            $datos['Fecha Vencimiento Tecno-Mecanica'] = $obj->getFecvenctecnomecanico()->format("d/m/Y");
        }else{
            $datos['Fecha Vencimiento Tecno-Mecanica'] = "";
        }
        $datos['Observacion'] = $obj->getObservacion();

        $datos['Radio'] = $obj->getRadio()->getDescripcion();
        $datos['Marca'] = $obj->getMarca()->getDescripcion();
        $datos['Tipo'] = $obj->getTipo()->getDescripcion();
        if($obj->getCombustible() != null){
            $datos['Tipo Combustible'] = $obj->getCombustible()->getDescripcion();
        }


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

    public function subirImagen(){

        $id = $this->getInt("id");
        $tipo = $this->getInt("tipoImagen");
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());
        $this->_model->get($id);
        $metodo = "getImagen".$tipo;

        if($this->_model->getInstance()->$metodo()){
           $array["error"] = "La Imagen Número ".$tipo." ya Existe";
            echo (json_encode($array));
            exit; 
        }

        if ($_FILES['imagen']['name'] != "") {

            $array = array();

            $configSubir = array();
            $configRender = array();

            $configSubir['allowed_types'] = 'jpg|png|jpeg';
            $configSubir['file_name'] = $this->_model->getInstance()->getPlaca()."_".$tipo;

            $configRender['new_image']=ROOT.'public'.DS.'img'.DS.'vehiculos'.DS;
            $configRender['width']=600;//245
            $configRender['height']=388;//184

            /*if($this->_model->getInstance()->getImagen()){
                unlink(ROOT.'public'.DS.'img'.DS.'nosotros'.DS.$empresa.'.'.$this->_model->getInstance()->getImagen());
            }*/

            $rta = $this->subirImg($configSubir,$configRender,'imagen');

            if($rta){
                $array["error"] = $rta;
                echo (json_encode($array));
                exit;
            }

            $nombreImg = $_FILES['imagen']['name'];
            $extTmp = explode(".", $nombreImg);
            $ext = $extTmp[count($extTmp)-1];

            $metodo = "setImagen".$tipo;
            $this->_model->getInstance()->$metodo($ext);
            $this->_model->update();

        }
        echo (json_encode($array));
    }

    public function eliminarImagen(){
        $array = array();
        $id = $this->getInt('id');
        $imagen = $this->getInt('imagen');
        $this->_model = $this->loadModel($this->_presentRequest->getControlador());
        $this->_model->get($id);
        $metodoGet = "getImagen".$imagen;
        $metodoSet = "setImagen".$imagen;
        if($this->_model->getInstance()){
            $nombreImagen = $this->_model->getInstance()->getPlaca()."_".$imagen;
            try {
                unlink(ROOT."public".DS."img".DS."vehiculos".DS.$nombreArchivo.$this->_model->getInstance()->$metodo());
                $this->_model->getInstance()->$metodoSet("");
                $this->_model->update();
            } catch (Exception $e) {
                $array["error"] = "Error";
                echo (json_encode($array));
                exit; 
                ////
            }
        }else{
            $array["error"] = "Error";
            echo (json_encode($array));
            exit; 
        }
        echo (json_encode($array));
    }
    
    public function fichaVehiculo($placa=""){
        //$this->_model->get($this->filtrarInt($id));
        
        $this->getLibrary('phpjasperxml/jasperpdf');
        
        $pdf = new Jasperpdf();
        
        $pdf->generarFicha($placa);
    }

}

?>