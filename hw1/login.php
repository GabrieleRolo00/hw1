<?php session_start(); ?>
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel= "stylesheet" href="styles_login.css">

    <!-- ICONE -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src= "login_script.js" defer></script>

    <title>Login</title>  
    
 

    </head>
    <body> 
        
    

        <div class="container">
            <div class="forms">
                    <div class="form login">
                        <span class="title">Login</span>

                        <form action="elabora_login.php" method="post" id="formLogin">
                            <div class="input-field dati">
                                <input type="text" name="email" class="input" id="emailLogin" value= "<?php if(isset($_COOKIE["user_login"])) echo $_COOKIE["user_login"] ?>"placeholder = "Enter your email" required>
                                <i class='bx bx-envelope icon'></i>
                            </div>

                            <p class="textErr" id="textErrEmail"></p>

                            <div class="input-field dati">
                                <input type="password" name="password" class="password input" value= "<?php if(isset($_COOKIE["user_pass"])) echo $_COOKIE["user_pass"] ?>" placeholder = "Enter your password" required>
                                <i class='bx bx-lock-alt icon' ></i>
                                <i class='bx bx-low-vision showHidePw' ></i>
                            </div>

                            <p class="textErr" id="textErrPass"><?php

                                                                    if(isset($_SESSION['errLog'])){
                                                                        if($_SESSION['errLog']){
                                                                            echo "Wrong email or password";
                                                                            $_SESSION['errLog']= false;
                                                                        }
                                                                    }
                                                                        
                                                                        
                                                                    ?></p>

                            <div class="checkbox-text">
                                <div class="checkbox-content" >
                                    <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user_login"])){ ?> checked <?php } ?> id="logCheck">
                                    <label for="logCheck" class="text">Remember me</label>
                                </div>

                                
                            </div>

                            <div class="input-field button">
                                <input type="submit" value="Login Now" id="btnLogin">
                            </div>

                            <div class="login-signup">
                                <span class="text">Not a member?
                                    <a href="#" class="text signup-link">Signup now</a>
                                </span>
                            </div>
                        </form>
                    </div>

            <!-- Registration-->

                <div class="form signup">
                        <span class="title">Registration</span>

                        <form action="elabora_reg.php" method='POST' id="formReg">

                            <div class="input-field">
                                <input type="text" name="nome" class="input" id="nome" placeholder = "Enter your name" required>
                                <i class='bx bx-user icon' ></i>
                            </div>

                            <p class="textErr" id="textErrNome"></p>

                            <div class="input-field">
                                <input type="text" name="email" class="input" id="emailReg" placeholder = "Enter your email" required>
                                
                                <i class='bx bx-envelope icon'></i>
                            </div>
                            <p class="textErr" id="textErrEmail"></p>

                            <div class="input-field">
                                <input type="password" class="password input" placeholder = "Create a password" required>
                                <i class='bx bx-lock-alt icon' ></i>
                            </div>

                            <div class="input-field">
                                <input type="password" class="password input" name="password" placeholder = "Confirm your password" required>
                                <i class='bx bx-lock-alt icon' ></i>
                                <i class='bx bx-low-vision showHidePw' ></i>
                            </div>

                            <p class="textErr" id="textErrPass"></p>

                            <div class="input-field button">
                                <input type="submit" value="Register Now" id="btnReg">
                            </div>

                            <div class="login-signup">
                                <span class="text">Are you a member?
                                    <a href="#" class="text login-link">Login now</a>
                                </span>
                            </div>
                        </form>
                    </div>
            </div>
        </div>

        
    </body>
</html>