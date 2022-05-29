
<?php
session_start();


$dbhost="localhost";
$dbuser="root";
$dbpassword="";
                            
$conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");
                   

if(isset($_SESSION['user'])) {
    $utenteid = $_SESSION['user'];
    $id_casa = urlencode($_GET['id']);
                     
    $strqry = "SELECT * from likes where id_utente = '$utenteid' AND id_casa = '$id_casa'";
    $dati_id = mysqli_query($conn,$strqry) or die("Errore query") ;

    if(mysqli_num_rows($dati_id)==1){
        setcookie("like", true, time()+ (10*365*24*60*60));
    }else{
    setcookie("like", false, time()+ (10*365*24*60*60));
    }
}else{
    setcookie("like", null, time()+ (10*365*24*60*60));
}



include_once 'default_elements.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel= "stylesheet" href="swiper-bundle.min.css">
        <link rel= "stylesheet" href="styles.css">
        <link rel= "stylesheet" href="styles_post.css">
        <link rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>


    <!-- ICONE -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!-- JS -->
    <script src= "post.js" defer></script>
    <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js" defer></script>



    <title>Post</title>
</head>
<body>

        <header>
        
        <?php
			default_nav_bar();
		?>


        </header>

        <section class="main">

            <div class="indietro">
            <i class='bx bx-chevron-left' ></i>
            <h2>Torna indietro</h2>
            </div>
            
            <div class="container container_post">
                <div class="img">
                                                                                  
                </div>  
                
                <div class="data">  

                    <div class="title_like">
                        <h1 class="title">
                                                                       
                        </h1>
                    </div>                                                        
                    

                    <h2 class="prezzo">

                    </h2> 

                    <h2 class="indirizzo">

                    </h2> 

                     <h2 class="descrizione">
                     
                     </h2>  
                     
                     <div class="mappa">


                    </div>
                   
                </div>

            </div>
        </section>

        <?php
			default_footer();
			?>
    
</body>
</html>