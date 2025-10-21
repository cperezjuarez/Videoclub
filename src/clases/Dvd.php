<?php

class Dvd extends Soport{ // Iniciamos la clase
    public $idiomes;
    private $format;

    // Creamos Instancia de la clase
    public function __construct($titol, $numero, $preu,$idiomes, $format)
    {
        parent::__construct($titol, $numero, $preu); // argumentos para el padre
        $this-> idiomes = $idiomes;
        $this-> format = $format;
    }

    // Creamos los metodos
    public function mostraResum()
    {
        parent::mostraResum();
        echo "Idiomes: " . $this->idiomes . "<br>";
        echo "Formato: " . $this->format . "<br>";
    }
}