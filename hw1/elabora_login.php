
<?php

    session_start();
   
    $dbhost="localhost";
    $dbuser="root";
    $dbpassword="";

    $conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    if((ISSET($_SESSION['user'])))
    {
        header('location: index.php');
        exit;
    }


    if(isset($email) && isset($password))
    {
        
        $passMd5 = md5($password);
        $strqry = "SELECT * from utenti where email = '$email' AND password = '$passMd5'";
        $dati = mysqli_query($conn,$strqry);
        $numrighe = mysqli_num_rows($dati);

        if($numrighe==1)
        {

            if(!empty($_POST['remember'])){
                setcookie("user_login", $email, time()+ (10*365*24*60*60));
                setcookie("user_pass", $password, time()+ (10*365*24*60*60));
            }else{
                if(isset($_COOKIE["user_login"])){
                    setcookie ("user_login", "");
                }
                if(isset($_COOKIE["user_pass"])){
                    setcookie ("user_pass", "");
                }
          
            }
            $riga = mysqli_fetch_assoc($dati);
            $_SESSION['user'] = $riga["id_utente"];

            header('location: index.php');
            exit;
        }else
        {
            $_SESSION['errLog'] =  true;
            header('location: login.php');
        }

    }
    
    ?>