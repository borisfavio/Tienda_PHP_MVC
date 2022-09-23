    <?php
    include('header.php');
    ?>
    <style media="screen">
      .cuerpo{
        height: 70hw;
        overflow-y: scroll;
      }
    </style>
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
<div class="cuerpo">
    <div id="test1" class="col s12">
      <div class="container">
      <?php
              while ($reg = mysqli_fetch_array($res)) {
              ?>
        <div class="card small horizontal">
          <div class="valign-wrapper">
            <img class="circle" src="../img/personal.png">
          </div>
          <div class="card-stacked">
            <div class="card-content">
              <div class="row">
                <h5 class="green-text"><?= $reg['cargo'] ?></h5>
                <div class="col s12 m6">
                  <h6>Nombre: <?= $reg['nombre'] ?> <?= $reg['paterno'] ?> <?= $reg['materno'] ?></h6>
                </div>
                <div class="col s12 m6">
                  <h6>CI: <?= $reg['ci'] ?> </h6>
                </div>
                <div class="col s12 m6">
              <h6>Nacimiento: <?= $reg['fechanacimiento'] ?></h6>
            </div>
            <div class="col s12 m6">
              <h6>Direccion: <?= $reg['direccion'] ?></h6>
            </div>
            <div class="col s12 m6">
              <h6>Telefono: <?= $reg['telefono'] ?></h6>
            </div>
            <div class="col s12 m6">
              <h6>Genero: <?= $reg['genero'] ?></h6>
            </div>
            <div class="col s12 m6">
              <h6>Intereses: <?= $reg['intereses'] ?></h6>
            </div>
            </div>
            </div>
            <div class="card-action">
              <a href="#">Editar</a>
              <a href="#">Eliminar</a>
            </div>
          </div>
        </div>
        <?php
              }
              ?>



        <td><a target="_blank" href="../controlador/reporteClientes.php" class="btn btn-primary">Reporte</a></td>

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
                <div class="row">
                  <div class="col s6">
                    <div class="input-field ">
                      <input type="text" id="nombre" class="validate">
                      <label for="nombre"> Nombres</label>
                    </div>
                    <div class="input-field ">
                      <input type="text" id="paterno" name="paterno" class="validate">
                      <label for="paterno">Ap. Paterno</label>
                    </div>
                    <div class="input-field col s12">
                      <input type="text" id="materno" name="materno" class="validate">
                      <label for="materno" >Ap. Materno</label>
                    </div>
                    <div >
                      <label for="">Genero</label>
                    <select name="genero" id="genero">
                        <option>Seleccionar</option>
                        <option>Masculino</option>
                        <option>Femenino</option>
                      </select>

                    </div>

                  </div>
                  <div class="col s6">
                    <div class="input-field col s12 l6">
                      <input type="text" id="ci" class="validate">
                      <label for="ci"> Cedula de Identidad</label>
                    </div>
                    <div class="input-field col s12 l6">
                      <input type="text" id="telefono" name="telefono" class="validate">
                      <label for="telefono">Telefono</label>
                    </div>
                    <div class="input-field col s12">
                      <input type="text" id="interes" class="validate">
                      <label for="interes">Intereses</label>
                    </div>
                  </div>
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


    <div style="display = none;" id="test3" class="col s12">Test 3</div>
    <div style="display = none;" id="test4" class="col s12">Test 4</div>

</div>

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
