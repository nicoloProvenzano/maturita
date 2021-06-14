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
        
        
        <h3>Aggiungi un collaboratore</h3>
        <div class="container">
            <form action="signIn.php" method="POST">
            <br>
            <input type="text" name="email" placeholder="email"><br />
            <br>
            <input type="text" name="password" placeholder="password"><br />
            <br>
            <input type="password" name="nome" placeholder="username"><br />
            <br>
            <input type="submit">
        </form>
        </div>    
        <?php echo"<div> <a href='homeManutentore.php' >torna indietro<a><div>";?>
        
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>