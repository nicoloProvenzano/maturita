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
        
        
        $cognome=$_POST['cognome'];
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $luogo=$_POST['luogo'];
        $data=$_POST['data'];
        
        $mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
        
        $codici_prestito=$mysqli->query("SELECT MAX(cod_prestito) FROM `prenotazioni_e_prestiti`");
        $codici_prestito = $codici_prestito ->fetch_array(MYSQLI_NUM);
        $codice_prestito=$codici_prestito[0]+1;
        
        $id=$_COOKIE["id"];
        
        
        $prenotazione = $mysqli->query("INSERT INTO `prenotazioni_e_prestiti`(`cod_prestito`, `nome`, `cognome`, `email`, `luogo_prestito`, `id_documento`, `data`) VALUES ($codice_prestito,'$nome','$cognome','$email','$luogo',$id,'$data')");
        
        header("Refresh:0; url=index.php");
	?>
        
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>