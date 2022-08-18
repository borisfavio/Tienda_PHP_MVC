<?php
$cod = $_GET['cod'];
include("../modelo/clienteClase.php");
$cli = new Cliente($cod, "", "");
$res = $cli->eliminarCliente();
if ($res) {
?>
    <script type="text/javascript">
        alert("Se elimino correctamente");
    </script>
<?php
} else {
?>
    <script type="text/javascript">
        alert("no se elimino");
    </script>
<?php
}
?>