<?php

session_start();


include_once 'default_elements.php';
?>


<html>
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel= "stylesheet" href="swiper-bundle.min.css">
        <link rel="stylesheet" href="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.css"/>
        <link rel= "stylesheet" href="styles.css">

        <!-- ICONE -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <!-- JS -->
        
        <script src="swiper-bundle.min.js" defer></script>
        <script src="https://api.mqcdn.com/sdk/mapquest-js/v1.3.2/mapquest.js" defer></script>
        <script src="mainScript.js" defer ></script>

       

        <title>Casa Service Immobiliare</title>

    </head>
    <body>

        <header>
        <?php
			default_nav_bar();
			?>

            <div class="header_container">
                <h1>Casa Service Immobiliare</h1>

                <form action="search.php" class="home__search" name="form_search">
                    <div class="search">
                        <i class='bx bxs-map'></i>
                        <input type="search" name="citta" placeholder="Search by location..."  class="search-input">
                    </div>
                    <input type="submit" value= "Search" class="button">
                </form>

                <p class="noRis hidden"><?php
                
                                              if($_SESSION['noRis']){
                                                  echo '<script>
                                                  
                                                        text = document.querySelector(".noRis");
                                                        text.classList.remove("hidden");
                                                        </script> Nessun risultato trovato';
                                              }else{
                                                  echo  '<script>
                                                  
                                                  text = document.querySelector(".noRis");
                                                  text.parentNode.removeChild(text);

                                                  </script>';
                                              }                                  
                                        
                                        
                                        
                                        
                                        ?></p>
            </div>
        </header>

        <section class="main">
                <section class="popular section" id="popular">
                
                    <div class="container">
                        <span class="section_subtitle"> </p>Migliori scelte</span>
                        <h2 class="section_title">
                            Residenze popolari <span>.</span>
                        </h2>

                        <div class="popular_container swiper">
                            <div class="swiper-wrapper">


                           
                                
                            </div>
                                        
                            <div class="swiper-button-next">
                            <i class='bx bx-chevron-right'></i>
                            </div>
                            <div class="swiper-button-prev">
                            <i class='bx bx-chevron-left' ></i>
                            </div>

                        </div>

                        
                    </div>

                </section>

                <section class="news section" id="news">
                
                    <div class="container">
                        <span class="section_subtitle"> New</span>
                        <h2 class="section_title">
                            Ultime offerte <span>.</span>
                        </h2>

                        <div class="news_container swiper">
                            <div class="swiper-wrapper">

                          
                            </div>

                            <div class="swiper-button-next">
                            <i class='bx bx-chevron-right'></i>
                            </div>
                            <div class="swiper-button-prev">
                            <i class='bx bx-chevron-left' ></i>
                            </div>

                        </div>

                        
                    </div>
                </section>

            </section>



            <section class="contact section" id="contact" name = "contact">

                    <div class="contact_container container grid">

                            <div class="contact_content">
                                <div class="contact_data">
                                    <span class="section_subtitle">Contact us</span>

                                    <h2 class="section_title">
                                        Easy to contact us <span>.</span>
                                    </h2>

                                    <p class="contact_description">
                                        Hai riscontrato qualche problema? </br> Contattaci!

                                    </p>
                                </div>

                                <div class="contact_card">
                                <div class="contact_card-box">
                                        <div class="contact_card-info">
                                        <i class='bx bx-phone' ></i>
                                            <div>
                                                <h3 class="contact_card-title">
                                                    Chiamaci Ora
                                                </h3>
                                                <p class="contact_card-description">
                                                    345.9754972
                                                </p>
                                            </div>
                                        </div>

                                        <button class="button contact_card-button">
                                            Chiama
                                        </button>
                                    </div>

                                    <div class="contact_card-box">
                                        <div class="contact_card-info">
                                        <i class='bx bxs-map icon' ></i>
                                            <div>
                                                <h3 class="contact_card-title">
                                                Posizione
                                                </h3>

                                                <p class="contact_card-description">
                                                    Puoi trovarci qui!
                                                </p>

                                                <div class="mappa">

                                                 </div>
                                               
                                            </div>
                                        </div>

                                      
                                    </div>

                                    
                                    
                                </div>
                            </div>
                        
                    </div>              


                            </section>
                    </section>
                </section>
        </section>

            
                                
        <!--FOOTER-->

        <?php
			default_footer();
			?>



    </body>
    
        
</html>