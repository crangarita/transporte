<?php
/*
* -------------------------------------
* 
* Date: 07/05/2016 11:10:03 
* tipoModel.php
* -------------------------------------
*/
class tipoModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Tipo'); 
    }
}
?>