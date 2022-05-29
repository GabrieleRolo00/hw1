<?php
session_start();

$dbhost="localhost";
$dbuser="root";
$dbpassword="";
                            
$conn=mysqli_connect($dbhost,$dbuser,"","casaservice") or die("Connessione fallita");
                            
$citta = $_GET['citta'];                           
$strqry = "SELECT * from `case` where citta = '$citta'";
$strqry_count = "SELECT count(*) as risultati from `case` where citta = '$citta'";
$dati_search = mysqli_query($conn,$strqry) or die("Errore query") ;
$dati_count = mysqli_query($conn,$strqry_count) or die("Errore query") ;

$count = mysqli_fetch_object($dati_count);

if($count->risultati == 0){
    $_SESSION['noRis'] = true;
    header('location: index.php');
    exit;
}else $_SESSION['noRis'] = false;
include_once 'default_elements.php';
?>



<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel= "stylesheet" href="styles.css">
        <link rel= "stylesheet" href="styles_search.css">

        <!-- ICONE -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <script src = "search.js" defer></script>
        <title>Search</title>
    </head>
    <body>

    <header>
    <?php
			default_nav_bar();
	?>
    </header>

    <section class="main">
        <h1 id="title">
            Case in vendita a : <?php echo $citta ?>
        </h1>

        <h2 id="risultati">
            Trovati <?php echo $count->risultati ?> risultati
        </h2>

        <form action="" method="post" class="home__search" name="form_search">
                    <div class="search">
                        <i class='bx bxs-map'></i>
                        <input type="search" name="citta" placeholder="Search by location..."  class="search-input">
                    </div>
                    <input type="submit" value= "Search" class="button">
                </form>

        
        <div class="search_container section">

            <!-- carico la prima volta con php -->                                  
            <?php
                                            
            while($row = mysqli_fetch_object($dati_search))
            {
            echo '
            
                    <div class="card">
                    <a href="post.php?img='.$row->img.'&prezzo='.$row->prezzo.'&title='.$row->nome.'&indirizzo='.$row->indirizzo.'&descrizione='.$row->descrizione.'&id='.$row->id_casa.'">
                        <div class="div_img">
                        <img src='.$row->img.' alt="" class="card_img">
                        </div>

                        <div class="card_data">
                                
                                <h3 class="card_title">
                                '.$row->nome.'                            
                                </h3>


                                <h2 class="card_price">
                                    <span>€</span>'.$row->prezzo.'
                                </h2>
 
            
                                <p class="card_description">
                                    '.$row->descrizione.'
                                </p>
                        </div>
                        </a>
                    </div>
                
                                        
                                        
                ';
                }
                ?>

        </div>

    </section>
    </body>
    
    
</html>