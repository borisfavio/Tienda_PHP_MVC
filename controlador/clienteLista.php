<?php
include('../modelo/clienteClase.php');
$cli = new Cliente("", "", "", "");
$res = $cli->listarCliente();
include('../vista/clienteLista.php');
?>