<?php

session_start();

    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname="casaservice";

    $conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");



    $nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $prezzo = mysqli_real_escape_string($conn, $_GET['prezzo']);
    $citta = mysqli_real_escape_string($conn, $_GET['citta']);
    $indirizzo = mysqli_real_escape_string($conn, $_GET['indirizzo']);
    $descrizione = mysqli_real_escape_string($conn, $_GET['descrizione']);
    $img = $_GET['img'];

    $img2 = "img/".$_GET['img'];


    if(isset($nome) && isset($prezzo) && isset($descrizione) && isset($img) && isset($citta) && isset($indirizzo))
    {
        $strqry = "INSERT INTO `case` (`nome`, `prezzo`, `descrizione`, `img`, `tipo`, `citta`, `indirizzo`) VALUES ('$nome', '$prezzo', '$descrizione', '$img2','new', '$citta', '$indirizzo')";
        $dati = mysqli_query($conn,$strqry);

        if($dati){

            echo '<script type="text/javascript">
                alert("Annuncio creato!")
                window.location= "index.php"
			    </script>';
            exit;
        }
        else $errore = true;

    }
?>
