
<?php
session_start();
include_once 'default_elements.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS -->
        <link rel= "stylesheet" href="styles.css">
        <link rel= "stylesheet" href="styles_post.css">
        <link rel= "stylesheet" href="styles_search.css">

        <!-- ICONE -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

        <script src="pref.js" defer></script>


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
            Le tue preferenze
        </h1>

        <div class="search_container section" id="search_container">

            

        </div>

    </section>

    <?php
			default_footer();
			?>
    </body>
    
    
</html>