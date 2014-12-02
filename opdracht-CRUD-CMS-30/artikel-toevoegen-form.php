<?php
session_start();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security: login</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
    <?php include('header.php'); ?>
    <a href="artikel-overzicht.php">Terug naar overzicht.</a>
    <h1>Artikel toevoegen</h1>
    <form action="artikel-toevoegen-process.php" method="post">                     
        <ul>
            <li>
                <label for="titel">Titel</label>
                <input type="text" id="titel" name="titel">
            </li>

            <li>
                <label for="artikel">Artikel</label>
                <textarea id="artikel" name="artikel"></textarea>
            </li>

            <li>
                <label for="kernwoorden">Kernwoorden</label>
                <input type="text" id="kernwoorden" name="kernwoorden">
            </li>

            <li>
                <label for="datum">Datum (dd-mm-jjjj)</label>
                <input type="text" id="datum" name="datum">
            </li>

            <input type="submit" value="Artikel toevoegen">
        </ul>
    </form>

    <?php if(isset($_SESSION['notification'])): echo $_SESSION['notification'] ?>   
    <?php endif ?> 

    </body>
</html>
