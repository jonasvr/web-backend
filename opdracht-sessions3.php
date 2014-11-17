<?php

    $email=$_SESSION['email'];
    $nn=$_SESSION['nickname'];
    $straat=$_SESSION['straat'];
    $nummer=$_SESSION['nummer'];
    $gemeente=$_SESSION['gemeente'];
    $postcode=$_SESSION['postcode'];
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">

     <h1>Registratiegegevens</h1>

    <ul>
        <li>e-mail: <?=$email;?> <a href="opdracht-sessions.php?link=wijzig" value="wijzig"> wijzig info</a></li>
        <li>nickname: <?=$nn;?> <a href="opdracht-sessions.php?link=wijzig" value="wijzig"> wijzig info</a></li>
        <li>straat: <?=$straat;?> <a href="opdracht-sessions2.php?link=wijzig" value="wijzig"> wijzig info</a></li>
        <li>nummer: <?=$nummer;?> <a href="opdracht-sessions2.php?link=wijzig" value="wijzig"> wijzig info</a></li>
        <li>gemeente: <?=$gemeente;?> <a href="opdracht-sessions2.php?link=wijzig" value="wijzig"> wijzig info</a></li>
        <li>postcode: <?=$postcode;?> <a href="opdracht-sessions2.php?link=wijzig" value="wijzig"> wijzig info</a></li>
    </ul>   
    
 </body>
</html>