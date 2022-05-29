<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel= "stylesheet" href="styles_login.css">
    <link rel= "stylesheet" href="styles_create.css">
    <!-- ICONE -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="crea_annuncio.js" defer></script>


    <title>Crea annuncio</title>


</head>
<body>
    
<div class="container">
            
            <!-- Create -->
                <div class="form">
                        <span class="title">Crea annuncio</span>

                        <form action="elabora_annuncio.php" method='get' id="formCreate">

                            <div class="input-field">
                                <input type="text" name="nome" class="input" id="nome" placeholder = "Enter house name" required>
                                <i class='bx bx-home-alt-2 icon'></i>
                            </div>


                            <div class="input-field">
                                <input type="text" name="prezzo" class="input" id="prezzo" placeholder = "Enter price" required>
                                <i class='bx bx-euro icon' ></i>
                            </div>

                
                            <div class="input-field">
                                <input type="text" name="citta" class="input" id="citta" placeholder = "Enter city" required>
                                <i class='bx bxs-city icon' ></i>
                            </div>

                            
                            <div class="input-field">
                                <input type="text" name="indirizzo" class="input" id="indirizzo" placeholder = "Enter address" required>
                                <i class='bx bxs-map icon' ></i>
                            </div>

                            <div class="input-field input-img">
                                <input type="text" placeholder = "Enter img (add .jpg or .png)" class="input" name="img" required>
                                <i class='bx bx-image icon' ></i>
                            </div>

                            
                            <div class="input-field textArea">
                                <textarea  maxlength= "500" rows="3" cols="54" name="descrizione" class="input" id="descrizione" placeholder = "Enter description" required></textarea>  
                            </div>

                            <p class="textErr" id="textErr"></p>

                            <div class="input-field button">
                                <input type="submit" value="Create Now" id="btnCreate">
                            </div>

                            <div class="login-signup">
                                <span>
                                    <a href="index.php" class="text login-link">Back to home</a>
                                </span>
                            </div>
                        </form>
                    </div>
            
        </div>

</body>
</html>