<?php
include('../modelo/productoClase.php');

$id = $_GET['id'];

if (isset($id)) {
    echo "id: ".$id;
    $pro = new 	Producto("$id","","","","","","","","","","");
    $res = $pro->listarProductoId($id);
    include('../vista/productosdetalle.php');
}else{
    $pro = new 	Producto("","","","","","","","","","","");
    $res = $pro->listarProducto();

include('../vista/productos.php');
}

?>