<?php
require_once '../model/MSucursal.php';

class CSucursal {
    private $sucursal;
    function __construct() {
        $this->sucursal = new MSucursal();
    }
    public function insertSucursal($nombreSucursal,$latitud,$longitud,$direccion,$telefono,$web,$imagen,$video,$idEmpresa){
        $this->sucursal->setNombreSucursal($nombreSucursal);
        $this->sucursal->setLatitud($latitud);
        $this->sucursal->setLongitud($longitud);
        $this->sucursal->setDireccion($direccion);
        $this->sucursal->setTelefono($telefono);
        $this->sucursal->setWeb($web);
        $this->sucursal->setImagen($imagen);
        $this->sucursal->setVideo($video);
        $this->sucursal->setIdEmpresa($idEmpresa);
        $this->sucursal->insertSucursal();
    }
}
