<?php
    $timestamp  =   mktime( 22, 35, 25, 01, 21, 1904 );

    setlocale( LC_ALL, 'nld_nld' );
    $date   =   strftime( '%d %B %Y, %H:%M:%S %p', $timestamp );
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht date</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Opdracht date: deel 1</h1>

            <ul>
                <li>Maak een geldig HTML document</li> 

                <li>Zet deze datum 22u 35m 25sec 21 januari 1904 om naar een timestamp</li>

                <li>Toon deze timestamp daarna in het volgende formaat: 21 January 1904, 10:35:25 pm</li>
            </ul>

            <h1>Opdracht date: deel 2</h1>

            <ul>
                <li>Zorg dat de benamingen in het Nederlands komen te staan</li>
            </ul>
        </section>
        <h1>deel 1</h1>
        <p><?=$timestamp?></p>
        <h2>deel 2</h2>
        <p><?=$date?></p>
    </body>
</html>


