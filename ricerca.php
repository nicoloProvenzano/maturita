<?php

session_start();

        $email = $_SESSION["email"];
        $password = $_SESSION["password"];

$mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');

        $nome = $_POST['nome'];
       
        $risultato = $mysqli->query("SELECT archivio.id_documento,archivio.tipo_documento FROM `archivio` WHERE archivio.nome_documento='$nome'");
        $documenti = $risultato->fetch_array(MYSQLI_ASSOC);
        if(is_null($documenti)){
            $id_documento=null;
        }else
        $id_documento = $documenti['id_documento'];
        
        if (empty($id_documento)) {
            
            echo "<h4>";
            echo "Documento/i inesistente/i";
            echo "</h4>";
            
            if(is_null($email)){
                echo"<div> <a href='index.php' >torna indietro<a><div>";
            }
            else{
                echo"<div> <a href='homeManutentore.php' >torna indietro<a><div>";
            }
        }
        
        else {
            
             $tipo_documento = $documenti['tipo_documento'];
             
             if($tipo_documento=="analogico"){
                 header("Refresh:0; url=documento_analogico.php?id=$id_documento");
             }
            
            if($tipo_documento=="digitale"){
                 header("Refresh:0; url=documento_digitale.php?id=$id_documento");
             }
            
        }
?>