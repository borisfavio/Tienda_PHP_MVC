<?php
class Cliente
{
    private $id;
    private $nit;
    private $razon;
    private $estado;

    public function __construct($i, $n, $ra, $es)
    {
        $this->id=$i;
        $this->nit=$n;
        $this->razon=$ra;
        $this->estado=$es;
    }

    public function grabarCliente(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("insert into cliente(nit_ci, razonsocial, estado) values('$this->nit','$this->razon','$this->estado')");
        return($sql); 
    }

    public function listarCliente(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("select * from cliente where estado = 1 ");
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
