<?php
class Usuario
{
    private $id;
    private $usuario;
    private $password;
    private $nivel;
    private $estado;
    private $empleado_id_empleado;

    public function __construct($i, $u, $p, $n, $es, $id_e)
    {
        $this->id=$i;
        $this->usuario=$u;
        $this->password = $p;
        $this->nivel = $n;
        $this->estado = $es;
        $this->empleado_id_empleado = $id_e;
    }

 
    public function verificar(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM usuarios WHERE user LIKE '$this->usuario' AND password = '$this->password';");
        return($sql);
    }

    public function listar(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("SELECT u.id, e.nombre, u.usuario, u.nivel, u.estado FROM usuarios u INNER JOIN empleado e ON u.id = e.cargo_id_cargo;");
        return($sql);
    }


    public function setId($ide){
        $this->id=$ide;
    }
    public function getId(){
        return $this->id;
    }

    public function setEstado($es){
        $this->estado=$es;
    }
    public function getEstado(){
        return $this->estado;
    }



}

?>
