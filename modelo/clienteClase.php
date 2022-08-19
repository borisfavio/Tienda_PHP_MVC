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
        $sql = $db->query("select * from cliente where estado = 1 and id = '$this->id'");
        return($sql);
    }

    public function eliminarCliente(){

    }
    public function editarCliente($cod, $rs,$nit){
        include('conexion.php');
        $db = new Conexion();
        echo $cod;
        echo $rs;
        echo $nit;
        $sql = $db->query("update cliente set razonsocial='$rs', nit_ci='$nit' where id = $cod");
        return($sql);
    }

}

?>
