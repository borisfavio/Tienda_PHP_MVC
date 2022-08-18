<?php
include("../vista/clienteRegistro.php");
if (isset($_POST['registrarCliente'])) {
    $ni =$_POST['nit'];
    $rs =$_POST['razon'];
    $es = "activo";
    include('../modelo/clienteClase.php');
    $cli = new Cliente("",$ni,$rs,$es);
    $r = $cli->grabarCliente();
    
}
?>