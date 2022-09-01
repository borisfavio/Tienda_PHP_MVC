<?php
$nombre = $_POST['cargo'];
include('../modelo/cargoClase.php');
$cargo = new Cargo();
$cargo->setNombre($nombre);

$res = $cargo->grabarCargo();

if (isset($res)) {
    header("Location: cargoLista.php");
}
else{
    echo "error";
}

?>