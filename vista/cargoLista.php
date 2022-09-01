<?php
include(include('header.php'));
?>

        <!--tabs de navegacion-->
        <div class="nav-content">
            <ul class="tabs tabs-transparent">
                <li class="tab"><a id="tab1" class="active">Lista Cargos</a></li>
                <li class="tab"><a id="tab2">Nuevo Cargo</a></li>
                <li class="tab"><a id="tab3">Cargos Incativos</a></li>
            </ul>
        </div>
    </nav>
    <ul class="sidenav" id="mobile-demo">
                    <li>
                    <a href="#" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">apps</i>Tablero
                    </a>
                </li>
                <li>
                    <a href="../controlador/clienteLista.php" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">people</i></i>Clientes
                    </a>
                </li>
                <li>
                    <a href="../controlador/usuarioLista.php" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">person</i>Usuarios</a>
                </li>
                <li>
                    <a href="../controlador/empleadoLista.php" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">badge</i>Empleados
                    </a>
                </li>
                <li>
                    <a href="../controlador/cargoLista.php" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">business</i>Cargos
                    </a>
                </li>
                <li>
                    <a href="#" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">query_stats</i>Estadísticas
                    </a>
                </li>
                <li>
                    <a href="#" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">account_circle</i>Perfil
                    </a>
                </li>
                <li>
                    <a href="#" class="d-block text-light p-3 border-0">
                        <i class="material-icons top">settings</i>Configuración
                    </a>
                </li>

            </ul>

    <div id="test1" class="col s12">
        <div class="container">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <table class="centered striped">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="cargo">Cargo</th>
                                    <th data-field="estado">Estado</th>
                                    <th colspan="2" data-field="opciones">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $inactivo = array();
                                while ($reg = mysqli_fetch_array($res)) {
                                    if ($reg['estado'] == 1) {
                                ?>
                                        <tr>
                                            <td><?= $reg['id'] ?></td>
                                            <td><?= $reg['cargo'] ?></td>
                                            <td><?php echo "Activo"; ?></td>
                                            <td><a class="btn-floating  lime darken-1" href=""><i class="material-icons">edit</i></a> <a class="btn-floating pink darken-1" href="../controlador/cargoElimina.php?id=<?= $reg['id'] ?>"><i class="material-icons ">delete</i></a></td>
                                        </tr>
                                <?php
                                    } else {
                                        $inactivo[] = array(
                                            "id" => $reg['id'],
                                            "cargo" => $reg['cargo'],
                                            "estado" => $reg['estado']
                                        );
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="display: none;" id="test2" class="col s12">
        <div class="container">
            <div class="card horizontal">
                <div class="card-image">
                    <img src="">
                </div>
                <div class="card-stacked">
                    <div class="card-content">
                        <div class="div card-title">Nuevo Cargo</div>
                        <form action="../controlador/cargoRegistro.php" method="POST">
                            <div class="input-field col s12 l6">
                                <input type="text" id="cargo" name="cargo" class="validate">
                                <label for="cargo">Nombre del cargo</label>
                            </div>
                            <button class="btn waves-effect waves-light" type="submit" name="registrar">Guardar
                                <i class="material-icons right">send</i>
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div style="display: none;" id="test3" class="col s12">
        <div class="container">
            <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <table>
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">Nombre</th>
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
                                        <td><?= $key["cargo"] ?></td>
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
    <div id="test4" class="col s12"></div>

    </div>
    </div>



    <script src="../js/materialize.js"></script>
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