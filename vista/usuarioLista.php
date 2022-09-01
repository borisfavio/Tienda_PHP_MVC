<?php
include('header.php');
?>
<div class="container">
    <div>
        <a id="button" class="btn btn-success" >Nuevo</a>
    </div>
    <table id="tbl" class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Usuario</th>
                <th>Nivel</th>
                <th>Estado</th>
                <th colspan="2">Operaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($reg = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td scope="row"><?= $reg['id'] ?></td>
                    <td >Empleado</td>
                    <td ><?= $reg[1] ?></td>
                    <td >
                        <?php
                        if($reg[3]==1){
                            echo "Administrador";
                        }else{
                            echo "Empleado";
                        } ?></td>
                    <td >
                    <?php
                        if($reg[4]==1){
                            echo "Activo";
                        }else{
                            echo "Inactivo";
                        } ?>
                    </td>
                    <td><a  class="btn btn-info" href="">Editar</a></td>
                    <td><a  class="btn btn-danger" href="">Eliminar</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<?php
include('modal.php');
?>
<script src="../js/jquery.js"></script>
<script>
$(document).ready(function(){
  $("#button").click(function(){
    $("#btn-modal").css("display", "flex");
    $(".container-modal").css("display", "flex");
  });
});
</script>
<?php
include('footer.php');
?>