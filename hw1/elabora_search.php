<?php

session_start();

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
                            
$conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");
                            
$case = array();
$citta = mysqli_real_escape_string($conn, $_POST["citta"]);


$strqry = "SELECT * from `case` where citta = '$citta'";
$strqry_count = "SELECT count(*) as risultati from `case` where citta = '$citta'";
$dati_search = mysqli_query($conn,$strqry) or die("Errore query") ;
$dati_count = mysqli_query($conn,$strqry_count) or die("Errore query") ;

$count = mysqli_fetch_object($dati_count);

while($row = mysqli_fetch_assoc($dati_search))
      {
            $case[] = $row;
      }



      // Chiudi
      mysqli_free_result($dati_search);
      
      // Ritorna
      echo json_encode($case);



mysqli_close($conn);

?>
