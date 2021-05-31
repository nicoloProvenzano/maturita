<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"  type="text/css" href="cssLogin.css">
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
        <form action="signIn.php" method="POST">
            email<input type="text" name="email">
            password<input type="password" name="password">
            username<input type="text" name="nome">
            <input type="submit">
        </form>
        <?php echo"<div> <a href='index.php' >torna indietro<a><div>";?>
    </body>
</html>