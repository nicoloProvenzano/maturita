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
        
        <form action="login.php" method="POST">
                nome: <input type="text" name="email">
                password <input type="text" name="password">
            <input type="submit">
        </form>
        <?php echo"<div> <a href='index.php' >torna indietro<a><div>";?>
    </body>
</html>

