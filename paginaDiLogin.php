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
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light" >
  <div class="container-fluid">

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-align: center">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

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
        
        <h3>Login</h3>
        <div class="container">
        <form action="login.php" method="POST">
            <br>
            <input type="text" name="email" placeholder="email"><br />
            <br>
            <input type="password" name="password" placeholder="password"><br />
            <br>
            <input type="submit">
        </form>
        </div>    
        <?php echo"<div> <a href='index.php'>torna indietro<a><div>";?>
        
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>

