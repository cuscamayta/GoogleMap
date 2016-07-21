<?php
require_once '../model/MEmpresa.php';
class CEmpresa {
    private $empresa;
            function __construct() {
        $this->empresa = new MEmpresa();
    }
    public function insertEmpresa($nombreEmpresa,$email,$clave,$idTPEmpresa){
        $this->empresa->setNombreEmpresa($nombreEmpresa);
        $this->empresa->setEmail($email);
        $this->empresa->setClave($clave);
        $this->empresa->setIdTPEmpresa($idTPEmpresa);
        $this->empresa->MInsertEmpresa();
    }
}
