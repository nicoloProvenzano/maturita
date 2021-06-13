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

        $id=$_GET['id'];
        $date = date('Y-m-d');
        
        $nome=$_POST['nome'];
        $URL=$_POST['URL'];
        $applicazione_riproduzione=$_POST['applicazione_riproduzione'];
        $apparato_ausiliiario=$_POST['apparato_ausiliiario'];
        
        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        
        $numeri_protocollo=$mysqli->query("SELECT MAX(numero_protocollo) FROM `operazione`");
        $numero_protocollo = $numeri_protocollo ->fetch_array(MYSQLI_NUM);
        $numero_protocollo=$numero_protocollo[0]+1;
        
        $operazione = $mysqli->query("INSERT INTO `operazione`(`numero_protocollo`, `data`, `id_documento`, `tipo_operazione`, `email_manutentore`) VALUES ($numero_protocollo,'$date',$id,'modifica','$email')");
        
        $modifica = $mysqli->query("UPDATE `documento_digitale` SET `URL`='$URL',`id_documento`=$id,`nome`='$nome',`applicazione_riproduzione`='$applicazione_riproduzione',`apparato_ausiliiario`='$apparato_ausiliiario' WHERE id_documento=$id");
        
        header("Refresh:0; url=paginaOperazioneDigitale.php?id=$id");
	?>
        
        
    </body>
</html>