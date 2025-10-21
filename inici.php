<?php
// Comprobacion clase Soport.php
include "src/Soport.php";

$soport1=new Soport("Tenet", 22, 3);
echo "<strong>" . $soport1->titol . "</strong>";
echo "<br>Preu: " . $soport1->getPreu() . " euros";
echo "<br>Preu IVA inclos: " . $soport1->getPreuAmbIva() . " euros";
$soport1->mostraResum();

// Salto de linea.

echo "<br>";
echo "<br>";

// Comprobacion clase Soport.php
include "src/CintaVideo.php";

$laMevaCinta = new CintaVideo( "Los cazafantasmas", 23, 3.5, 107);
echo "<strong>" . $laMevaCinta->titol . "</strong>";
echo "<br>Preu: " . $laMevaCinta->getPreu() . " euros";
echo "<br>Preu IVA inclos: " . $laMevaCinta->getPreuAmbIva() . " euros";
$laMevaCinta->mostraResum();

// Salto de linea.

echo "<br>";
echo "<br>";

// Comprobacion clase Dvd.php
include "src/Dvd.php";
$elMeuDvd = new Dvd("Origen", 24, 15, "es,en,fr", "16:9");
echo "<strong>" . $elMeuDvd->titol . "</strong>";
echo "<br>Preu: " . $elMeuDvd->getPreu() . " euros";
echo "<br>Preu IVA inclos: " . $elMeuDvd->getPreuAmbIva() . " euros";
$elMeuDvd->mostraResum();

// Salto de linea.

echo "<br>";
echo "<br>";

include "src/Joc.php";

$elMeuJoc = new Joc("The Last of Us Part II", 26, 49.99, "PS4", 1, 1);
echo "<strong>" . $elMeuJoc->titol . "</strong>";
echo "<br>Preu: " . $elMeuJoc->getPreu() . " euros";
echo "<br>Preu IVA inclos: " . $elMeuJoc->getPreuAmbIVA() . " euros";
$elMeuJoc->mostraResum();