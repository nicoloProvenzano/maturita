<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <?php  
            echo '<link rel="stylesheet" type="text/css" href="css/CSSsito.css"></head>';
        ?>
        <?php

        session_start();

        $email = $_SESSION["email"];
        $password = $_SESSION["password"];

        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        $risultato = $mysqli->query("SELECT manutentore.username FROM manutentore WHERE manutentore.email='$email'");

        $nomiManutentori = $risultato->fetch_array(MYSQLI_ASSOC);
        $nome = $nomiManutentori["username"];

        echo 'accesso eseguito come:' . $nome;

        ?>
        <form action="aggiungiAnalogico.php" method="POST">
            nome<input type="text" name="nome">
            caratteristiche<input type="text" name="caratteristiche">
            supporto<input type="text" name="supporto">
            lugod_custodia<input type="text" name="lugod_custodia">
            <input type="submit">
        </form>
        <?php echo"<div> <a href='homeManutentore.php' >torna indietro<a><div>";?>
    </body>
</html>