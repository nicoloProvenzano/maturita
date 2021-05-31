<?php

        
$nome=$_POST["nome"];
$password = $_POST["password"];
$email = $_POST["email"];

$mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');

$query="INSERT INTO `manutentore`(`email`, `username`, `password`) VALUES ('$email','$nome','$password')";
$tab = $mysqli->query($query);
header("Refresh:0; url=homeManutentore.php?");

?>