       <!DOCTYPE html>
       <html lang="en">
       <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" crossorigin="anonymous">

    <!-- Styles -->
    <!--<link rel="stylesheet" href="../assets/css/style.css">-->

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Dashboard - Templune</title>
</head>
       <body>
        
       <div class="d-flex" id="content-wrapper">
       <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0">Diseño WEB II</h4>
            </div>
            <div class="menu">
                <a href="../index.html" class="d-block text-light p-3 border-0"><i class="icon ion-md-apps lead mr-2"></i>
                    Tablero</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Usuarios</a>

                <a href="../controlador/clienteLista.php" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Clientes</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-stats lead mr-2"></i>
                    Estadísticas</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-person lead mr-2"></i>
                    Perfil</a>
                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>
                    Configuración</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">
         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <form class="form-inline position-relative d-inline-block my-2">
                            <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                            <button class="btn position-absolute btn-search" type="submit"><i
                                    class="icon ion-md-search"></i></button>
                        </form>
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="" class="img-fluid rounded-circle avatar mr-2"
                                        alt="https://generated.photos/" />
                                    Boris Favio
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi perfil</a>
                                    <a class="dropdown-item" href="#">Suscripciones</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Cerrar sesión</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Fin Navbar -->