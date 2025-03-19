<?php
$host = 'localhost';
$dbName = 'air_cond_db'; // името на вашата база
$user = 'root';          // потребител
$pass = '';              // парола (ако има)

$connection = mysqli_connect($host, $user, $pass, $dbName);

if (!$connection) {
    die("Грешка при свързване с базата: " . mysqli_connect_error());
}
?>
асьдасдфсдгсдфсдгфседрф