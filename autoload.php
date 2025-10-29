<?php
spl_autoload_register( function( $nomClasse ) {
    $ruta = "../".$nomClasse.'.php';
    $ruta = str_replace("\\", "/", $ruta); // Substituïm les barres
    include_once $ruta;
} );
?>