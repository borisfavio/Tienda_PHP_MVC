<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/materialize.css">
</head>
<body>


<div class="container">

<!-- Outer Row -->
<div class="row center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card">
            <div class="card-content p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                            </div>
                            <div class="bg-danger" style="border-radius:15px; color: white; margin:25px;">
                                <?php
                                    if (isset($_GET['error'])) {
                                        $e=$_GET['error'];
                                        if ($e==1) {
                                            echo "Usuario o Contraseña incorrectos!!";
                                        }
                                        if($e==2){
                                            echo "Debe ingresar un usuario o contraseñ validos!!";
                                        }
                                    }
                                ?>
                            </div>
                            <form class="user"  method="post">
                                <div class="input-field">
                                    <input type="text" class="" id="usuario"
                                        name="usuario">
                                        <label for="usuario"Usuario></label>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user"
                                        name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <input name="ingresar" type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </input>
                                <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="register.html">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
<script src="../js/materialize.js" charset="utf-8"></script>

</body>
</html>
