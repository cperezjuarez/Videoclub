<?php
// Comprobacion clase Soport.php
include "src/Soport.php";

$soport1 = new Soport("Tenet", 22, 3);
echo "<strong>" . $soport1->titol . "</strong>";
echo "<br>Preu: " . $soport1->getPreu() . " euros";
echo "<br>Preu IVA inclos: " . $soport1->getPreuAmbIVA() . " euros";
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
