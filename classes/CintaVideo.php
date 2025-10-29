<?php
// Clase hija de Soport.php, esta está especializada para los productos de tipo cinta de video o VHS

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

        $this->mostraResum();
    }

    public function mostraResum()
    {
        echo "<br>Pel·lícula en VHS: ";
        parent::mostraResum();
        echo "Durada: " . $this->durada . " minutos <br>"; // corrección de <br>
    }
}