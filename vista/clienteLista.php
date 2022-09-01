    <?php
    include('header.php');
    ?>
                   <!--tabs de navegacion-->
                   <div class="nav-content">
                   <ul class="tabs tabs-transparent">
                       <li class="tab"><a href="#test1">Lista Clientes</a></li>
                       <li class="tab"><a class="active" href="#test2">Test 2</a></li>
                       <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
                       <li class="tab"><a href="#test4">Test 4</a></li>
                   </ul>
               </div>
           </nav>

           <div id="test1" class="col s12">
           <div class="container">
        <div class="card">
        <table class="table table-reponsive lista">
            <thead>
                <tr>
                    <th>ID CLIENTE</th>
                    <th>NIT CI</th>
                    <th>RAZON SOCIAL</th>
                    <th colspan="2">OPERACIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($reg = mysqli_fetch_array($res)) {
                ?>
                    <tr>
                        <td scope="row"><?=$reg['id']?></td>
                        <td><?=$reg['nit_ci']?></td>
                        <td><?=$reg['razonsocial']?></td>
                        <td><a href="../controlador/clienteelimina.php?cod=<?=$reg['id']?>" class="btn btn bg-danger">Eliminar</a></td>
                        <td><a href="../controlador/clienteModifica.php?cod=<?=$reg['id']?>" class="btn btn bg-info">Modificar</a></td>
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
           <div id="test2" class="col s12">Test 2</div>
           <div id="test3" class="col s12">Test 3</div>
           <div id="test4" class="col s12">Test 4</div>



                  <!-- Fin Navbar -->

    <?php
    include('footer.php');
    ?>