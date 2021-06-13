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
            
            session_start();

        $email = $_SESSION["email"];
        $password = $_SESSION["password"];
        
        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        $risultato = $mysqli->query("SELECT manutentore.username FROM manutentore WHERE manutentore.email='$email'");

        $nomiManutentori = $risultato->fetch_array(MYSQLI_ASSOC);
        $nome = $nomiManutentori["username"];

        ?>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page"><?php echo "accesso eseguito come: $nome"; ?></a>
        </li>
        <h2 style="padding-left: 320px">UStory</h2>
      </ul>
      <form action="ricerca.php" method="POST" class="d-flex">
        <input class="form-control me-2" name="nome" type="text" placeholder="Cerca" aria-label="Search">
        <button class="btn btn-outline-secondary" type="submit" >Cerca</button>
      </form>
    </div>
  </div>
</nav>
        <br>
        
        <?php
       
        $documenti_digitale = $mysqli->query("SELECT archivio.id_documento, documento_digitale.nome AS 'Nome documento' FROM `archivio`, documento_digitale WHERE archivio.id_documento=documento_digitale.id_documento");
        $documenti_analogico = $mysqli->query("SELECT archivio.id_documento, documento_analogico.nome AS 'Nome documento' FROM `archivio`, documento_analogico WHERE archivio.id_documento=documento_analogico.id_documento"); 
        
        echo "<table>";
        echo '<tr>';
        echo "<th colspan='2' class='titoloDocumenti'>Documenti Storici</th>";
        echo '</tr>';
        echo "<th>";
        echo "Documenti digitali";
        echo "</th>";
        echo "<th>";
        echo "Documenti analogici";
        echo "</th>";
        echo '</tr>';
        
        while (($documento_digitale = $documenti_digitale->fetch_array(MYSQLI_ASSOC)) && ($documento_analogico = $documenti_analogico->fetch_array(MYSQLI_ASSOC))) {

        echo "<tr>";
            $nome=$documento_digitale["Nome documento"];
            $id=$documento_digitale["id_documento"];
            
            echo "<td id='td'>" ."<a href='documento_digitale.php?id=$id'>". $nome ."</a>". " ". "<a href='paginaOperazioneDigitale.php?id=$id'>modifica</a>"."</td>";
            
            $nome=$documento_analogico["Nome documento"];
            $id=$documento_analogico["id_documento"];    
            
            
            echo "<td id='td'>" ."<a href='documento_analogico.php?id=$id'>". $nome ."</a>". " ". "<a href='paginaOperazioneAnalogica.php?id=$id'>modifica</a>"."</td>";

            
            echo "</tr>";
        }
        
        echo '</table>';
        
         echo '<br>';

	?>
        
        <h4 style="font-size: 20px">Vuoi aggiungere un collaboratore?</h4>
        <button onclick="window.location.href='paginaSignIn.php'">Aggiungi collaboratore</button>
        
        <h4 style="font-size: 20px">Vuoi aggiungere un documento analogico?</h4>
        <button  onclick="window.location.href='paginaAggiungiDocumentoAnalogico.php'">Aggiungi documento</button>
        
        <h4 style="font-size: 20px">Vuoi aggiungere un documento digitale?</h4>
        <button onclick="window.location.href='paginaAggiungiDocumentoDigitale.php'">Aggiungi documento</button>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
   
        
    </body>
</html>