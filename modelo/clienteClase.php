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

    }

    public function listarClienteId(){

    }

    public function eliminarCliente(){

    }
    public function editarCliente($cod, $rs,$nit){

    }

}

?>
