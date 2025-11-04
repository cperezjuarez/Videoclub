<?php
// Es la clase principal, la cual centraliza las demás e interactua con Soport.php y Client.php .
// Esta gestiona el videoclub enterio con listas de productos y clientes. Cada objeto de esta
// clase será un videoclub diferente AAA.

namespace app;

use Dwes\ProjecteVideoclub\Util\QuotaSuperadaException;
use Dwes\ProjecteVideoclub\Util\SoportJaLlogatException;

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
        $this->numProductes++; // Aumentamos los numero de productos disponibles

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
        try {
            if ($producteTrobat && $sociTrobat) {
                $this->socis[$sociPosicio]->llogar($this->productes[$productePosicio]);
                $this->productes[$j]->llogat = true; // marcar como alquilado
                $this->setNumProductesLlogats();
                $this->setNumTotalLloguers();
            }
        } catch (QuotaSuperadaException | SoportJaLlogatException $e) {
            echo $e->getMessage();
        }

    return $this;
}

    public function llogarSociProductes(int $numSoci, array $numerosProductos): self
    {
        // Buscar el socio
        $sociTrobat = false;
        $sociPosicio = -1;
        $i = 0;

        while (!$sociTrobat && $i < count($this->socis)) {
            if ($this->socis[$i]->getNumero() === $numSoci) {
                $sociTrobat = true;
                $sociPosicio = $i;
            }
            $i++;
        }

        // Si no se encuentra el socio, salir
        if (!$sociTrobat) {
            echo "No s'ha trobat el soci amb número $numSoci.<br>";
            return $this;
        }

        // Comprobamos que todos los productos estén disponibles
        $totDisponible = true;

        for ($i = 0; $i < count($numerosProductos); $i++) {
            $numProducte = $numerosProductos[$i];
            for ($j = 0; $j < count($this->productes); $j++) {
                if ($this->productes[$j]->getNumero() === $numProducte && $this->productes[$j]->llogat === true) {
                    $totDisponible = false;
                }
            }
        }

        // Si todos están disponibles, los alquilamos todos
        if ($totDisponible) {
            for ($i = 0; $i < count($numerosProductos); $i++) {
                $numProducte = $numerosProductos[$i];
                for ($j = 0; $j < count($this->productes); $j++) {
                    try {
                        if ($this->productes[$j]->getNumero() === $numProducte) {
                            $this->socis[$sociPosicio]->llogar($this->productes[$j]);
                            $this->productes[$j]->llogat = true; // marcar como alquilado
                            $this->setNumProductesLlogats();
                            $this->setNumTotalLloguers();
                        }
                    } catch (QuotaSuperadaException | SoportJaLlogatException $e) {
                        echo $e->getMessage();
                    }
                }
            }
            echo "Tots els productes s'han llogat correctament al soci $numSoci.<br>";
        } else {
            echo "Algun producte no està disponible o ya está llogat. No s'ha llogat cap.<br>";
        }

        return $this;
    }
    public function tornarSociProducte(int $numeroClient, int $numeroProducto): self
    {
        $sociTrobat = false;
        $i = 0;
        $sociPosicio = -1;

        // Cercam el soci
        while($sociTrobat == false && $i < count($this->socis)) {
            if ($this->socis[$i]->getNumero() === $numeroClient) {
                $sociTrobat = true;
                $sociPosicio = $i;
            } else {
                $i++;
            }
        }

        // Cercam si el producte está llogat
        $sopotTrobat = false;
        $i = 0;
        $soportPosicio = -1;

        // Cercam el soci
        while($sopotTrobat == false && $i < count($this->socis)) {
            if ($this->productes[$i]->getNumero() === $numeroProducto) {
                $sopotTrobat = true;
                $soportPosicio = $i;
            } else {
                $i++;
            }
        }

        // Si trobam al client tornam el soport
        if ($sociTrobat && $this->productes[$i]->llogat === true) {
            $this->socis[$sociPosicio]->tornar($this->productes[$soportPosicio]);
            $this->productes[$soportPosicio]->llogat = false;
            $this->numProductesLlogats--;
        } else {
            echo "El producte " . $this->productes[$soportPosicio]->getNumero() . " no està llogat. <br>";
        }

        return $this;
    }

    public function tornarSociProductes(int $numeroClient, array $numerosProductos): self
    {
        $sociTrobat = false;
        $i = 0;
        $sociPosicio = -1;

        // Cercam el soci
        while($sociTrobat == false && $i < count($this->socis)) {
            if ($this->socis[$i]->getNumero() === $numeroClient) {
                $sociTrobat = true;
                $sociPosicio = $i;
            } else {
                $i++;
            }
        }

        // Comprovem que tots el productes estiguin llogats
        $totLlogat = true;
        for ($i = 0; $i < count($numerosProductos); $i++) {
            $numProducte = $numerosProductos[$i];
            for ($j = 0; $j < count($this->productes); $j++) {
                if ($this->productes[$j]->getNumero() === $numProducte && !$this->productes[$j]->llogat) {
                    $totLlogat = false;
                }
            }
        }

        // Si tot está llogat, ho tornam
        if ($sociTrobat && $totLlogat) {
            for ($i = 0; $i < count($numerosProductos); $i++) {
                $numProducte = $numerosProductos[$i];
                $producteTrobat = false;
                $i = 0;
                while ($producteTrobat == false && $i < count($this->productes)) {}
                if ($this->productes[$i]->getNumero() === $numProducte) {
                    $soport = $this->productes[$i];
                    $this->socis[$sociPosicio]->tornar($soport);
                    $soport->llogat = false;
                    $this->numProductesLlogats--;
                } else {
                    $i ++;
                }
            }
        } else {
            echo "Algun producte está llogat. No s’ha tornat cap.<br>";
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

    public function setNumProductesLlogats(): void {
        $this->numProductesLlogats++;
    }

    public function getNumTotalLloguers(): int {
        return $this->numTotalLloguers;
    }

    public function setNumTotalLloguers(): void {
        $this->numTotalLloguers++;
    }
}
