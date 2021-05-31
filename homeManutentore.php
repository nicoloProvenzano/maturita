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
        <br>
        <form action="ricerca.php" method="POST">
            <input name="nome" type="text" placeholder="ricerca qui">
            <input id="submit" type="submit" value="cerca">
        </form>
        
        <?php

        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');

        $documenti_digitale = $mysqli->query("SELECT archivio.id_documento, documento_digitale.nome AS 'Nome documento' FROM `archivio`, documento_digitale WHERE archivio.id_documento=documento_digitale.id_documento");

        echo "<h4>";
        echo "Documenti digitali";
        echo "</h4>";
        //echo '<br>';
        
        while ($documento_digitale = $documenti_digitale->fetch_array(MYSQLI_ASSOC)) {

        echo "<tr id='tr'>";
            $nome=$documento_digitale["Nome documento"];
            $id=$documento_digitale["id_documento"];
            
            echo "<td id='td'>" ."<a href='documento_digitale.php?id=$id'>". $nome ."</a>". " ". "<a href='paginaOperazioneDigitale.php?id=$id'>modifica</a>"."</td>";
            //echo "<td id='td'>" . $nome . "</td>";
            echo '<br>';
            echo "</tr>";
        }
        
        //echo '<br>';
        
        echo "<h4>";
        echo "Documenti analogici";
        echo "</h4>";
        
        $documenti_analogico = $mysqli->query("SELECT archivio.id_documento, documento_analogico.nome AS 'Nome documento' FROM `archivio`, documento_analogico WHERE archivio.id_documento=documento_analogico.id_documento");

        while ($documento_analogico = $documenti_analogico->fetch_array(MYSQLI_ASSOC)) {

        echo "<tr id='tr'>";
            $nome=$documento_analogico["Nome documento"];
            $id=$documento_analogico["id_documento"];
            
            echo "<td id='td'>" ."<a href='documento_analogico.php?id=$id'>". $nome ."</a>". " ". "<a href='paginaOperazioneAnalogica.php?id=$id'>modifica</a>"."</td>";
            //echo "<td id='td'>" . $nome . "</td>";
            echo '<br>';
            echo "</tr>";
        }
	?>
        
        <h4>Vuoi aggiungere un collaboratore?</h4>
        <button onclick="window.location.href='paginaSignIn.php'">Aggiungi collaboratore</button>
        
        <h4>Vuoi aggiungere un documento analogico?</h4>
        <button onclick="window.location.href='paginaAggiungiDocumentoAnalogico.php'">Aggiungi documento</button>
        
        <h4>Vuoi aggiungere un documento digitale?</h4>
        <button onclick="window.location.href='paginaAggiungiDocumentoDigitale.php'">Aggiungi documento</button>

        
    </body>
</html>