<?php
include_once "Soport.php";

class CintaVideo extends Soport
{
    // Atributos
    private $durada; // Declaramos atributo durada

    // Métodos
    public function __construct($titol, $numero, $preu, $durada)
    {
        parent::__construct($titol, $numero, $preu); // solo 3 argumentos para el padre
        $this->durada = $durada;                      // inicializa duración
    }

    public function mostraResum()
    {
        echo "Pel·lícula en VHS ";
        parent::mostraResum();
        echo "Durada: " . $this->durada . " minutos"; // corrección de <br>
    }
}