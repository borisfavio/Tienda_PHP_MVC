<?php
include('header.php');
?>
<!--tabs de navegacion-->
<div class="nav-content">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a id="tab1" class="active">Lista Usuarios</a></li>
                <li class="tab"><a id="tab2">Nuevo Usuario</a></li>
                <li class="tab"><a id="tab3">Usuarios Incativos</a></li>
            </ul>
        </div>
</nav>
<?php
include('navmobil.php');
?>
<div class="container">
<div id="test1">

    <div style="width: 100%;" class="card">
    <table class="table table-striped table-inverse table-responsive">
        <thead class="thead-inverse">
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Usuario</th>
                <th>Nivel</th>
                <th>Estado</th>
                <th >Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $inactivo = array();
            while ($reg = mysqli_fetch_array($res)) {
                if ($reg['estado'] == 1) {
            ?>
                <tr>
                    <td scope="row"><?= $reg[0] ?></td>
                    <td scope="row"><?= $reg[1] ?></td>
                    <td scope="row"><?= $reg[2] ?></td>
                    <td scope="row"><?= $reg[3] ?></td>
                    <td scope="row"><?=($reg[4]==1) ? "Activo" : "Inactivo" ;?></td>
                    <td>
                        <a class="btn-floating  lime darken-1" href=""><i class="material-icons">edit</i></a> 
                        <a class="btn-floating pink darken-1" href="../controlador/cargoElimina.php?id=<?= $reg['id'] ?>"><i class="material-icons ">delete</i></a>
                    </td>
                </tr>
                
            <?php
            }else{
                $inactivo[] = array(
                    "id" => $reg['id'],
                    "nombre" => $reg[1],
                    "usuario" => $reg[2],
                    "nivel" => $reg[3]
                );
            }
        }
            ?>
        </tbody>
    </table>
    </div>

</div>
<div style="display: none;" id="test2">nuevo</div>
<div class="center" style="display: none;" id="test3">
<div style="width: 100%;" class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <table>
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">Empleado</th>
                                    <th data-field="name">Usuario</th>
                                    <th data-field="name">Nivel</th>
                                    <th data-field="state">Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($inactivo as $key) {

                                ?>
                                    <tr>
                                        <td><?= $key["id"] ?></td>
                                        <td><?= $key["nombre"] ?></td>
                                        <td><?= $key["usuario"] ?></td>
                                        <td><?= $key["nivel"] ?></td>
                                        <td>Incativo</td>
                                        <td>
                                            <a class="btn lime darken-1" href=""><i class="material-icons">add</i> Activar
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
</div>
</div>
<script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#test2").css("display", "none");
            $("#test3").css("display", "none");

            $("#tab1").click(function() {
                $("#test1").css("display", "flex");
                $("#test2").css("display", "none");
                $("#test3").css("display", "none");
            });

            $("#tab2").click(function() {
                $("#test1").css("display", "none");
                $("#test2").css("display", "flex");
                $("#test3").css("display", "none");
            });

            $("#tab3").click(function() {
                $("#test1").css("display", "none");
                $("#test2").css("display", "none");
                $("#test3").css("display", "flex");
            });

        });
    </script>
<?php
include('footer.php');
?>