<?php

	/*----------NAV----------*/ 
	function default_nav_bar(){


        echo('
        <nav>
        <a href= "index.php" class= logo> CASA SERVICE <i class="bx bx-home" ></i> </a>

        <div class="menu">
            <ul class="lista">

                <li class="item">
                    <a href="index.php" class="nav_link"> Home </a>
                    <a href="index.php"> <i class="bx bx-home-alt-2"></i></a>
                </li>

                <li class="item">
                    <a href="preferiti.php" class="nav_link" id="btn_pref">'); if(isset($_SESSION["user"])){
                                                                        echo "Preferiti";

                                                                    } 
                                                                    else{
                                                                        echo "<script> 
                                                                                    btn = document.querySelector('#btn_pref');
                                                                                    btn.parentNode.parentNode.removeChild(btn.parentNode);
                                                                            
                                                                                </script>";
                                                                    }
                                                                echo ('</a>
                    <a href="preferiti.php"> <i class="bx bx-like" ></i>
                </li>

                <li class="item contact">
                    <a href="#contact" class="nav_link"> Contatti </a>
                    <a href="#contact"> <i class="bx bxs-phone-call"></i>
                </li>

                <li class="item" id="btn_annuncio">
                    <a href="crea_annuncio.php" class="ann_link">');   if(isset($_SESSION["user"])){
                                                                        echo "Crea annuncio";

                                                                    } 
                                                                    else{
                                                                        echo "<script> 

                                                                        btn2 = document.querySelector('#btn_annuncio');
                                                                        btn2.parentNode.removeChild(btn2);
                                                                            
                                                                        </script>";
                                                                    }
                                                    echo ('</a>
                    <a href="crea_annuncio.php"> <i class="bx bx-message-add"></i>
                    
                </li>

                <li class="item"  id="btn_login">
                    <a href="login.php" class="nav_link">');
                                                            if(isset($_SESSION["user"]))
                                                                        {
                                                                            echo "<script> 
                                                                                    btn = document.querySelector('#btn_login');
                                                                                    btn.parentNode.removeChild(btn);
                                                                            
                                                                                </script>";
                                                                        }else
                                                                        {
                                                                            echo "Accedi";
                                                                        }

                     echo ('                                 
                    </a>
                    <a href="login.php"> <i class="bx bx-user"></i>
                </li>

                <li class="item" id="btn_logout">
                    <a href="logout.php" class="nav_link">');
                                                            if(!isset($_SESSION["user"]))
                                                                        {
                                                                            echo "<script> 
                                                                                    btn = document.querySelector('#btn_logout');
                                                                                    btn.parentNode.removeChild(btn);
                                                                            
                                                                                </script>";
                                                                        }else
                                                                        {
                                                                            echo "Logout";
                                                                        }

                                                            echo (' </a>
                    <a href="logout.php"> <i class="bx bxs-user-x" ></i></a>
                </li>

            </ul>
        </div>
        </nav>');

	}
	/*----------------------------------------------------------------
					Mostra il footer di default
	-----------------------------------------------------------------*/
	function default_footer(){

        echo('

        <footer class="footer section">

                  <div class="footer_container container grid">
                      <div>
                          <a href="#" class="footer_logo">
                            Casa service<i class="bx bx-home" ></i>
                          </a>

                          <p class="footer_description">
                                Il nostro sito è bellissimo veramente</br>dai un occhiata
                          </p>
                      </div>

                      <div class="footer_content">
                          <div>
                              <h3 class="footer_title">
                                    About
                              </h3>

                              <ul class="footer_links">
                                  <li>
                                      <a href="#" class="footer_link">About us</a>
                                  </li>
                                  <li>
                                      <a href="#" class="footer_link">Features</a>
                                  </li>
                                  <li>
                                      <a href="#" class="footer_link">News</a>
                                  </li>
                              </ul>
                          </div>

                          <div>
                              <h3 class="footer_title">
                                Company
                              </h3>

                              <ul class="footer_links">
                                  <li>
                                      <a href="#" class="footer_link">How we work?</a>
                                  </li>
                                  <li>
                                      <a href="#" class="footer_link">Capital</a>
                                  </li>
                                  <li>
                                      <a href="#" class="footer_link">Security</a>
                                  </li>
                              </ul>
                          </div>

                          <div>
                              <h3 class="footer_title">
                                Support
                              </h3>

                              <ul class="footer_links">
                                  <li>
                                      <a href="#" class="footer_link">FAQs</a>
                                  </li>
                                  <li>
                                      <a href="#" class="footer_link">Support center</a>
                                  </li>
                                  <li>
                                      <a href="#" class="footer_link">Contac us</a>
                                  </li>
                              </ul>
                          </div>

                          <div>
                              <h3 class="footer_title">
                                Follow us
                              </h3>

                              <ul class="footer_social">
                                  <a href="" target="_blank"class="footer_social-link">
                                  <i class="bx bxl-facebook-circle"></i>
                                  </a>
                                  <a href="" target="_blank"class="footer_social-link">
                                  <i class="bx bxl-instagram" ></i>
                                  </a>
                                  <a href="" target="_blank"class="footer_social-link">
                                  <i class="bx bxl-twitter" ></i>
                                  </a>
                              </ul>
                          </div>
                      </div>
                  </div>     
                  
                  <div class="footer_info container">
                      <span class="footer_copy">
                         &#169; Bedimcode. All rigths reserved 
                      </span>

                      <div class="footer_privacy">
                          <a href="">Terms & Agreements</a>
                          <a href="">Privacy Policy</a>
                      </div>
                  </div>
         </footer>  
        
        ');
	}
?>