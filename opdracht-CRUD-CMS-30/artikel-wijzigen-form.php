<?php
session_start();
$_SESSION['notification']=  null;
    if (isset($_GET['wijzigID']))
    {
        try
        {
            $ID=$_GET['wijzigID'];
            $db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms','root','');
            $query = 'SELECT * FROM Artikels where ID = :ID';
            $statement=$db->prepare($query);
            $statement->bindParam(':ID',$ID);
            $statement->execute();
            $row = $statement->fetch();
        }
        catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
        {
            $_SESSION['notification']=  'De connectie is mislukt.';
        }
    }else{
        $_SESSION['notification']=  'wijzigID is niet geset';
        header('location:artikel-overzicht.php');
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>artikel wijzigen</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
    <?php include('header.php'); ?>
    <a href="artikel-overzicht.php">Terug naar overzicht.</a>
    <h1>Artikel wijzigen</h1>
    <form action="artikel-wijzigen.php" method="post">                     
        <ul>
            <li>
                <label for="titel">Titel</label>
                <input type="text" id="titel" name="titel" value="<?= $row['titel'] ?>">
            </li>

            <li>
                <label for="artikel">Artikel</label>
                <textarea id="artikel" name="artikel"><?= $row['artikel'] ?></textarea>
            </li>

            <li>
                <label for="kernwoorden">Kernwoorden</label>
                <input type="text" id="kernwoorden" name="kernwoorden" value="<?= $row['kernwoorden'] ?>">
            </li>

            <li>
                <label for="datum">Datum (dd-mm-jjjj)</label>
                <input type="text" id="datum" name="datum" value="<?= $row['datum'] ?>">
            </li>
            <p hidden name='ID' value='<?= $row['ID'] ?>'>ID</p>
            <input type="submit" name="wijzigen" value="Artikel wijzigen">
        </ul>
    </form>

    <?php if(isset($_SESSION['notification'])):  echo $_SESSION['notification'] ?>   
    <?php endif ?> 

    </body>
</html>
