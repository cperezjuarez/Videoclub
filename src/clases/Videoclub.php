<?php
include_once "Dvd.php";
include_once "Joc.php";
include_once "CintaVideo.php";
include_once "Client.php";

class Videoclub {
    // Atributos
    private String $nom;
    private Array $productes = [];
    private int $numProductes;
    private Array $socis = [];
    private int $numSocis;


    // Métodos
    public function __construct(string $nom) {
        $this->nom = $nom;
    }

    private function incloureProductes(Soport $producte): int {
        array_push($this->productes, $producte); // Añadimos el producto a la lista.

        // Hacemos una comprobación para ver si el producto a sido correctamente añadido.
        $resultat = -1;

        if (array_search($producte, $this->productes)) {
            $resultat = 1;
        }

        return $resultat;
    }

    public function incloureCintaVideo(String $titol, float $preu, int $durada): void {
        $producte = new CintaVideo($titol, 2, $preu, $durada); // Creamos el objeto

        $resultat = $this->incloureProductes($producte); // Lo añadimos a la lista

        // Mensajes del resultado
        if ($resultat == -1) {
            echo "bien";
        } else if ($resultat == 1) {
            echo "mal";
        }
    }

    public function incloureDvd(String $titol, float $preu, String $idiomes, String $pantalla): void {
        $producte = new DVD($titol, 2, $preu, $idiomes, $pantalla); // Creamos el objeto

        $resultat = $this->incloureProductes($producte); // Lo añadimos a la lista

        // Mensajes del resultado
        if ($resultat == -1) {
            echo "bien";
        } else if ($resultat == 1) {
            echo "mal";
        }
    }

    public function incloureJoc(String $titol, float $preu, String $consola, int $minJ, int $maxJ): void {
        $producte = new Joc($titol, 2, $preu, $consola, $minJ, $maxJ); // Creamos el objeto

        $resultat = $this->incloureProductes($producte); // Lo añadimos a la lista

        // Mensajes del resultado
        if ($resultat == -1) {
            echo "bien";
        } else if ($resultat == 1) {
            echo "mal";
        }
    }

    public function incloureSoci(String $nom, int $maxLloguersConcurrents = 3): void {
        $soci = new Client($nom, $maxLloguersConcurrents); // Creamos el objeto

        array_push($this->socis, $soci); // Añadimos el socio a la lista de clientes

        // Hacemos una comprobación para ver si el producto a sido correctamente añadido.
        if (array_search($soci, $this->socis)) {
            echo "bien";
        } else {
            echo "mal";
        }
    }

    public function llistarProductes(): void {
        foreach ($this->productes as $producte) {
            $producte->mostraResum();
        }
    }

    public function llistarSocis(): void {
        foreach ($this->socis as $soci) {
            echo "Client $soci->mostraResum() amb ". count($soci->numSoportsLlogats) ." lloguers";
        }
    }

    public function llogarSociProducte(int $numeroClient, $numeroSoport): void {
        // Buscamos el producto
        $producte = array_search($numeroSoport, $this->productes);

        // Buscamos el cliente
        $soci = array_search($numeroClient, $this->socis);

        // Añadimos el producto al cliente
        $soci->llogar($producte);
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
}
