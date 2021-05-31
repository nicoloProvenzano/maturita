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
        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        
        session_start();
        $email=$_SESSION["email"];

        $id = $_GET['id'];
        $date = date('Y-m-d');
        
        setcookie("id", $id, strtotime("+10 minute"));
        

        $documenti_digitale = $mysqli->query("SELECT archivio.id_documento, documento_analogico.supporto, documento_analogico.lugod_custodia, documento_analogico.caratteristiche, documento_analogico.nome AS 'Nome documento' FROM `archivio`, documento_analogico WHERE archivio.id_documento=documento_analogico.id_documento AND archivio.id_documento=$id");

        echo "<h4>";
        echo "Documenti digitali";
        echo "</h4>";
        //echo '<br>';

        $documento_digitale = $documenti_digitale->fetch_array(MYSQLI_ASSOC);

        $id = $documento_digitale["id_documento"];
        $nome = $documento_digitale["Nome documento"];
        $applicazione_riproduzione = $documento_digitale["supporto"];
        $apparato_ausiliiario = $documento_digitale["lugod_custodia"];
        $caratteristiche = $documento_digitale["caratteristiche"];



        echo "<tr id='tr'>";

        echo "<td id='td'> id:" . $id . "</td>";
        echo '<br>';
        echo "<td id='td'> nome:" . $nome . "</td>";
        echo '<br>';
        echo "<td id='td'> applicazione di riproduzione:" . $applicazione_riproduzione . "</td>";
        echo '<br>';
        echo "<td id='td'> apparato ausiliario:" . $apparato_ausiliiario . "</td>";
        echo '<br>';
        echo "<td id='td'> apparato ausiliario:" . $caratteristiche . "</td>";

        $codici_prestiti = $mysqli->query("SELECT `cod_prestito` FROM `prenotazioni_e_prestiti` WHERE id_documento=$id");
        $codice_prestito = $codici_prestiti->fetch_array(MYSQLI_NUM);

        $date_prestiti = $mysqli->query("SELECT `data` FROM `prenotazioni_e_prestiti` WHERE id_documento=$id");
        $data_prestito = $date_prestiti->fetch_array(MYSQLI_NUM);


        $href = "paginaPrenotazione.php?id=$id";
        
        if(is_null($email)){

        if (empty($codice_prestito) || $data_prestito < $date) {

            echo"<h4>Vuoi prenotare il documento? compila il form e verificheremo la richiesta!</h4>";
            echo "<a href=$href>";
            echo '<button>';
            echo "prenota";
            echo "</button>";
            echo"</a>";
        } else {

            echo "<h4>";
            echo "Documenti gia prenotato";
            echo "</h4>";
        }
        }
        

        echo "</tr>";
        
        if(is_null($email)){
            echo"<div> <a href='index.php' >torna indietro<a><div>";
               
        }else {

        echo"<div> <a href='homeManutentore.php' >torna indietro<a><div>";
        }
        ?>



    </body>
</html>