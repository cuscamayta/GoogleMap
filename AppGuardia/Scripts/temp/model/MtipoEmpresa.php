<?php

require_once '../SQLConexion/SQLConexion.php';

class MtipoEmpresa {

    private $idTPEmpresa;
    private $categoria;
    private $descripcion;
    private $conexion;

    function __construct() {
        $this->conexion=new SQLConexion();
    }
    
    function setIdTPEmpresa($idTPEmpresa) {
        $this->idTPEmpresa = $idTPEmpresa;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }
    public function insertTipoEmpresa(){
        $this->conexion->conectar();
        $sql="call insertTPEmpresa(null,'$this->categoria','$this->descripcion');";
        $result= $this->conexion->query($sql);
        $this->conexion->desconectar();
        return $result;
    }
    public function listaTPEmpresa(){
        $this->conexion->conectar();
        $sql="select * from class_empresa;";
        $result =$this->conexion->query($sql);
        $this->conexion->desconectar();
        return $result;
    }
}
