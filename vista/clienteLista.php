<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <div class="container">
        <table class="table">
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
                        <td><a href="" class="btn btn bg-danger">Eliminar</a></td>
                        <td><a href="../controlador/clienteModifica.php?cod=<?=$reg['id']?>" class="btn btn bg-success">Modificar</a></td>
                    </tr>
                <?php
                }
                ?>


            </tbody>
        </table>

    </div>
</body>

</html>