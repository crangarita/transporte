<?php
/*
* -------------------------------------
* 
* Date: 07/05/2016 11:10:03 
* tipocombustibleModel.php
* -------------------------------------
*/
class tipocombustibleModel extends Model {
    public function __construct() {
        parent::__construct(); 
        $this->instance = $this->loadObjeto('Tipocombustible'); 
    }
}
?>