<?php
    $jaartal = 1996;
    $schrikkeljaar = false;

    if ( ($jaartal % 4) == 0 && ($jaartal%100)!=0 && ($jaartal%400)==0) //*
       {
        $schrikkeljaar = true;
    }

    //* '&&'' eist dat aan alle voorwaarden voldaan zijn
    //* delen met '%'' geeft als restulaat de rest van de deling
    

    //oefening 2
    $seconden=221108521;
    $minuten=floor($seconden/60);
    $uren=floor($minuten/60);
    $dagen=floor($uren/24);
    $weken=floor($dagen/7);
    $maanden=floor($dagen/31);
    $jaren=floor($dagen/365);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else: deel 1</h1>

            <ul>
                <li>Maak een PHP-script dat kan bepalen of de variabele 'jaartal' al dan niet een schrikkeljaar is
                    <ul>
                        <li>Een jaar is een schrikkeljaar als het deelbaar is door 4</li>
                        <li>Een jaartal deelbaar door 100 is geen schrikkeljaar</li>
                        <li>Een jaartal deelbaar door 400 is wel een schrikkeljaar</li>
                    </ul>
                </li>
            </ul>  

    		<h1 class="extra">Opdracht if else: deel 2</h1>

    		<ul>
                <li>Maak een PHP-script dat achterhaalt hoeveel volledige jaren, maanden, weken, dagen, uren, minuten en seconden er in een gegeven aantal seconden zit (bv. 221108521)</li>

                <li>
                    Ga er van uit dat een maand 31 dagen kent en een jaar 365 dagen. Het resultaat ziet er ongeveer als volgt uit:
                    
                    <div class="facade-minimal" data-url="http://www.app.local/index.php">
                        
                        <h1>Jaren, maanden, weken, dagen, uren, minuten en seconden</h1>

                        <p>in 221108521 seconden</p>

                        <ul>
                            <li>minuten: 3685142</li>
                            <li>uren: 61419</li>
                            <li>dagen: 2559</li>
                            <li>weken: 365</li>
                            <li>maanden (31): 82</li>
                            <li>jaren (365): 7</li>
                        </ul>
                    </div>

                </li>
    		</ul>

        </section>

        <h1>Oplossing if else: deel 1</h1>

        <p>Het jaar "<?php echo $jaartal ?>" is <?php echo ( $isSchrikkeljaar ) ? "een" : "geen"  ?> schrikkeljaar </p>

        <h1>Oplossing if else: deel 2</h1>

        <p>aantal minuten: <?php echo $minuten ; ?></p>
        <p>aantal uur: <?php echo $uren; ?></p>
        <p>aantal dagen: <?php echo $dagen; ?></p>
        <p>aantal weken: <?php echo $weken; ?></p>
        <p>aantal maanden: <?php echo $maanden; ?></p>
        <p>aantal jaren: <?php echo $jaren; ?></p>
    </body>
</html>