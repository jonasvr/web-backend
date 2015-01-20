<?php
$boodschap="Het getal ligt tussen ";
    $getal=rand(1,100); //*
    if ($getal <11)
        {
            $boodschap.= "0 en 10";
        }
    elseif ($getal<21) 
        {
            $boodschap.= "10 en 20";
        }
    elseif ($getal<31) 
        {
            $boodschap.= "20 en 30";
        }
    elseif ($getal<41) 
        {
            $boodschap.= "30 en 40";
        }
    elseif ($getal<51) 
        {
            $boodschap.= "40 en 50";
        }
    elseif ($getal<61) 
        {
            $boodschap.= "50 en 60";
        }
    elseif ($getal<71) 
        {
            $boodschap.= "60 en 70";
        }
    elseif ($getal<81) 
        {
            $boodschap.= "70 en 80";
        }
    elseif ($getal<91) 
        {
            $boodschap.= "80 en 90";
        }
    else
        {
            $boodschap.= "90 en 100";
        }

    $boodschap = strrev($boodschap);//**

    //* rand (min,max) => random getal vanaf het laagste (1) tot en met het hoogste (100) ingevoerde getal
    //** strrev(string) => draait inhoud string letterlijk om letter voor letter


        //kortere oplossing:
    $getal = rand(1,100);
    $onderste10Tal= floor($getal/10)*10; //**
    $boodschap = "Het getal " . $getal . " ligt tussen " . $onderste10Tal . " en " . ($onderste10Tal+10);
    $omgekeerd = strrev($boodschap); //***

    //* genereert random getal
    //** getal delen en de eenheid eruit halen.
    //*** strrev(string) => draait inhoud string letterlijk om letter voor letter
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else if</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else if: deel 1</h1>

            <ul>
                <li>Maak een getal met een waarde tussen 1-100</li>
                <li>Zorg ervoor dat het script kan zeggen tussen welke tientallen het getal ligt, bv 'Het getal ligt tussen 20 en 30'.</li>
                <li>Zorg er vervolgens voor dat de boodschap omgekeerd afgedrukt wordt, bv '03 ne 02 nessut tgil lateg teH'.</li>
            </ul>  
        
        </section>

        <h1>oplossing deel 1</h1>
        <p> <?php echo $boodschap; ?></p>
    </body>
</html>