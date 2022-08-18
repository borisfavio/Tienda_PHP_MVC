<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
              <label for="">Razon Social</label>
              <input type="text" class="form-control" name="razonsocial" id="razonsocial" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Nit CI</label>
              <input type="text" class="form-control" name="nit" id="nit" placeholder="">
            </div>
            <input type="submit" name="registrarCliente" value="Registrar" class="btn btn-primary">
            <a href="../controlador/clienteLista.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>