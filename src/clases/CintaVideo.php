<?php
include_once "Soport.php";

class CintaVideo extends Soport // Iniciamos la clase
{
    private $durada; // Declaramos atributo durada

    // Creamos Instancia de la clase
    public function __construct($titol, $numero, $preu, $durada)
    {
        parent::__construct($titol, $numero, $preu); // solo 3 argumentos para el padre
        $this->durada = $durada;                      // inicializa duración
    }

    // Creamos los metodos
    public function mostraResum()
    {
        parent::mostraResum();
        echo "<br>Durada: " . $this->durada . " minutos<br>"; // corrección de <br>
    }
}