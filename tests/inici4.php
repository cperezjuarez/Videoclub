<?php
// Este test es para comprobar las nuevas funcionalidades de llogarSociProductes() y tornarSociProductes().

include "../autoload.php";

use app\Videoclub;

$vc = new Videoclub("Cas Concos 45 baixos");

//inclouré uns quants soports de prova
$vc->incloureJoc("God of War", 19.99, "PS4", 1, 1);
$vc->incloureJoc("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incloureDvd("Torrente", 4.5, "es", "16:9");
$vc->incloureDvd("Origen", 4.5, "es,en,fr", "16:9");
$vc->incloureDvd("El Imperio Contraataca", 3, "es,en", "16:9");
$vc->incloureCintaVideo("Los cazafantasmas", 3.5, 107);
$vc->incloureCintaVideo("El nombre de la Rosa", 1.5, 140);

//llist els productes
$vc->llistarProductes();
echo "</br>";
//crearé alguns socis
$vc->incloureSoci("Tofol Verdera", 2);
$vc->incloureSoci("Biel Calafell");
echo "</br>";

$vc->llogarSociProductes(1, [2, 3]);
$vc->llogarSociProductes(1, [2, 3, 2, 6]);
