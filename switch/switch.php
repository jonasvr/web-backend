<?php

    //deel 1
    $getal = rand(1, 7); //*

    switch ($getal) { //**
        case 1:
            $dag="maandag";
            break;
        case 2:
            $dag="dinsdag";
            break;
        case 3:
            $dag="woensdag";
            break;
        case 4:
            $dag="donderdag";
            break;
        case 5:
            $dag="vrijdag";
            break;
        case 6:
            $dag="zaterdag";
            break;
        case 7:
            $dag="zondag";
            break;
        default:
            $dag="fout getal";
            break;
    }

    //* random getal generenen: keuze uit 1 tot en met 7
    //** gaat opties af tot er 1 overeen komt en voor de juiste dag in. Fout? => default


    //deel 2
    $dag    =   strtoupper( $dag ); //*
    //$dag  =   str_replace( 'A', 'a' , $dag ); //**
    $laatsteA  =   strrpos( $dag, 'A' ); //***
    $dag  =   substr_replace( $dag, 'a', $laatsteA, 1 ); //****
    
    //* alles in drukletters zetten
    //** alle 'A' 's naar kleine 'a' 's zetten
    //*** bepalen laatste drukletter 'a' in de string
    //**** (string , vervanging , startpunt [, lengte ]
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht conditional statements: deel 1</h1>

            <ul>
                <li>Maak een HTML-document met een PHP code-block</li>
                <li>Maak een PHP-script dat aan de hand van een getal ( tussen 1 en 7 ) de bijhorende dag afprint in kleine letters (geen hoofdletters!)</li>
                <li>Bijvoorbeeld, wanneer <code>$getal</code> gelijk is aan 1 dan wordt de string <code>'maandag'</code> op het scherm getoond</li>
            </ul>  

    		<h1 class="extra">Opdracht conditional statements: deel 2</h1>

    		<ul>
                <li>Maak een kopie van deel 1</li>
    			<li>Zet de naam van de dag (bv <code>'maandag'</code>) doormiddel van een string-functie dan naar hoofdletters om (bv <code>'MAANDAG'</code>).</li>
                <li>Zet alle letters in hoofdletters, behalve de 'a'</li>
                <li>Zet alle letters in hoofdletters, behalve de laatste 'a'</li>
    		</ul>

        </section>

        <h1>Oplossing conditional statements: deel2</h1>

        <p>De dag die overeenkomt met het getal "<?php echo $getal ?>" is: <?php echo $dag ?></p>



    </body>
</html>