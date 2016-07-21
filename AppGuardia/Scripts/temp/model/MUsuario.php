<?php
require_once '../SQLConexion/SQLConexion.php';
class MUsuario {
    private $idUsuario;
    private $username;
    private $userpassword;
    private $estadoUser;
    private $conexion;
    
    function __construct() {
        $this->conexion=new SQLConexion();
    }
    
    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setUserpassword($userpassword) {
        $this->userpassword = $userpassword;
    }

    function setEstadoUser($estadoUser) {
        $this->estadoUser = $estadoUser;
    }
    
    public function insertUsuario(){
        $this->conexion->conectar();
        $sql="call insertUsuario(null,'$this->username','$this->userpassword','$this->estadoUser');";
        $result=  $this->conexion->query($sql);
        $this->conexion->desconectar();
        return $result;
    }
}
