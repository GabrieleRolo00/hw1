<?php 

    session_start();

    if((!ISSET($_SESSION['user'])))
    {
        header("location: login.php");

        exit;
    }


    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";

    $conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");

    
    $userid = $_SESSION['user'];
    

    $casaid = $_COOKIE['idCasaPref'];

    // Insert like
    $in_query = "INSERT INTO likes (`id_utente`, `id_casa`) VALUES('$userid', '$casaid')";

    $res = mysqli_query($conn, $in_query) or die ('Unable to execute query. '. mysqli_error($conn));

    if (!$res) {

       echo "Error";
       exit;
    }

    mysqli_close($conn);
    exit;
?>