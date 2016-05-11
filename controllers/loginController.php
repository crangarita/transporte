<?php

class loginController extends Controller
{
    public function __construct(){
        parent::__construct();
        $this->_usuario = $this->loadModel('usuario');
        //$this->_veterinario = $this->loadModel('veterinario');
    }
    
    public function index()
    {
        if(Session::get('autenticado')){
            $this->redireccionar();
        }

        if($_POST){
            $this->_loginValidate();
        }
        
        $this->redireccionar();
       
    }
    public function iniciar()
    {
        $this->_view->titulo = 'Iniciar Sesión';

        if(Session::get('autenticado')){
            $this->redireccionar();
        }

        $this->_view->renderizar('index', ucwords($this->_view->titulo));
       
    }

    public function cambiar()
    {
        $this->_view->titulo = 'Cambiar Clave';

        if(!Session::get('autenticado')){
            $this->redireccionar();
        }

        if(isset($_POST['passAct'])){
            
            $veterinario = true;
            $usuario = $this->_veterinario->findByObject(array('codigo'  => Session::get('usuario')));

            if(!$usuario){
                $veterinario = false;
                $usuario = $this->_usuario->findByObject(array('nombre'  => Session::get('usuario')));
            }

            if(Hash::getHash('sha1', $this->getSql('passAct'), HASH_KEY) != $usuario->getClave()){
                Session::set('error','No Coincide la Clave Actual');
                $this->redireccionar();
                exit;
            }

            if($this->getSql('passNue') != $this->getSql('passRep')){
                Session::set('error','No Coincide las Claves Nuevas');
                $this->redireccionar();
                exit;
            }

            if($veterinario){
                $this->_veterinario->getInstance()->setClave(Hash::getHash('sha1', $this->getSql('passNue'), HASH_KEY));
                $this->_veterinario->update();
            }else{
                $this->_usuario->getInstance()->setClave(Hash::getHash('sha1', $this->getSql('passNue'), HASH_KEY));
                $this->_usuario->update();
            }

            Session::set('mensaje','La <b>Clave</b> se Actualizo');
            $this->redireccionar();
        }

        $this->_view->renderizar('cambio', ucwords($this->_view->titulo));
       
    }
    
    public function cerrar()
    {
        Session::destroy();
        $this->redireccionar();
    }

    private function _loginValidate(){

        if($_POST){

            if(!$this->getTexto('usuario')){
                Session::set('error','Debe Introducir un Usuario');
                $this->redireccionar();
                exit;
            }
            
            if(!$this->getSql('pass')){
                Session::set('error','Debe Introducir una Clave');
                $this->redireccionar();
                exit;
            }

            //$usuario = $this->_veterinario->findByObject(array('clave' => Hash::getHash('sha1', $this->getSql('pass'), HASH_KEY),'usuario'  => $this->getTexto('usuario')));
            //$veterinario = true;
            //if(!$usuario){

                $usuario = $this->_usuario->findByObject(array('clave' => Hash::getHash('sha1', $this->getSql('pass'), HASH_KEY),'usuario'  => $this->getTexto('usuario')));
                //$veterinario = false;

            //}

            if(!$usuario){
                Session::set('error','Codigo y/o Contraseña Incorrectos');
                $this->redireccionar();
                exit;
            }
            
            /*if(!$usuario->getEstado()){
                Session::set('error','Esta Cuenta No Esta Habilitada');
                $this->redireccionar();
                exit;
            }*/

            /*
            if($veterinario){

                Session::set('autenticado', true);
                Session::set('level', 'veterinario');
                Session::set('usuario', $usuario->getCodigo());
                Session::set('tiempo', time());
                Session::set('mensaje','Bienvenido <b>'.$usuario->getNombre().'</b>');

            }else{*/

                Session::set('autenticado', true);
                Session::set('level', 'admin');
                Session::set('usuario', $usuario->getUsuario());
                Session::set('tiempo', time());
                Session::set('mensaje','Bienvenido <b>'.$usuario->getNombre().'</b>');

            //}

        }
        
    }
    
}

?>