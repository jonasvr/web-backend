<?php
    $erfenis =100000; //1000000*1,08^10
    
    function bank ($rekening)
    {
        static $teller = 0;
        static $message =array();

        $rekening *=1.08;
        $teller++;
        $message[]= "Hans heeft na ".$teller." jaar " .floor($rekening).",-  euro op zijn rekening <br />";
        if($teller!=10)
        {bank($rekening,$teller);}
        return $message;
    }
    $bedrag =bank($erfenis);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht recursive</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <style>
                img
                {
                    display:block;
                    padding:6px;
                    margin:24px auto;
                }
            </style>
        
            <h1>Opdracht recursive: deel 1</h1>

            <ul>
                <li>Een old school vraagstuk!</p>
                </li>

                <li>Hans heeft 100 000€ geërfd. Hij kan zijn geld aan de bank geven tegen een rentevoet van 8%. Als hij dat doet is hij wel verplicht om zijn geld 10 jaar op de bank te laten staan. Hans wil weten hoeveel geld hij na 10 jaar zal overhouden.</li>

                <li>Maak gebruik van een recursieve functie om te berekenen hoeveel geld Hans na 10 jaar zal overhouden</li>

                <li>Zorg er ook voor dat Hans kan ziet hoeveel zijn geld na elk jaar waard is. Rond daarbij alle getallen af naar beneden.</li>

                <li>
                    Als je je verbonden voelt met de onderstaande meme, vraag dan even wat uitleg om je op weg te helpen.
                    <img src="http://web-backend.local/img/opdracht-recursive-meme.png" alt="Math problems meme">   
                </li>

            </ul>

        </section>
        <h1>deel 1</h1>
        <pre> <?php print_r($bedrag);?></pre>
    </body>
</html>