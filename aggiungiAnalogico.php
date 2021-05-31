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
        $date = date('Y-m-d');

        $nome=$_POST['nome'];
        $caratteristiche=$_POST['caratteristiche'];
        $supporto=$_POST['supporto'];
        $lugod_custodia=$_POST['lugod_custodia'];
        
        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        
        $numeri_protocollo=$mysqli->query("SELECT MAX(numero_protocollo) FROM `operazione`");
        $numero_protocollo = $numeri_protocollo ->fetch_array(MYSQLI_NUM);
        $numero_protocollo=$numero_protocollo[0]+1;
        
        $id_documenti=$mysqli->query("SELECT MAX(id_documento) FROM `archivio`");
        $id_documento = $id_documenti ->fetch_array(MYSQLI_NUM);
        $id_documento=$id_documento[0]+1;
        
        $operazione = $mysqli->query("INSERT INTO `operazione`(`numero_protocollo`, `data`, `id_documento`, `tipo_operazione`, `email_manutentore`) VALUES ($numero_protocollo,'$date',$id_documento,'aggiunta','$email')");
        
        $modifica = $mysqli->query("INSERT INTO `archivio`(`id_documento`, `nome_documento`, `tipo_documento`) VALUES ($id_documento, '$nome','analogico')");
        
        $modifica = $mysqli->query("INSERT INTO `documento_analogico`(`supporto`, `id_documento`, `nome`, `caratteristiche`, `lugod_custodia`) VALUES ('$supporto',$id_documento,'$nome','$caratteristiche','$lugod_custodia')");
        
        header("Refresh:0; url=homeManutentore.php");
	?>
        
    </body>
</html>