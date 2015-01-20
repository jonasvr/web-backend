<?php
    $imgPath="img/";
    $artikels=array(
        //artikel 1
        array ('titel' => 'Rijbewijs met punten: twee zware overtredingen = drie maanden rijverbod',
                'datum' => '7/10/14',
                'inhoud' => 'Bijna 25 jaar na de eerste ­plannen ligt er een wetsvoorstel op tafel voor het rijbewijs met punten. Wie 8 strafpunten verzamelt, door bijvoorbeeld tweemaal in te halen in een bocht, zou zijn rijbewijs 3 maanden kwijtspelen. Dat blijkt uit het wetsvoorstel dat de krant De Morgen kon inkijken.',
                'afbeelding' => 'rijbewijs.jpg',
                'afbeeldingBeschrijving' => 'rijden met gsm',
                ),
        //artikel 2
        array ('titel' => 'Rara: waar begint het Belgisch wegdek?',
                'datum' => '7/10/14',
                'inhoud' => 'Op Twitter was de staat van het Belgische wegdek gisteren kop van Jut nadat een inspecteur van de Nederlandse wegpolitie een veelzeggende foto op het sociale netwerk had geplaatst. Daarop is te zien hoe het wegdek langs de A12 er erbarmelijk bijligt in België maar plots verandert in een mooi laagje asfalt wanneer de bestuurders de Nederlandse grens oversteken net voor Zandvliet.',
                'afbeelding' => 'wegdek.jpg',
                'afbeeldingBeschrijving' => 'verschil tussen Belgische en Nederlandse wegdek',
                ),
        //artikel 3
        array ('titel' => 'Pensioenleeftijd stijgt naar 67',
                'datum' => '7/10/14',
                'inhoud' => ' De federale regeringsonderhandelaars, die al sinds gisterenmiddag samenzitten, hebben een akkoord bereikt over een verhoging van de pensioenleeftijd. Die zou stijgen naar 67 jaar, zo weten De Tijd en de VRT.
                            Het akkoord omvat dat de wettelijke pensioenleeftijd vanaf 2025 naar 66 en vanaf 2030 naar 67 stijgt. Vervroegd pensioen zou pas mogelijk zijn vanaf 63. Overgangsmaatregelen moeten de stijging compenseren. Wie 58 jaar is in 2016 kan twee jaar later op zijn 60ste met pensioen, wie 59 is een jaar later. 

                            Ook voor het pensioen van politie-agenten zou een akkoord gevonden zijn. Die hielden de afgelopen weken nog verschillende acties en betogingen tegen het arrest van het Grondwettelijk Hof waardoor zijn ineens pas veel later op pensioen zouden kunnen gaan.',
                'afbeelding' => 'regering.jpg',
                'afbeeldingBeschrijving' => 'kantoorsafbeelding',
                ),
        );
$gekozen=false;
$falseID=false;
$title="De krant van vandaag";
if (isset($_GET['id']))
    {
        $id=$_GET['id'];
        if ( array_key_exists( $id , $artikels ) ) //checken of artikel id gevonden is
            {
                $title=$artikels[$id]['titel'];
                $artikels = array( $artikels[$id] );
                $gekozen=true;
            }
        else
            {
                $falseID=true;
                $title="artikel bestaat niet!";
            }
    }    
if (isset($_GET['submit']) && $_GET['zoekwoord']!='')
    {   
        $falseID=false;
        $gevonden=false;
        $zoekwoord = $_GET['zoekwoord'];
        $resultaten=array();              
        foreach ($artikels as $id => $artikel) //elk artikel apart checken
            {
                $gevondenInArtikel =false; // reset voor nieuw artikel
                foreach ($artikel as $onderdeel) { // titel, inhoud,... apart nakijken
                    if (strpos($onderdeel,$zoekwoord)!=false)//kijken de zoekterm in het onderdeel zit
                    {
                        $gevondenInArtikel=true;//gevonden in artikel
                    }
                }
                if($gevondenInArtikel)//artikel nu pas in de lijst zetten;  in foreach zouden we meerder x hetzelfde erin zetten
                {
                    $resultaten[]=$artikel;
                }
            }
           // print_r($resultaten);
        $artikels=$resultaten;
        //print_r($resultaten);
        if(!$gevonden)
            {
                $title="De zoekterm '".$zoekwoord."' komt niet voor in onze krant";
            }
    }


?>
<!doctype html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <style>
            .multiple
            {
                float:left;
                width:288px;
                margin:16px;
                padding:16px;
                box-sizing:border-box;
                background-color:#EEEEEE;
            }

            .multiple:nth-child(3n+1)
            {
                margin-left:0px;
            }

            .multiple:nth-child(3n)
            {
                margin-right:0px;
            }

            .single img
            {
                float:right;
                margin-left: 16px;
                height: 50%;
                width: 50%;
                
            }
            
            .multiple h1
            {
                margin:0;
                font-size:18px;
            }

            .read-more
            {
                text-align:right;
            }

            .read-more:after
            {
                padding-left:6px;
                content:">";
            }
            img{
                width: 150px;
                height: 150px;
            }
            <?php include('../style.php'); ?>
        </style>
    </head>
    <body>
        <h1>opdracht artikels</h1>
        <?php if (!$falseID): ?>
            <?php foreach ( $artikels as $id => $artikel ):?>
                <article class="<?php echo ($gekozen) ? 'single':'multiple' ; ?>">
                  <h1> <?php echo $artikel['titel']; ?></h1>
                    <p><?php echo $artikel['datum']; ?></p>
                    <img src=<?php echo $imgPath.$artikel['afbeelding']; ?> alt=<?php echo $artikel['afbeeldingBeschrijving']; ?>>
                    <?php if (!$gekozen): ?>
                        <p><?php echo substr($artikel['inhoud'], 0,50).'...'; ?></p>
                        <p class="read-more"><a href="artikel.php?id=<?php echo $id; ?>">Lees meer</a></p>
                    <?php else: ?>
                        <p><?php echo $artikel['inhoud']; ?></p>
                    <?php endif ?>
                </article>
            <?php endforeach ?>
        <?php else: ?>
            <h1><?php echo $title; ?></h1>
        <?php endif ?>

        <form action="artikel.php" method="get">
          zoekwoord: <input type="text" name="zoekwoord"><br>
        <input type="submit" value="Submit" name="submit">
</form>
    </body>
</html>