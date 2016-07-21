<?php

require_once '../SQLConexion/SQLConexion.php';

class MSucursal {

    public $idSucursal;
    public $nombreSucursal;
    public $latitud;
    public $longitud;
    public $direccion;
    public $telefono;
    public $web;
    public $imagen;
    public $video;
    public $idEmpresa;
    public $conexion;

    function __construct() {
        $this->conexion = new SQLConexion();
    }
    
    function setIdSucursal($idSucursal) {
        $this->idSucursal = $idSucursal;
    }

    function setNombreSucursal($nombreSucursal) {
        $this->nombreSucursal = $nombreSucursal;
    }

    function setLatitud($latitud) {
        $this->latitud = $latitud;
    }

    function setLongitud($longitud) {
        $this->longitud = $longitud;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    function setWeb($web) {
        $this->web = $web;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setVideo($video) {
        $this->video = $video;
    }
    function setIdEmpresa($idEmpresa) {
        $this->idEmpresa = $idEmpresa;
    }
    public function insertSucursal(){
        $this->conexion->conectar();
        $sql="call insertSucursal(null,"
                . "'$this->nombreSucursal',"
                . "'$this->latitud',"
                . "'$this->longitud',"
                . "'$this->direccion',"
                . "'$this->telefono',"
                . "'$this->web',"
                . "'$this->imagen',"
                . "'$this->video',"
                . "'$this->idEmpresa');";
        $result=  $this->conexion->query($sql);
        $this->conexion->desconectar();
        return $result;
    }
}
