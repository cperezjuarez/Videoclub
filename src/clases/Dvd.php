<?php
include_once "Soport.php";

class Dvd extends Soport {
    // Atributos
    public $idiomes;
    private $format;

    // Métodos
    public function __construct($titol, $numero, $preu,$idiomes, $format)
    {
        parent::__construct($titol, $numero, $preu); // argumentos para el padre
        $this-> idiomes = $idiomes;
        $this-> format = $format;
    }

    public function mostraResum()
    {
        echo "Pel·lícula en DVD ";
        parent::mostraResum();
        echo "Idiomes: " . $this->idiomes . "<br>";
        echo "Formato: " . $this->format;
    }
}