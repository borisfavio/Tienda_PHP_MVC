<?php
include('../modelo/cargoClase.php');
$cli = new Cargo("", "", "", "");
$res = $cli->listarCargo();

include('../vista/cargoLista.php');
?>