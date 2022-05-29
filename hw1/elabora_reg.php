<?php

session_start();

    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";
    $dbname="casaservice";

    $conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");

    
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    
    

        if(isset($email) && isset($password) && isset($nome))
        {
        

                    $passMd5 = md5($password);
                    $strqry = "INSERT INTO utenti (`nome`, `email`, `password`) VALUES ('$nome', '$email', '$passMd5')";
                    $dati = mysqli_query($conn,$strqry);
            
                    if($dati){ 
                        
                        echo '<script type="text/javascript">
                            alert("Registrazione effettuata")
                            window.location= "login.php"
                            </script>';
                        exit;
                    }
                    else $errore = true;
                
        }   
    

    
    
    ?>