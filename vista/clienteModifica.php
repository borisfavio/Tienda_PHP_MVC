<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <?php
    include('header.php');
    ?>
    <div class="container">
        <div class="col-md-1"></div>
        <div class="col-md-8">
            <h1>Modificar Cliente</h1>
            <?php
            while ($reg = mysqli_fetch_array($res)) {
            ?>
                <form action="clienteModifica.php" method="get">
                    <div class="form-group">
                        <input type="text" name="cod" hidden value="<?= $reg[0] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Razon Social</label>
                        <input type="text" class="form-control" name="razon" id="razon" placeholder="" value="<?= $reg['razonsocial'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">NIT CI</label>
                        <input type="text" class="form-control" name="nit" id="nit" placeholder="" value="<?= $reg['nit_ci'] ?>">
                    </div>
                    <input type="submit" name="modificar" id="modificar" class="btn btn-primary" value="modificar"></input>
                </form>
            <?php
            }
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
</body>

</html>