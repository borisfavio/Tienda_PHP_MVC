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
        $sql = $db->query("SELECT * FROM usuarios WHERE usuario LIKE '$this->usuario' AND password = '$this->password';");
        return($sql);
    }

    public function setId($ide){
        $this->id=$ide;
    }
    public function getId(){
        return $this->id;
    }

    public function setNit($ni){
        $this->nit=$ni;
    }
    public function getNit(){
        return $this->nit;
    }


    public function setRazon($ra){
        $this->razon=$ra;
    }
    public function getRazon(){
        return $this->razon;
    }


    public function setEstado($es){
        $this->estado=$es;
    }
    public function getEstado(){
        return $this->estado;
    }



}

?>
