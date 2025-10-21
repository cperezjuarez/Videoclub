<?php
include_once("Soport.php");
include_once("Videoclub.php");

class Client {
    // Atributos
    public String $nom;
    private int $numero;
    private array $soportsLlogats = [];
    private int $numSoportsLlogats = 0;
    private int $maxLloguerConcurrent;


    // Métodos
    public function __construct(String $nom, int $numero, int $maxLloguerConcurrent = 3) {
        $this->nom = $nom;
        $this->setNumero($numero);
        $this->maxLloguerConcurrent = $maxLloguerConcurrent;
    }

    public function mostraResum(): String {
        return "Client $this->nom amb " . count($this->soportsLlogats) . " lloguers. </br>";
    }

    public function teLlogat(Soport $s): bool {
//        return in_array($s, $this->soportsLlogats);
        $llogat = false; // Variable que devolveremos para saber si el soporte esta alquilado o no.

        // Por cada soporte de la lista, comprovamos si es el que nos pasan por parámetro
        forEach($this->soportsLlogats as $soport) {
            if ($soport->titol == $s->titol) {
                $llogat = true; // Si lo encontramos cambiamos la variable a true
            }
        }

        return $llogat;
    }

    public function llogar(Soport $s): bool {
        $llogable = false; // Variable para saber si se alquilará o no

        // Mirmos que el soporte no esté ya alquilado
        $llogat = self::teLlogat($s);
        if($llogat) {echo "Ja tens aquest suport \" $s->titol \" llogat <br>";} // Mensaje

        // Miramos que no se haya superado la quota de alquiler
        $quotaSuperada = true;

        if (count($this->soportsLlogats) < $this->maxLloguerConcurrent) {
            $quotaSuperada = false;
        } else {
            echo "Has arribat al màxim de lloguers <br>"; // Mensaje
        }

        // Comprobación final
        if (!$llogat && !$quotaSuperada) {
            $llogable = true;
        }

        // Si es alquilable, procedemos ello:
        if ($llogable) {
            $this->numSoportsLlogats++; // Aumentamos el número de soportes alquilados
            array_push($this->soportsLlogats, $s); // Lo añadimos a la lista de alquilados
            echo "Llogat correctament: $s->titol a client: $this->nom <br>"; // Mensaje
        }

        return $llogable;
    }

    public function tornar(int $numSoport = -1): bool {
        $tornat = false; // Variable para saber si se ha devuelto correctamente

        if ($numSoport != -1) {
            // Buscamos el objeto por el número que nos pasan por parámetro
            $posicio = self::cercarLlogat($numSoport);

            // Si se ha encontrado el alquiler, lo quitamos
            if ($posicio > -1) {
                $this->numSoportsLlogats--; // Reducimos el número de soportes alquilados
                unset($this->soportsLlogats[$posicio]); // Eliminamos el alquiler
                $this->soportsLlogats = array_values($this->soportsLlogats); // Reordenamos los indexes
                $tornat = true;
                echo $this->soportsLlogats[$posicio]->titol . " Suport retornat correctament <br>";
            } else {
                echo "No tens aquest suport llogat <br>";
            }
        } else {
            echo "No tens aquest suport llogat <br>";
        }

        return $tornat;
    }

    public function llistarLloguers(): void {
        echo "$this->nom té " . count($this->soportsLlogats) . " lloguers: </br>";
        forEach($this->soportsLlogats as $soport) {
            echo $soport->mostraResum() . "</br>";
            echo "-------------------</br></br>";
        }
    }

    public function cercarLlogat(int $numSoport): int {
        // Buscamos la posición en la array del producto alquilado, en caso de no estar devolvemos -1
        $posicio = -1;
        $trobat = false;
        $i = 0;
        while (!$trobat && $i < count($this->soportsLlogats)) {
            if ($this->soportsLlogats[$i]->getNumero() == $numSoport) {
                $trobat = true;
                $posicio = $i;
            } else {
                $i++;
            }
        }

        return $posicio;
    }


    // Getters & Setters
    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): void
    {
        $this->numero = $numero;
    }

    public function getNumSoportsLlogats(): int
    {
        return $this->numSoportsLlogats;
    }
}