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
        ?>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

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
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>