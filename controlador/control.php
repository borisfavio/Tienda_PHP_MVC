<?php

if (isset($_POST['ingresar'])) {
    echo "good";


$user = $_POST['usuario'];
$psw = $_POST['password'];
$psw = md5($psw);

var_dump($user);

include('../modelo/usuarioClase.php');
$cli = new Usuario("",$user,$psw, "", "", "");
$res = $cli->verificar();

echo $user;
echo $psw;


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
        
        header("Location: ../vista/principal.php");
    }else{
        echo "no da";
        header("Location: ../vista/principal.php");
        //header("Location: index.php?error=1");
    }


    //header("Location: main.php");

} else {
    include('../vista/login.php');
}


 ?>

<?php
?>