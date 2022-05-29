<?php
  session_start();

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
                            
$conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");

$tipo = urlencode($_GET['tipo']); 

$userid = urlencode($_GET['id']);

if($userid != null){

      $strqryLike = "SELECT * from likes where id_utente = '$userid'";
      $dati_like = mysqli_query($conn,$strqryLike) or die("Errore query") ;
      
      
      
            $strqry1 = "SELECT * from `case` where tipo = '$tipo'";
            $dati = mysqli_query($conn,$strqry1) or die("Errore query") ;
            $case = array();
            
            $i=0;
      
            while($row = mysqli_fetch_object($dati))
            {
                  $case[$i] = $row;
      
                  $strqryLike = "SELECT * from likes where id_utente = '$userid' AND id_casa = '$row->id_casa'";
                  $dati_like = mysqli_query($conn,$strqryLike) or die("Errore query") ;
                  
                  if(mysqli_num_rows($dati_like)!=0){
      
                        $case[$i]->like = true;
                        
                  }else{
                        $case[$i]->like = false;
                  }
                  $i++;
            }

}else{

      $strqry1 = "SELECT * from `case` where tipo = '$tipo'";
            $dati = mysqli_query($conn,$strqry1) or die("Errore query") ;
            $case = array();

            while($row = mysqli_fetch_object($dati))
            {
                  $case[] = $row;
            }
            
            
}


mysqli_free_result($dati);
mysqli_close($conn);
echo json_encode($case);


?>