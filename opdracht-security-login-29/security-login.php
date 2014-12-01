<?php
session_start();
    $pasWoord='';
    $inputType='password';
    $email='';
 if(isset($_SESSION['pasWoord']))
    {
        echo 'set';
        $pasWoord=$_SESSION['pasWoord'];
        $inputType=$_SESSION['inputType'];
        $email=$_SESSION['email'];
        //session_destroy();
    }

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security: login</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
    <h1>Registreren</h1>
        <form action="registratie-process.php" method="post">
            <ul>
                <li>
                    <label for="email">e-mail</label>
                    <input type="text" name='email' id="email" value=<?php echo $email; ?>>
                </li>
                <li>
                    <label for="password">paswoord</label>
                    <input type=<?php echo $inputType; ?> name="password" id="password" value=<?php echo $pasWoord ?>>
                    <input type="submit" name="generatePassword" value="Genereer een paswoord">
                </li>
            </ul>
            <input type="submit" value="Registreer">
        </form>
    </section>
    </body>
</html>
