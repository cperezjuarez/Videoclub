<?php
class CintaVideo extends Soport
{
    private $durada;

    public function __construct($titol, $numero, $preu, $durada)
    {
        parent::__construct($titol, $numero, $preu); // argumentos para el padre
        $this->durada = $durada;                      // inicializa duración
    }

    public function mostraResum()
    {
        parent::mostraResum();
        echo "<br>Durada: " . $this->durada . " minutos<br>"; // corrección de <br>
    }
}