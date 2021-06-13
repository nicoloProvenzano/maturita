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
            echo '<link rel="stylesheet" type="text/css" href="css/CSSsito.css">';
        ?>

        <form action="ricerca.php" method="POST" class="searchbar">
                <input name="nome" type="text" placeholder="ricerca qui"> 
                <button class="btn btn-outline-light" type="submit">Cerca</button>
        </form>
        
        <div class="login">
        <h4>Sei un manutentore? esegui l'accesso!</h4>
        <button onclick="window.location.href='paginaDiLogin.php'">login</button>
        </div>
        <br>
        <br>
        
        <?php
        session_start();
        $_SESSION["email"]=null;
        $_SESSION["password"]=null;

        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');

        $documenti_digitale = $mysqli->query("SELECT archivio.id_documento, documento_digitale.nome AS 'Nome documento' FROM `archivio`, documento_digitale WHERE archivio.id_documento=documento_digitale.id_documento");
        $documenti_analogico = $mysqli->query("SELECT archivio.id_documento, documento_analogico.nome AS 'Nome documento' FROM `archivio`, documento_analogico WHERE archivio.id_documento=documento_analogico.id_documento");
        
        echo "<table class='tab_digitali'>";
        echo "<tr>";
        echo "<th>";
        echo "Documenti digitali";
        echo "</th>";
        echo "<th>";
        echo "Documenti analogici";
        echo "</th>";
        echo '<br>';
        
        while (($documento_digitale = $documenti_digitale->fetch_array(MYSQLI_ASSOC)) && ($documento_analogico = $documenti_analogico->fetch_array(MYSQLI_ASSOC))) {

        echo "<tr>";
            $nome=$documento_digitale["Nome documento"];
            $id=$documento_digitale["id_documento"];
            
           echo "<td id='td'><a href='documento_digitale.php?id=$id'>" .  $nome. "</a></td>";
            
            $nome=$documento_analogico["Nome documento"];
            $id=$documento_analogico["id_documento"];    
            
            
            echo "<td id='td'><a href='documento_analogico.php?id=$id'>" . $nome. "</a></td>";
            
            echo '<br>';
            
            
        }
        echo "</tr>";

        echo '<br>';
        
        echo '</table>';

	?>
        
        
    </body>
</html>