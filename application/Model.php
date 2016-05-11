<?php
/*
 * -------------------------------------
 * Derechos reservados Sid.com.co
 * Model.php
 * -------------------------------------
 */
class Model extends Doctrine {

    protected $instance;
    protected $instanceHome;
    protected $nameInstance;    

    public function __construct() {
        //$this->_db = new Database();
    }

    protected function loadObjeto($objeto) { //Cargar un objeto
        $objeto = ucwords(strtolower($objeto));
        $this->nameInstance = $objeto;
        $this->instanceHome = $this->getEm()->getRepository('Entities\\'.$objeto);
        $t = "Entities\\" . $objeto;

        

        return $this->instance = new $t;
    }

    public function getInstanceHome() {
        return $this->instanceHome;
    }

    public function getInstance() {
        return $this->instance;
    }

    public function setInstance($instance) {
        $this->instance = $instance;
    }

    public function save() { //Metodo guardar registro
        $this->getEm()->persist($this->instance);
        $this->getEm()->flush();
    }

    public function update() { //Metodo actualizar registro
        $this->getEm()->flush();
    }

    public function delete() { //Metodo eliminar registro
        $this->getEm()->remove($this->instance);
        $this->getEm()->flush();
    }
    
    public function resultList() {
        return $this->instanceHome->findAll();
    }

    public function findBy2($where  = array(),$orderBy = array(),$limit = 0) {
        return $this->instanceHome->findBy(
                   $where,        // $where 
                   $orderBy,    // $orderBy
                   $limit,                // $limit
                   0                          // $offset
                 );
    }

    public function get($id) {  //Metodo consultar por ID
        $this->instance = $this->instanceHome->find($id);
        return $this->instance;
    }
    
    public function findBy($arreglo, $order = array()) {  //Metodo consultar por propiedades
        return $this->instanceHome->findBy($arreglo, $order);
    }


    public function findByObject($arreglo) {  //Metodo consultar Usuario para Login
        $objetos = $this->instanceHome->findBy($arreglo);
        
        if(count($objetos)){
            $this->instance = $objetos[0];
            return $this->instance;
        }
        else return null;
    }        
    
    public function nativeQuery($sql) {
        $conn = $this->getEm()->getConnection();
        return $conn->query($sql)->fetchAll();                
    }        
    
    public function exec($sql) {
        $conn = $this->getEm()->getConnection();
        return $conn->exec($sql);                
    }
    
    public function dql($dql, $parametros = array()) {
        $query = $this->getEm()->createQuery($dql);
        foreach ($parametros as $key => $valor)
            $query->setParameter($key, $valor);
        return $query->getResult();        
    }

    public function reloadInstance() {
       $this->instance = $this->loadObjeto($this->nameInstance);
    }
}

?>