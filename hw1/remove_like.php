<?php 

    session_start();

    if (!isset($_SESSION['user'])){
        
        header('location: login.php');
        exit;
    }


    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";

    $conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");

    $userid = $_SESSION['user'];
    

    $casaid = $_COOKIE['idCasaPref'];

    // Aggiungo un'entry ai like
    $remove_query = "DELETE FROM likes where id_utente = '$userid' AND id_casa = '$casaid'";

    $res = mysqli_query($conn, $remove_query) or die ('Unable to execute query. '. mysqli_error($conn));

    if (!$res) {

       echo "Error";
       exit;
    }

    mysqli_close($conn);
?>