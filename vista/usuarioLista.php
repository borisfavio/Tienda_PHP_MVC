<?php
include('header.php');
?>
<div class="container">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Usuario</th>
                <th>Nivel</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($reg = mysqli_fetch_array($res)) {
            ?>
                <tr>
                    <td scope="row"><?= $reg['id'] ?></td>
                </tr>
                <tr>
                    <td scope="row">Empleado</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>