<?php
// Clase Soport: representa un soporte de videoclub
class Soport
{
    public $titol;        // Título del soporte
    protected $numero;    // Número identificador (solo accesible desde la clase o subclases)
    private $preu;        // Precio (solo accesible desde dentro de la clase)

    private static $iva = 1.21; // IVA (constante estática)

    // Constructor: inicializa título, número y precio
    public function __construct($titol, $numero, $preu){
        $this->titol = $titol;
        $this->numero = $numero;
        $this->preu = $preu;
    }

    // Devuelve el precio
    public function getPreu()
    {
        return $this->preu;
    }

    // Devuelve el precio con IVA
    public function getPreuAmbIva()
    {
        return self::$iva * $this->preu;
    }

    // Devuelve el número
    public function getNumero()
    {
        return $this->numero;
    }

    // Muestra un resumen: título en cursiva y precio sin IVA
    public function mostraResum(){
        echo "<br><i>" . $this->titol . "</i><br>";
        echo $this->preu . " $ (IVA no Inclos)";
    }
}