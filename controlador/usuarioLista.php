<?php

include('../modelo/usuarioClase.php');
$cli = new Usuario("","","","","","");
$res = $cli->listar();
include('../vista/usuarioLista.php');

?>