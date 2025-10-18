<?php
class  Soport
{
    public $titol;
    protected $numero;
    private $preu;
    private static $iva = 1.21;

    public function __construct($titol, $numero, $preu){
        $this->titol = $titol;
        $this->numero = $numero;
        $this->preu = $preu;
    }
    public function getPreu()
    {
        return $this->preu;
    }
    public function getPreuAmbIva()
    {
        return self::$iva * $this->preu;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function mostraResum(){
        echo "<br>" . "<i>" . $this->titol . "</i>" . "</br>" ;
        echo $this->preu . " " . "$ " . "(IVA no Inclos)";
    }
}