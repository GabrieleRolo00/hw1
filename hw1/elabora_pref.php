<?php
session_start();

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
                            
$conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");
                   

$utenteid = urlencode($_GET['id_utente']);
$case = array();
                     
$strqry = "SELECT * from likes where id_utente = '$utenteid'";
$dati_id = mysqli_query($conn,$strqry) or die("Errore query") ;

if($dati_id){
    while($row = mysqli_fetch_object($dati_id))
    {
        $strqry2 = "SELECT * from `case` WHERE id_casa ='$row->id_casa' ";
        $dati_case = mysqli_query($conn,$strqry2) or die("Errore query") ;
        $case[] = mysqli_fetch_object($dati_case);

    }
}


      mysqli_free_result($dati_id);
      mysqli_close($conn);
      // Ritorna
      echo json_encode($case);

?>
