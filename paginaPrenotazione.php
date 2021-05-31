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
        <form action="prenotazione.php" method="POST">
            Nome<input type="text" name="nome">
            Cognome<input type="text" name="cognome">
            Email<input type="text" name="email">
            Data della prenotazione<input type="date" name="data">
            Luogo del prestito<input type="text" name="luogo">
            <input type="submit">
        </form>
        <?php echo"<div> <a href='index.php' >torna indietro<a><div>";?>
    </body>
</html>