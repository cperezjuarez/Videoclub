<?php
include_once "Soport.php";

class Joc extends Soport{ // Iniciamos la clase

    // Declaramos atributos
    public $consola;
    private $minNumJugadors;
    private $maxNumJugadors;

    // Instanciamos la clase
    public function __construct($titol, $numero, $preu, $consola, $minNumJugadors, $maxNumJugadors){
        parent::__construct($titol, $numero, $preu);
        $this->consola = $consola;
        $this->minNumJugadors = $minNumJugadors;
        $this->maxNumJugadors = $maxNumJugadors;
    }

    // Creamos los metodos
    public function mostraJugadorsPossibles(){

        if ($this->minNumJugadors = 1){
            echo "<br>Per a un jugador";
        }
        elseif ($this->maxNumJugadors > 1){
            echo "<br>Per a " . $this->minNumJugadors . "jugador";
        }
        else{
            echo "<br>De ". $this->minNumJugadors . "a " . $this->maxNumJugadors . "jugadors";
        }
    }
    public function mostraResum(){
        echo "<br>Joc per a ". $this->consola;
        parent::mostraResum();
        echo $this->mostraJugadorsPossibles();
    }
}