<?php
require_once '../controller/CEmpresa.php';

$nombreEmpresa=$_POST['nombreEmpresa'];
$email=$_POST['email'];
$clave= $_POST['clave'];
$idTPEmpresa=$_POST['idTPEmpresa'];

$GetEmpresa= new CEmpresa();
$GetEmpresa->insertEmpresa($nombreEmpresa, $email, $clave, $idTPEmpresa);


