<?php
include_once("./src/clases/Client.php");

//------------- PRUEBAS DE LA CLASE CLIENT.PHP -------------

$client = new Client("Sefirot", 123, 5);
$client2 = new Client("Cloud", 456);

echo $client->mostraResum();
echo $client2->mostraResum();
