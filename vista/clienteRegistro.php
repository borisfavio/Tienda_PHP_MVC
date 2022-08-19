<?php
include('header.php');
?>
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