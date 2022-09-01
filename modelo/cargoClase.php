<?php
class Cargo{
    private $id;
    private $nombre;
    private $estado;

    public function __construct()
    {
        
    }

    public function grabarCargo(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("INSERT INTO cargo (`id`, `cargo`, `estado`) 
                        VALUES (NULL, '$this->nombre', '1');");
        return($sql); 
    }


    public function listarCargo(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("select * from cargo");
        return($sql);
    }
    public function listarCargoInactivo(){
        include('conexion.php');
        $db = new Conexion();
        $sql = $db->query("select * from cargo where estado = 0 ");
        return($sql);
    }

    public function eliminarCargo(){
        include('conexion.php');
        $db = new Conexion();

        $sql = $db->query("UPDATE cargo set estado=0 where id = '$this->id'");
        return($sql);

    }
    public function editarCargo($id){
        $db = new Conexion();
        $sql = $db->query("UPDATE `cargo` SET `estado` = '0' WHERE `cargo`.`id` = $id;");
        return($sql);
    }

    public function getId(){
        return $this->id;
    }
    public function setId($i){
        $this->id = $i;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($n){
        $this->nombre = $n;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function setEstado($e){
        $this->estado = $e;
    }
}
?>