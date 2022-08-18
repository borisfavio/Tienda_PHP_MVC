<?php
$cod = $_GET['cod'];
include("../modelo/clienteClase.php");
$cli = new Cliente($cod, "", "");
$res = $cli->listarCliente();
include("../vista/clienteModifica.php");
if (isset($_GET['midificar'])) {
    $rs = $_GET['razon'];
    $ni = $_GET['nit'];
    $r = $cli -> editarCliente($cod,$rs,$ni);
    if ($res) {
        ?>
            <script type="text/javascript">
                alert("Se modifico correctamente");
            </script>
        <?php
        } else {
        ?>
            <script type="text/javascript">
                alert("no se modifico");
            </script>
        <?php
        }

}


?>