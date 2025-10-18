<?php
include "Soport.php";

$soport1 = new Soport("Tenet", 22, 3);
echo "<strong>" . $soport1->titol . "</strong>";
echo "<br>Preu: " . $soport1->getPreu() . " euros";
echo "<br>Preu IVA inclos: " . $soport1->getPreuAmbIVA() . " euros";
$soport1->mostraResum();