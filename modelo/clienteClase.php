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

}

?>
