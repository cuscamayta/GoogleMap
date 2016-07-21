<?php
require_once '../SQLConexion/SQLConexion.php';
class MEmpresa {
    public $M_idEmpresa;
    public $M_nombreEmpresa;
    public $M_email;
    public $M_clave;
    public $M_idTPEmpresa;
    public $conexion;
    
    function __construct() {
        $this->conexion=new SQLConexion();
    }
    
    function setIdEmpresa($idEmpresa) {
        $this->M_idEmpresa = $idEmpresa;
    }

    function setNombreEmpresa($nombreEmpresa) {
        $this->M_nombreEmpresa = $nombreEmpresa;
    }

    function setEmail($email) {
        $this->M_email = $email;
    }

    function setClave($clave) {
        $this->M_clave = $clave;
    }
    function setIdTPEmpresa($idTPEmpresa) {
        $this->M_idTPEmpresa = $idTPEmpresa;
    }
    public function MInsertEmpresa(){
        $this->conexion->conectar();
         echo $sql="call insertEmpresa(null,'$this->M_nombreEmpresa','$this->M_email','$this->M_clave',$this->M_idTPEmpresa);";
        $result=  $this->conexion->query($sql);
        $this->conexion->desconectar();
        return $result;
    }
}
