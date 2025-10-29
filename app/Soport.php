<?php
// Esta clase representa los productos del videoclub, es la clase padre la cuál tendrá hijos más
// específicos de los productos

namespace app;

include_once "Resumible.php";

abstract class Soport implements Resumible
{
    // Atributos
    public $titol;
    protected $numero;
    private $preu;
    private static $iva = 0.21;

    // Métodos
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
        return (self::$iva * $this->preu) + $this->preu;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function mostraResum()
    {
        echo "<i>" . $this->titol . "</i>" . "</br>" ;
        echo $this->preu . " " . "€ " . "(IVA no inclos) </br>";
    }
}