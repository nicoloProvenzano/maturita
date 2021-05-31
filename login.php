
<?php
$password = $_POST["password"];
$email = $_POST["email"];

$mysqli = new mysqli('localhost', 'root', '', 'gestionedocumentistorici');
$tab = $mysqli->query("SELECT manutentore.password FROM manutentore WHERE manutentore.email='$email'");
$pwa = $tab->fetch_array(MYSQLI_ASSOC);
$pw = $pwa["password"];
  if (empty($pw)) {
     header("Refresh:0; url=passwordSbagliata.php");
  } else if ($pw == $password) {
      session_start();
      
      //$carrello=array();
      
      //$json = json_encode($carrello);
      
      $_SESSION["email"]=$email;
      $_SESSION["password"]=$password;
     // setcookie("carrello", $json, strtotime("+2 minute"));
        
      header("Refresh:0; url=homeManutentore.php");
  } else {
     header("Refresh:0; url=passwordSbagliata.php");
  }
?>