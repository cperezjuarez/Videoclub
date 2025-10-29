<?php
// Clase hija de Soport.php, esta está especializada para los productos de tipo DVD

namespace Videoclub\classes;

include_once "Soport.php";

class Dvd extends Soport
{
    // Atributos
    public $idiomes;
    private $format;

    // Métodos
    public function __construct($titol, $numero, $preu, $idiomes, $format)
    {
        parent::__construct($titol, $numero, $preu); // argumentos para el padre
        $this->idiomes = $idiomes;
        $this->format = $format;

        $this->mostraResum();
    }

    public function mostraResum()
    {
        echo "<br>Pel·lícula en DVD ";
        parent::mostraResum();
        echo "Idiomes: " . $this->idiomes . "<br>";
        echo "Formato: " . $this->format . "<br>";
    }
}