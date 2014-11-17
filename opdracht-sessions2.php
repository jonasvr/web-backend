<?php
    session_start ();
    if(isset($_POST['submit']))
    {
        
        $_SESSION['straat'] = $_POST['straat'];
        $_SESSION['nummer'] = $_POST['nummer'];
        $_SESSION['gemeente'] = $_POST['gemeente'];
        $_SESSION['postcode'] = $_POST['postcode'];
        
        //header("Location: opdracht-sessions3.php");
    }elseif(isset($_GET['link']))
    {
        //session_unset();
        header("Location: opdracht-sessions.php?link=vernietig");
    }
    else{
        $email=$_SESSION['email'];
        $nn=$_SESSION['nickname'];
    }
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
                                <li>e-mail: <?=$email;?></li>
                                <li>nickname: <?=$nn;?></li>
                            </ul>   
     <h1>Deel 2: adres</h1>
            <form action="#" method="post">
                <ul>
                    <li>
                        <label for="straat">straat</label>
                        <input type="text" id="straat">
                    </li>
                    <li>
                        <label for="nummer">nummer</label>
                        <input type="number" id="nummer">
                    </li>
                    <li>
                        <label for="gemeente">gemeente</label>
                        <input type="text" id="gemeente">
                    </li>
                    <li>
                        <label for="postcode">postcode</label>
                        <input type="text" id="postcode">
                    </li>
                </ul>
                <input type="submit" name="submit" value="Volgende">
            </form>
            <a href="opdracht-sessions2.php?link=vernietig" value="vernietig"> vernietig info</a>
        </div>
 </body>
</html>