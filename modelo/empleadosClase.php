<?php
class Empleado
{
    private $id;
    private $ci;
    private $nombre;
    private $paterno;
    private $materno;
    private $direccion;
    private $f_nacimiento;
    private $genero;
    private $intereses;
    private $estado;
    private $cargo_id;

    public function __construct($i, $c, $no, $pa, $ma, $di, $fn, $ge, $in, $es, $cid)
    {
        $this->id=$i;
        $this->ci=$c;
        $this->nombre=$no;
        $this->paterno=$pa;
        $this->materno=$ma;
        $this->direccion=$di;
        $this->f_nacimiento=$fn;
        $this->genero=$ge;
        $this->intereses=$in;
        $this->estado=$es;
        $this->cargo_id=$cid;
    }

    public function verificar($user, $psw){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("SELECT * FROM usuarios WHERE usuario LIKE '$user' AND password = '$psw';");
        return($sql);
    }

    public function grabarCliente(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("insert into cliente(nit_ci, razonsocial, estado) values('$this->nit','$this->razon','$this->estado')");
        return($sql); 
    }

    public function listarEmpleados(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("select * from empleado where estado = 1 ");
        return($sql);
    }

    public function listarClienteId(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("select * from cliente where estado = 1 and id = $this->id");
        return($sql);
    }

    public function eliminarCliente(){
        include('conexion.php');
        $db = new Conexion();

        $sql = $db->query("UPDATE cliente set estado=0 where id = '$this->id'");
        return($sql);

    }
    public function editarCliente($co,$rs,$n){
        $db = new Conexion();

        $sql = $db->query("UPDATE cliente set razonsocial='$rs', nit_ci='$n' where id = '$co'");
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
