<?php
// Incluimos cada clase una sola vez para evitar "Cannot declare class ...  already in use"
include_once "../classes/CintaVideo.php";
include_once "../classes/Dvd.php";
include_once "../classes/Joc.php";
include_once "../classes/Client.php";

// Instanciamos un par de objetos Client
$client1 = new \Videoclub\classes\Client("Bruce Wayne", 23);
$client2 = new \Videoclub\classes\Client("Clark Kent", 33);

// Mostramos el número de cada cliente creado
echo "<br>L'identificador del client 1 és: " . $client1->getNumero();
echo "<br>L'identificador del client 2 és: " . $client2->getNumero();
echo "<br>";

// Instanciamos algunos soportes (con todos los argumentos que los constructores esperan)
$soport1 = new \Videoclub\classes\CintaVideo("Los cazafantasmas", 23, 3.5, 107); // título, número, precio, duración
echo "<br>";

$soport2 = new \Videoclub\classes\Joc("The Last of Us Part II", 26, 49.99, "PS4", 1, 1); // título, número, precio, plataforma, minJugadores, maxJugadores
echo "<br>";

$soport3 = new \Videoclub\classes\Dvd("Origen", 24, 15, "es,en,fr", "16:9"); // título, número, precio, idiomas, formato
echo "<br>";

$soport4 = new \Videoclub\classes\Dvd("El Imperio Contraataca", 4, 3, "es,en", "16:9"); // título, número, precio, idiomas, formato
echo "<br>";

// Llogamos algunos soportes al client1
$client1->llogar($soport1)
    ->llogar($soport2)
    ->llogar($soport3);
echo "<br>";

// Intentamos llogar de nuevo un soporte que ya tiene llogado
$client1->llogar($soport1);
echo "<br>";

// El client1 tiene 3 soportes como máximo, este no se podrá llogar
$client1->llogar($soport4);
echo "<br>";

// Intentamos devolver un soporte que no tiene llogado
$client1->tornar(4);
echo "<br>";

// Devolvemos un soporte que sí tiene llogado
$client1->tornar(26);
echo "<br>";

// Llogamos otro soporte
$client1->llogar($soport4);
echo "<br>";

// Listamos los soportes llogados del client1
$client1->llistaLloguers();
echo "<br>";

// Este cliente no tiene lloguers
$client2->tornar(2);
