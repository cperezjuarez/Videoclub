<?php
include_once "Soport.php";

class Joc extends Soport {
    // Atributos
    public $consola;
    private $minNumJugadors;
    private $maxNumJugadors;

    // Métodos
    public function __construct($titol, $numero, $preu, $consola, $minNumJugadors, $maxNumJugadors){
        parent::__construct($titol, $numero, $preu);
        $this->consola = $consola;
        $this->minNumJugadors = $minNumJugadors;
        $this->maxNumJugadors = $maxNumJugadors;

        $this->mostraResum();
    }

    public function mostraJugadorsPossibles(){

        if ($this->maxNumJugadors = 1){
            echo "Per a 1 jugador";
        } else{
            echo "De ". $this->minNumJugadors . "a " . $this->maxNumJugadors . "jugadors";
        }
    }

    public function mostraResum(){
        echo "<br>Joc per " . $this->consola . ": ";
        parent::mostraResum();
        echo $this->mostraJugadorsPossibles() . "<br>";
    }
}