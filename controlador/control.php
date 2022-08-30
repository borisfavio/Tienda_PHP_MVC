<?php

if (isset($_POST['ingresar'])) {
    # code...
} else {
    include('../vista/login.php');
}

$user = $_POST['usuario'];
$psw = $_POST['password'];
$psw = md5($psw);

include('../modelo/usuarioClase.php');
$cli = new Usuario("",$user,$psw, "", "", "");
$res = $cli->verificar();

echo $user;
echo $psw;




$res = mysqli_query($conn, $query) or die(mysqli_error($conn));


    if(mysqli_num_rows($res)!=0){
        session_start();
        
        if ($r=mysqli_fetch_array($res)) {
            $_SESSION['nombre']= $r['usuario'];
            $_SESSION['nivel']= $r['nivel'];
            $_SESSION['estado'] = $r['estado'];
            switch($_SESSION['nivel']){
                case 1:
                    $_SESSION['cargo']= "Administrador";
                    break;
                  case 2:
                    $_SESSION['cargo']= "Empleado";
                    break;
                  
                  default:
                  $_SESSION['cargo']= "";
            }
        }
        if ($_SESSION['estado']==0) {
            $_SESSION['ingreso']="no";
        } else {
            $_SESSION['ingreso']="si";
        }
        
        header("Location: ../vista/index1.html");
    }else{
        echo "no da";
        header("Location: index.php?error=1");
    }


    //header("Location: main.php");




 ?>

<?php
?>