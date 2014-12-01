<?php

$message='';

try // altijd tussen try => voorals db connectie niet werkt
    {
        $db = new PDO('mysql:host=localhost;dbname=bieren','root',''); //(database;usernamen;password)
        $query = 'SELECT * 
                        FROM bieren
                        INNER JOIN brouwers ON bieren.brouwernr = brouwers.brouwernr
                        WHERE bieren.naam LIKE  "Du%"
                        AND brouwers.brnaam LIKE  "%a%"';
                //query opstellen  
        $statement = $db->prepare($query); //uitvoeren
        $statement->execute();

        $bieren = array();

        while ( $row = $statement->fetch(PDO::FETCH_ASSOC)) //Geeft een associatieve array (tabelnaam => value)
            {
                $bieren[] = $row; 
            }
        $kolomNaam = array();
        $kolomNaam[] ='Biernr';

        foreach ($bieren[0] as $bier) // alle biernrs ophalen
            {
                $kolomNaam[]=$bier;
            }

    }
catch (PDOException $error)//voor als de connectie mislukt
{
    $message='de connectie is mislukt';
}
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD query</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">

        <style>
            /* 
            .voorbeeld-query-01 
            {

            }

            .voorbeeld-query-01 table
            {
                font-size:12px;
                overflow:auto;
            }

            .voorbeeld-query-01 table th,
            .voorbeeld-query-01 table td
            {
                padding:4px;
            }

            .voorbeeld-query-01 table th
            {
                background: #DFDFDF;
                text-align:center;
            }

            .voorbeeld-query-01 table tr
            {
                transition: all 0.2s ease-out;
            }

            .voorbeeld-query-01 table tr:hover
            {
                background-color:lightgreen;
            }

            .voorbeeld-query-01 .odd
            {
                background: #F1F1F1;
  
            }*/
        </style>
        
        <style>
            .even
            {
                background-color:lightgrey;
            }
        </style>

        <section class="body">
            
            <h1>Opdracht CRUD query: deel 1</h1>

                <h2> <?= $message?> </h2>
                
           <table>
        
            <thead>
                    <tr>
                        <?php foreach ($kolomNaam as $koloms): //alle rijen afgaan, kolomNaam & nrs?> 
                            <th><?= $koloms ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>

                <tbody>
                
                    <?php foreach ($bieren as $key => $bier): //alle bieren in de lijst afgaan?> 
                        <tr class="<?= ( ( $key + 1) %2 == 0 ) ? 'even' : '' ?>">
                            <th><?= ($key + 1) ?></th>
                            <?php foreach ($bier as $value): //elk bier is een array met info?> 
                                <td><?= $value ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>

            </table>
            
        </section>  

    </body>
</html>
