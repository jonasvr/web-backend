<?php
        $telling=array();
        $voldaanGetal=array();
            for($i=0;$i<=100;$i++)
            {
                $telling[]= $i;
                if ($i>40 && $i<80 && ($i%3)==0 )
                    {$voldaanGetal[]= $i;}
            }
        
        $inline="";
            for($row=1;$row<=10;$row++) //rij
            {
                $inline.= "<tr>" ;

                for($collom=1;$collom<=10;$collom++) //kolom
                {
                    $tafel=$row*$collom;
                    if (($tafel%2)==0)
                    {
                    $inline.=" <td class='achtergrond'> ".$tafel."</td>";
                    }else{
                    $inline.="<td>".$tafel."</td>";
                    }
                }
                    $inline.="</tr>";

            }


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht for</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <link rel="stylesheet" type="text/css" href="oefeningen.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1>Opdracht for: deel 1</h1>

            <ul>

                <li>Maak het eerste deel van de opdracht voor de while lust met behulp van de for-lus:
                    <ul>
                        <li>Druk alle getallen af van 0 tot 100 afgescheiden door een komma en 
                        een spatie <code>' ,'</code>.</li>

                        <li>Op een volgende lijn druk je alle getallen af die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80.</li>
                    </ul>
                </li>

            </ul> 
            
            <h1>Opdracht for: deel 2</h1>

            <ul>

                <li>Maak een HTML-document met een PHP code-block</li>

                <li>Maak het tweede deel van de while opdracht met behulp van de for-lus:
                    <ul>

                        <li>Maak een HTML-document met een PHP code-block</li> 

                        <li>Maak een tabel met daarin de tafels van 1 tot 10 naast elkaar.
                        
                            <div class="facade-minimal" data-url="http://www.app.local/index.php">
                                
                                <table>
                                    <tr>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>7</td>
                                        <td>8</td>
                                        <td>9</td>
                                        <td>10</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>4</td>
                                        <td>6</td>
                                        <td>8</td>
                                        <td>10</td>
                                        <td>12</td>
                                        <td>14</td>
                                        <td>16</td>
                                        <td>18</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>6</td>
                                        <td>9</td>
                                        <td>12</td>
                                        <td>15</td>
                                        <td>18</td>
                                        <td>21</td>
                                        <td>24</td>
                                        <td>27</td>
                                        <td>30</td>
                                    </tr>
                                </table>
                            </div>
                            
                        </li>

                        <li>
                            Zorg er nu voor dat de cellen met even getallen een groene achtergrond krijgen, maak hiervoor gebruik van een css klasse en geen inline styles. 
                            <span class="tip">Werk met een shorthand if-statement</span>
                        </li>
                    </ul> 
                </li>

            </ul> 

        </section>
    <h1>deel 1</h1>
        <?php echo implode(', ', $telling); ?>
        <br />
        <p>deelbaar door 3, groter dan 40, kleiner dan 80</p>
        <?php echo implode(', ', $voldaanGetal); ?>
    <h1>deel 2</h1>
    <table border="1">
        
        <?php for($row=1;$row<=10;$row++): //rij ?>
            <tr>
                <?php for($collom=1;$collom<=10;$collom++): //kolom?>
                <td class="<?= ( ( $row*$collom%2)==0)? 'achtergrond' : '' ?>"><?= $row*$collom; ?> </td>
                <?php endfor ?>
            </tr>
        <?php endfor ?>
    </table>
    </body>
</html>