    <?php
    include('header.php');
    ?>
    <!--tabs de navegacion-->
    <div class="nav-content">
        <ul class="tabs tabs-transparent">
            <li class="tab"><a id="tab1" class="active" href="#test1">Lista Empleados</a></li>
            <li class="tab"><a id="tab2">Registro Empleado</a></li>
            <li class="tab"><a href="#test3">Empleados Inactivos</a></li>
            <li class="tab"><a href="#test4">Buscar</a></li>
        </ul>
    </div>
    </nav>

    <div id="test1" class="col s12">
        <div class="container-fluid">
            <div class="card">
                <table style="overflow-x: scroll; width: 95%;" class="striped responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>CI</th>
                            <th>NOMBRE</th>
                            <TH>PATERNO</TH>
                            <th>MATERNO</th>
                            <th>DIRECCION</th>
                            <th>TELEFONO</th>
                            <th>F/Nac.</th>
                            <th>GENERO</th>
                            <th>INTERESES</th>
                            <th>ESTADO</th>
                            <th>CARGO</th>
                            <th colspan="2">OPERACIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($reg = mysqli_fetch_array($res)) {
                        ?>
                            <tr>
                                <td scope="row"><?= $reg['id'] ?></td>
                                <td><?= $reg['ci'] ?></td>
                                <td><?= $reg['nombre'] ?></td>
                                <td><?= $reg['paterno'] ?></td>
                                <td><?= $reg['materno'] ?></td>
                                <td><?= $reg['direccion'] ?></td>
                                <td><?= $reg['telefono'] ?></td>
                                <td><?= $reg['fechanacimiento'] ?></td>
                                <td><?= $reg['genero'] ?></td>
                                <td><?= $reg['intereses'] ?></td>
                                <td><?= $reg['estado'] ?></td>
                                <td><?= $reg['cargo_id_cargo'] ?></td>
                                <td><a href="../controlador/clienteelimina.php?cod=<?= $reg['id'] ?>" class="btn btn bg-danger">Eliminar</a></td>
                                <td><a href="../controlador/clienteModifica.php?cod=<?= $reg['id'] ?>" class="btn btn bg-info">Modificar</a></td>
                            </tr>
                        <?php
                        }
                        ?>


                    </tbody>
                </table>
            </div>

            <td><a href="../controlador/clienteRegistro.php" class="btn btn-primary">Nuevo Cliente</a></td>

        </div>
    </div>
    <div id="test2" class="col s12">
        <div class="container">
<div class="card horizontal">
  <div class="card-image">
    <img src="">
  </div>
  <div class="card-stacked">
    <div class="card-content">
    <span class="card-title">Registrar Empleado</span>
      <form action="">
        <div class="input-field col s12 l6">
          <input type="text" id="first_name" class="validate">
          <label for="first_name">First Name</label>
        </div>
        <div class="input-field col s12 l6">
          <input type="text" id="last_name" class="validate">
          <label for="last_name">Last Name</label>
        </div>
        <div class="input-field col s12">
          <input type="email" id="email" class="validate">
          <label for="email" data-error="wrong" data-success="right">Email</label>
        </div>
        <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Textarea</label>
        </div>
      </form>
    </div>
    <div class="card-action">
      <a class="btn btn-block" href="#">Registrar</a>
    </div>
  </div>
</div>

        </div>
    </div>


    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Test 4</div>



    <!-- Fin Navbar -->
    <script src="../js/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $("#test2").css("display", "none");
            $("#tab2").click(function() {
                $("#test1").css("display", "none");
                $("#test1").removeClass("active");
                $("#test2").css("display", "flex");
                $("#test2").addClass("active");
            });
            $("#tab1").click(function() {
                $("#test1").css("display", "flex");

                $("#test2").css("display", "none");

            });
        });
    </script>
    <?php
    include('footer.php');
    ?>