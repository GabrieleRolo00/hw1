<?php
    /*******************************************************
        Controlla che i l'email sia unica
    ********************************************************/

    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";
                                
    $conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");

    // Imposto l'header della risposta
    header('Content-Type: application/json');

    // Leggo la stringa dell'email
    $email = mysqli_real_escape_string($conn, $_GET["email"]);

    // Costruisco la query
    $query = "SELECT email FROM utenti WHERE email = '$email'";

    // Eseguo la query
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    // Torna un JSON con chiave exists e valore boolean
    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>