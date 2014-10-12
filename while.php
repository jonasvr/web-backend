<?php
    //deel 1
        $telling=array();
        $voldaanGetal=array();
        $i=0;
        while($i<=100)
        {
            $telling[]= $i;
            if ($i>40 && $i<80 && ($i%3)==0 )
                {$voldaanGetal[]= $i;}
            $i++;
        }
    //deel 2
        $inline="";
        $r=1;
        $c=1;
            while($r<=10) //rij
            {
            $inline.= "<tr>" ;

                while($c<=10) //kolom
                {
                    
                    $tafel=$r*$c;
                    if (($tafel%2)==0)
                    {
                    $inline.=" <td class='achtergrond'> ".$tafel."</td>";
                    }else{
                    $inline.="<td>".$tafel."</td>";
                    }
                    $c++;
                }
                $inline.="</tr>";
                $r++;
                $c=1;

            }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht while</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
        <link rel="stylesheet" type="text/css" href="oefeningen.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">  
        
        <h1>Opdracht while: deel 1</h1>

        <ul>

            <li>Druk alle getallen af van 0 tot 100 afgescheiden door een komma en 
            een spatie ' , '.</li>

            <li>Op een volgende lijn druk je alle getallen af die deelbaar zijn door 3 én groter zijn dan 40 mààr kleiner zijn dan 80.</li>

        </ul>

        <h1>Opdracht while: deel 2</h1>

        <ul>

            <li>Maak een tabel met daarin de tafels van 1 tot 10 naast elkaar.

                <div class="facade-minimal" data-url="http://www.app.local/index.php">
                    
                    <h1>Tafels</h1>

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

            <li>Zorg er nu voor dat de cellen met even getallen een groene achtergrond krijgen, maak hiervoor gebruik van een css klasse en geen inline styles. <span class="tip">Werk met een shorthand if-statement</span></li>
        </ul> 

    <h1>deel 1</h1>
        <?php echo implode(', ', $telling); ?>
        <br />
        <p>deelbaar door 3, groter dan 40, kleiner dan 80</p>
        <?php echo implode(', ', $voldaanGetal); ?>
    <h1>deel 2</h1>
    <table border="1">

        
        <?php echo $inline; ?>
    </table>
    </body>
</html>