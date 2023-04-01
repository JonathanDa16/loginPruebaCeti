<?php
$server = "localhost";
$username = "admin";
$password = "admin";
$dbname = "seguridad";

// Crea la conexión
$conn = mysqli_connect($server, $username, $password, $dbname);

// Verifica la conexión
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
?>