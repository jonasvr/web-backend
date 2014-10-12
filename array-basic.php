<?php
    //manier 1
    $array1  = array("koe","giraf", "vis", "aap", "hond", "kat", "muis", "spin", "slang", "rat", "kip" );
    
    //manier 2
    /*$array2 =array();
    $array2[]="koe";
    $array[]="giraf";
    //... enz */

    //=> zelfde resultaat
    $array2 = array();
    foreach ($array1 as $dier) {
        $array2[] = $dier; 
        //dit wordt 10 keer herhaald heeft hetzelfde effect als dat ik het 10 keer schreef met een ander dier
    }

    $array3 =array(
        'Landvoertuig' => array("auto","bus","motor"),
        'Watervoertuig' => array("boot","yetski","watertrapper"),
        'Luchtvoertuig' => array("vliegtuig","zeplin","deltavlieger")
        );


    $getallen = array(1,2,3,4,5);
    $vermenigvuldiging= $getallen[0]*$getallen[1]*$getallen[2]*$getallen[3]*$getallen[4];

    $oneven = array();
    foreach ($getallen as $getal) {
        if ($getal%2!=0) 
        {
            $oneven[]=$getal;
        }
    }
    $getallen2 = array_reverse($getallen);
    $optellen= array();
    for ($i=0;$i<=4;$i++)
    {
        $optellen[]=$getallen[$i]+$getallen2[$i];
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht arrays basis: deel 1</h1>

            <ul>

                <li>Maak een array waarin je 10 dieren opslaat( doe dit op 2 verschillende manieren )</li>

                <li>Maak een nieuwe array met daarin 5 voertuigen, zorg er voor dat je kan bepalen om welke categorie van voertuig het gaat ( 2-dimensionele array), zoals 'landvoertuigen', 'watervoertuigen', 'luchtvoertuigen'. 
                <p>Wanneer je een <code>var_dump</code> van deze array doet, ziet het resultaat er ongeveer als volgt uit:</p>
                    
                    <ul class="array-notation pre">
                        <li>
                            [ 'landvoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'Vespa'</li>
                                <li>[ 1 ] => 'fiets'</li>
                            </ul>
                        </li>
                        <li>
                            [ 'watervoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'surfplank'</li>
                                <li>[ 1 ] => 'vlot'</li>
                                <li>[ 2 ] => 'schoener'</li>
                                <li>[ 3 ] => 'driemaster'</li>
                            </ul>
                        </li>
                        <li>
                            [ 'luchtvoertuigen' ] => 
                            <ul>
                                <li>[ 0 ] => 'luchtballon'</li>
                                <li>[ 1 ] => 'helicopter'</li>
                                <li>[ 2 ] => 'B52'</li>
                            </ul>
                        </li>
                    </ul>

                </li>

            </ul> 

            <h1 class="extra">Opdracht arrays basis: deel 2</h1>

            <ul>
                <li>Maak een array waarin je de getallen 1, 2, 3, 4, 5 in plaatst</li>

                <li>Vermenigvuldig alle getallen met elkaar en druk af naar het scherm</li>

                <li>Druk de oneven getallen af (controle in script, niet zelf selecteren welke je afdrukt)</li>

                <li>Maak een tweede array waarin je de getallen 5, 4, 3, 2, 1 in plaatst</li>

                <li>Tel de getallen uit beide arrays met dezelfde index met elkaar op</li>
            </ul>
        
        </section>


        <h1> oplossingen deel 1 </h1>

        <pre> <?php print_r($array1);?></pre>
        <pre> <?php print_r($array2);?></pre>
        <pre> <?php print_r($array3);?></pre>

        <h1>oplossingen deel 2</h1>
        <p><?php echo $vermenigvuldiging;?></p>
        <pre> <?php print_r($oneven);?></pre>
        <pre> <?php print_r($optellen);?></pre>

    </body>
</html>