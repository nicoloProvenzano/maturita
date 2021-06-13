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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>
        
         <?php  
            echo '<link rel="stylesheet" type="text/css" href="css/bootstrap.css">';

        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        
        session_start();

        $email=$_SESSION["email"];
        ?>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <?php
         if(is_null($email)){
            echo"<a href='index.php' style='color: black' >Torna indietro<a>";
               
        }else {

        echo" <a href='homeManutentore.php' style='color: black'>Torna indietro<a>";
        }
        ?>   
        </li>
        <h2 style="padding-left: 550px">UStory</h2>
      </ul>
        <form  action="ricerca.php" method="POST" class="d-flex">
        <input class="form-control me-2" name="nome" type="text" placeholder="Cerca" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit" >Cerca</button>
      </form>
    </div>
  </div>
</nav>
        
        <br>
        <h3>Informazioni Documento</h3>
        <?php  
        
        $id = $_GET['id'];
        $date = date('Y-m-d');
        
        setcookie("id", $id, strtotime("+10 minute"));

        $documenti_digitale = $mysqli->query("SELECT archivio.id_documento, documento_digitale.applicazione_riproduzione, documento_digitale.apparato_ausiliiario, documento_digitale.URL,documento_digitale.nome AS 'Nome documento' FROM `archivio`, documento_digitale WHERE archivio.id_documento=documento_digitale.id_documento AND archivio.id_documento=$id");

        $documento_digitale = $documenti_digitale->fetch_array(MYSQLI_ASSOC);

        $id = $documento_digitale["id_documento"];
        $nome = $documento_digitale["Nome documento"];
        $applicazione_riproduzione = $documento_digitale["applicazione_riproduzione"];
        $apparato_ausiliiario = $documento_digitale["apparato_ausiliiario"];
        $URL = $documento_digitale["URL"];
         
        echo '<br>';
        echo '<table class="table-sm">';
        echo '<tr>';
        echo "<td>Nome</td>";
        echo "<td>$nome</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Id</td>";
        echo "<td>$id</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Applicazione di riproduzione</td>";
        echo "<td>$applicazione_riproduzione</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>Apparato_ausiliario</td>";
        echo "<td>$apparato_ausiliiario</td>";
        echo '</tr>';
        echo '<tr>';
        echo "<td>URL</td>";
        echo "<td>$URL</td>";
        echo '</tr>';
        echo '</td>';
        
        echo '</table>';

        echo '<br>';

        $codici_prestiti = $mysqli->query("SELECT `cod_prestito` FROM `prenotazioni_e_prestiti` WHERE id_documento=$id");
        $codice_prestito = $codici_prestiti->fetch_array(MYSQLI_NUM);

        $date_prestiti = $mysqli->query("SELECT `data` FROM `prenotazioni_e_prestiti` WHERE id_documento=$id");
        $data_prestito = $date_prestiti->fetch_array(MYSQLI_NUM);

        $href = "paginaPrenotazione.php?id=$id";
        
        if(is_null($email)){

        if (empty($codice_prestito) || $data_prestito < $date) {

            echo"<h4 style='font-size: 20px'>Vuoi prenotare il documento? compila il form e verificheremo la richiesta!</h4>";
            echo "<a href=$href>";
            echo '<button>';
            echo "prenota";
            echo "</button>";
            echo"</a>";
        } else {

            echo "<h4 style='font-size: 20px'>";
            echo "Documenti gia' prenotato";
            echo "</h4>";
        }
        }

        echo "</tr>";
        
        ?>


    </body>
</html>