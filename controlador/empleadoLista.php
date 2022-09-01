<?php
include('../modelo/empleadosClase.php');
$cli = new Empleado("","", "", "", "","","","","","","");
$res = $cli->listarEmpleados();
include('../vista/empleadoLista.php');
?>