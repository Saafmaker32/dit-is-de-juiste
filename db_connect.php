<?php
$host = "mysql.railway.internal";
$user = "root";
$pass = "VvWUznLkqcjlbGRwGGyleGSYxSnDLbwt";
$dbname = "railway";
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("Verbinding met de Railway-database mislukt: " . $conn->connect_error);
}
?>
