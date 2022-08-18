<?php
include("../vista/clienteRegistro.php");
if (isset($_POST['registrarCliente'])) {
    $ni = $_POST['nit'];
    $rs = $_POST['razon'];
    $es = "activo";
    include('../modelo/clienteClase.php');
    $cli = new Cliente("", $ni, $rs, $es);
    $r = $cli->grabarCliente();
    if ($r) {
?>
        <script type="text/javascript">
            alert("Se registro correctamente");
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert("No se registro");
        </script>
<?php
    }
}
?>