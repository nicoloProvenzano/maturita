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
        
        session_start();

        $email = $_SESSION["email"];
        $password = $_SESSION["password"];

        $id=$_GET['id'];
        $date = date('Y-m-d');
        
        $nome=$_POST['nome'];
        $caratteristiche=$_POST['caratteristiche'];
        $supporto=$_POST['supporto'];
        $lugod_custodia=$_POST['lugod_custodia'];
        
        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        
        $numeri_protocollo=$mysqli->query("SELECT MAX(numero_protocollo) FROM `operazione`");
        $numero_protocollo = $numeri_protocollo ->fetch_array(MYSQLI_NUM);
        $numero_protocollo=$numero_protocollo[0]+1;
        
        $operazione = $mysqli->query("INSERT INTO `operazione`(`numero_protocollo`, `data`, `id_documento`, `tipo_operazione`, `email_manutentore`) VALUES ($numero_protocollo,'$date',$id,'modifica','$email')");
        
        $modifica = $mysqli->query("UPDATE `documento_analogico` SET `supporto`='$supporto',`id_documento`=$id,`nome`='$nome',`caratteristiche`='$caratteristiche',`lugod_custodia`='$lugod_custodia' WHERE id_documento=$id");
        
        header("Refresh:0; url=paginaOperazioneAnalogico.php?id=$id");
	?>
        
        
    </body>
</html>