<?php
    $data = file_get_contents('pass.txt'); // data uit doc halen
    $data = explode(',', $data); // in array vormen
    $dashboard = false; //dashboard laden of niet?
    //var_dump($data);
    //var_dump($_POST);
    if (isset($_GET['uitloggen']))
    {
        //echo "uitloggen"; // debug 
        //unset($_COOKIE['timer']);
        setcookie("timer",'', time()-360);

    }elseif(isset($_COOKIE['timer'])){
        //echo "set cookie";// debug 
        $dashboard=true;
    }
    if (isset($_POST['submit']))
    {
        //echo "submit"; // debug 
        if($_POST['username']==$data[0] && $_POST['password']==$data[1]) //checken of invoer overeenkomt met 'database'
        {
            setcookie("timer",true, time()+360);  // expire op 6 min
            $dashboard=true;// dashboard mag laden

        }else{
            $message="Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
        }
    }
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht cookies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
    <?php if(!$dashboard): ?>
    <section class="body">
        <h1>Opdracht cookies: deel 1</h1>

        <ul>
            <li>
                Maak een inlogformulier volgens de regels van de kunst. Het resultaat moet er als volgt uitzien:

                <div class="facade-minimal" data-url="http://www.app.local/opdracht-cookies-login.php">
                        
                    <h1>Inloggen</h1>
                    <?php if(isset($_POST['submit'])): ?>
                        <?=$message;?>
                    <?php endif ?>
                    <form action="#" method="post">
                        <ul>
                            <li>
                                <label for="gebruikersnaam">gebruikersnaam</label>
                                <input type="text" id="gebruikersnaam" name="username">
                            </li>
                            <li>
                                <label for="paswoord">paswoord</label>
                                <input type="text" id="paswoord" name="password">
                            </li>
                        </ul>
                        <input type="submit" name="submit">
                    </form>
                </div>
            </li>
    </section>
    <?php else: ?>

    <h1>Dashboard</h1>

        <p> u bent ingelogd.</p>
        <a href="coockies1.php?uitloggen=true">uitloggen </a>
    <?php endif ?>
</body>
</html>