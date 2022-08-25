    <?php
    include('header.php');
    ?>
    <div class="container">
        <div class="card">
        <table class="table table-reponsive lista">
            <thead>
                <tr>
                    <th>ID CLIENTE</th>
                    <th>NIT CI</th>
                    <th>RAZON SOCIAL</th>
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
    <?php
    include('footer.php');
    ?>