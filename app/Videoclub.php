<?php
// Es la clase principal, la cual centraliza las demás e interactua con Soport.php y Client.php .
// Esta gestiona el videoclub enterio con listas de productos y clientes. Cada objeto de esta
// clase será un videoclub diferente AAA.

namespace Videoclub\classes;

use app\CintaVideo;
use app\Dvd;
use app\Joc;
use app\Soport;

include_once "Dvd.php";
include_once "Joc.php";
include_once "CintaVideo.php";
include_once "Client.php";

class Videoclub
{
    // Atributos
    private string $nom;
    private array $productes = [];
    private int $numProductes = 0;
    private array $socis = [];
    private int $numSocis = 0;
    protected int $idProducte = 1; // Variable para asignar un número a los productos
    protected int $idSocis = 1; // Variable para asignar un número a los socios
    private int $numProductesLlogats = 0;
    private int $numTotalLloguers = 0;


    // Métodos
    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    private function incloureProductes(Soport $producte): void
    {
        array_push($this->productes, $producte); // Añadimos el producto a la lista.
        $this->numProductes++; // Aumentamos los número de productos disponibles

        $this->setIdProducte(); // Aumentamos el contador

        // Mensaje de añadido
        echo "<br>======<br>
        Inclòs soport " . $producte->getNumero() . "<br>
        ======<br> <br>";
    }

    public function incloureCintaVideo(string $titol, float $preu, int $durada): void
    {
        $producte = new CintaVideo($titol, $this->getIdProducte(), $preu, $durada); // Creamos el objeto

        $this->incloureProductes($producte); // Lo añadimos a la lista
    }

    public function incloureDvd(string $titol, float $preu, string $idiomes, string $pantalla): void
    {
        $producte = new Dvd($titol, $this->getIdProducte(), $preu, $idiomes, $pantalla); // Creamos el objeto

        $this->incloureProductes($producte); // Lo añadimos a la lista
    }

    public function incloureJoc(string $titol, float $preu, string $consola, int $minJ, int $maxJ): void
    {
        $producte = new Joc($titol, $this->getIdProducte(), $preu, $consola, $minJ, $maxJ); // Creamos el objeto

        $this->incloureProductes($producte); // Lo añadimos a la lista
    }

    public function incloureSoci(string $nom, int $maxLloguersConcurrents = 3): void
    {
        $soci = new Client($nom, $this->getIdSocis(), $maxLloguersConcurrents); // Creamos el objeto

        array_push($this->socis, $soci); // Añadimos el socio a la lista de socios

        // Aumentamos las variables del contador de socios y el contador de id
        $this->numSocis++;
        $this->setIdSocis();

        // Mensaje
        echo "====== <br>" . "Inclòs soci " . $soci->nom . " amb número " . $soci->getNumero() . "<br> ====== <br>";
    }

    public function llistarProductes(): void
    {
        echo "Llista de productes<br>" . "$this->numProductes" . " productes disponibles<br><br>";

        foreach ($this->productes as $producte) {
            $producte->mostraResum();
            echo "<br>------<br>";
        }
    }

    public function llistarSocis(): void
    {
        echo "<br><br>Llista de socis <br><br>";
        foreach ($this->socis as $soci) {
            echo $soci->mostraResum();
        }
    }

    public function llogarSociProducte(int $numeroClient, int $numeroSoport): self
    {
        // Buscamos el producto
        $productePosicio = -1;
        $i = 0;
        $producteTrobat = false;

        while ($i < count($this->productes) && $producteTrobat == false) {
            if ($this->productes[$i]->getNumero() == $numeroSoport) {
                $productePosicio = $i;
                $producteTrobat = true;
            } else {
                $i++;
            }
        }

        // Buscamos el socio
        $sociPosicio = -1;
        $j = 0;
        $sociTrobat = false;

        while ($j < count($this->socis) && $sociTrobat == false) {
            if ($this->socis[$j]->getNumero() == $numeroClient) {
                $sociPosicio = $j;
                $sociTrobat = true;
            } else {
                $j++;
            }
        }

        // Añadimos el producto al socio
        if ($producteTrobat && $sociTrobat) {
            $this->socis[$sociPosicio]->llogar($this->productes[$productePosicio]);
        }

        return $this;
    }

    // Getters & setters
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getNumProductes(): int
    {
        return $this->numProductes;
    }

    public function setNumProductes(): void
    {
        $this->numProductes++;
    }

    public function getNumSocis(): int
    {
        return $this->numSocis;
    }

    public function setNumSocis(): void
    {
        $this->numSocis++;
    }

    protected function getIdProducte(): int
    {
        return $this->idProducte;
    }

    protected function setIdProducte(): void
    {
        $this->idProducte++;
    }

    protected function getIdSocis(): int
    {
        return $this->idSocis;
    }

    protected function SetIdSocis(): void
    {
        $this->idSocis++;
    }
    public function getNumProductesLlogats(): int {
        return $this->numProductesLlogats;
    }

    public function getNumTotalLloguers(): int {
        return $this->numTotalLloguers;
    }

}