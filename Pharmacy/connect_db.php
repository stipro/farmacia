<?php
//error_reporting (1);
$usuario='root';
$contraseña='';
try {
    $mbd = new PDO('mysql:host=localhost;dbname=pharmacy', $usuario, $contraseña);
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>