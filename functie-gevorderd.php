<?php
        $md5HashKey="d1fa402db91a7a93c4f414b8278ce073";
        function functie1 ($el)
        {
            global $md5HashKey;
            $percent= substr_count($md5HashKey, $el) /strlen($md5HashKey)*100; //substr_count telt aantal keer het opgeven stukje string in grotere string voorkomt
            return "de needle " . $el . " komt ".$percent." % voor in de hash key";
        }
        function functie2 ($el,$msHas)
        {
            
            $percent= substr_count($msHas, $el)/strlen($msHas)*100; //substr_count telt aantal keer het opgeven stukje string in grotere string voorkomt
            return "de needle " . $el . " komt ".$percent." % voor in de hash key";
        }
        function functie3 ($el)
        {
            
            $percent= substr_count($GLOBALS['md5HashKey'], $el)/strlen($GLOBALS['md5HashKey'])*100;
            return "de needle " . $el . " komt ".$percent." % voor in de hash key";   
            
        }
$functie1=functie1("2");
$functie2=functie2("8", $md5HashKey);
$functie3=functie3("a");

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies gevorderd</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht functies gevorderd: deel 1</h1>

            <ul>
                <li>Maak een global variable <code>$md5HashKey</code> met als value <code>'d1fa402db91a7a93c4f414b8278ce073'</code></li>

                <li>Maak drie verschillende functies die de global variable <code>$md5HashKey</code> telkens op een andere manier aanspreken. </li>

                <li>Het doel van deze functie is altijd hetzelfde: tellen hoeveel procent een bepaalde parameter voorkomt in <code>$md5HashKey</code>.</li>

                <li>Spreek elke functie één keer aan, telkens met een ander argument:
                    <ul>
                        <li>Argument Functie 1: <code>'2'</code></li>
                        <li>Argument Functie 2: <code>'8'</code></li>
                        <li>Argument Functie 3: <code>'a'</code></li>
                    </ul>
                </li>

                <li>
                    Zorg ervoor dat het volgende wordt weergegeven: 

                    <div class="facade-minimal" data-url="http://www.app.local/index.php">
                        <p>Functie 1: De needle '2' komt 2 keer voor in de hash key 'd1fa402db91a7a93c4f414b8278ce073'</p>
                        <p>Functie 2: De needle '8' komt 1 keer voor in de hash key 'd1fa402db91a7a93c4f414b8278ce073'</p>
                        <p>Functie 3: De needle 'a' komt 3 keer voor in de hash key 'd1fa402db91a7a93c4f414b8278ce073'</p>
                    </div>
                </li>

            </ul>

            <h1 class="extra">Opdracht functies gevorderd: deel 2 (Angry Birds)</h1>

            <ul>
               
                <li>De bedoeling is om een versimpelde tekstversie van Angry Birds te maken (<a href="http://chrome.angrybirds.com/" target="_blank">http://chrome.angrybirds.com/</a>)</li>

                <li>Maak een global variable <code>$pigHealth</code> met value <code>5</code> en een global variable <code>$maximumThrows</code> met value <code>8</code></li>

                <li>Maak een functie <code>calculateHit</code>. Deze functie staat in voor:
                    <ul>
                        <li>Het berekenen van de raakkans (40%). Gebruik hiervoor de functie <code>rand</code>.

                        <li>Het verminderen van de <code>$pigHealth</code> variable met één van zodra er raak is geschoten.

                        <li>Het teruggeven van de string <code>'Raak! Er zijn nog maar xxx varkens over.'</code> of <code>'Mis! Nog xxx varkens in het team.'</code> naargelang het resultaat van het willekeurige getal. De xxx moet vervangen worden door het effectieve getal.
                    </li>
                </li>

                <li>Maak een functie <code>launchAngryBird</code>. Deze functie staat in voor:
                    <ul>
                        <li>Deze functie bevat een static variable om bij te houden hoeveel keer de functie reeds is aangeroepen.

                        <li>Zolang deze static variable kleiner is dan het aantal <code>$maximumThrows</code> wordt de static variable met één vermeerderd en spreekt de functie <code>launchAngryBird</code> zichzelf weer aan.

                        <li>Van zodra de static variabele gelijk is de <code>$maximumThrows</code> wordt er gekeken of het <code>$pigHealth</code> gelijk is aan nul. Als dit het geval is moet de boodschap <code>'Gewonnen!'</code> verschijnen. Is de variable pigHealth groter dan nul verschijnt de boodschap <code>'Verloren!'</code>
                        </li>
                    </ul>
                </li>


                <li>Je mag de functie <code>launchAngryBird</code> maximum één keer aanroepen in het document.</li>

                <li>
                    Het eindresultaat moet er ongeveer als volgt uitzien:

                    <div class="facade-minimal" data-url="http://www.app.local/index.php">

                        <h1>Text-based Angry Birds</h1>
                    
                        <p>Raak! Er zijn nog maar 4 varkens over.</p>
                       
                        <p>Raak! Er zijn nog maar 3 varkens over.</p>
                       
                        <p>Mis! Er zijn nog 3 varkens over.</p>
                       
                        <p>Mis! Er zijn nog 3 varkens over.</p>
                       
                        <p>Mis! Er zijn nog 3 varkens over.</p>

                        <p>Raak! Er zijn nog maar 1 varkens over.</p>

                        <p>Raak! Er zijn nog maar 0 varkens over.</p>

                        <p>Gewonnen!</p>

                    </div>
                </li>

                <li class="extension">Zorg ervoor dat de tekst grammatisch correct is wanneer <code>$pigHealth</code> gelijk is aan 1</li>

                <li class="extension">Zorg ervoor dat de functie automatisch stopt wanneer <code>$pigHealth</code> gelijk is aan 0</li>

            </ul>
        </section>
        <h1>deel 1</h1>
            <p>functie 1: <?php echo $functie1;?></p>
            <p>functie 2: <?php echo $functie2;?></p>
            <p>functie 3: <?php echo $functie3;?></p>
    </body>
</html>