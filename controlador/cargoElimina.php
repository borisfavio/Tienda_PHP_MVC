<?php
$id = $_GET['id'];

include('../modelo/cargoClase.php');
$cargo = new Cargo();
$cargo->setId($id);
$res = $cargo->eliminarCargo();
var_dump($res);
if (isset($res)) {
    header("Location: cargoLista.php");
}
else{
    echo "error";
}

?>