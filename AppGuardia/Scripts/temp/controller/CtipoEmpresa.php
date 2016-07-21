<?php

require_once '../model/MtipoEmpresa.php';

class CtipoEmpresa {

    private $tpEmpresa;

    function __construct() {
        $this->tpEmpresa = new MtipoEmpresa();
    }

    function listaTPEmpresa() {
        return $this->tpEmpresa->listaTPEmpresa();
    }

}
