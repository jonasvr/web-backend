<?php
session_start();
include('checkLogin.php');
//var_dump( $_COOKIE);

try
{
    $email = strstr($_COOKIE['login'], ',', true); //string uitlezen tot aan de eerste komma
    $db= new pdo('mysql:host=localhost;dbname=opdracht-upload','root','');
    $query = 'SELECT * FROM users
                WHERE email = :email';
    $statement=$db->prepare($query);
    $statement->bindValue(':email',$email);
    $statement->execute(); 
    $row = $statement->fetch();
    //var_dump($row);
    $profile_picture = $row['profile_picture'];
    if(empty($profile_picture)==false)
    {
        $profile_picture='img/'.$profile_picture;
    }
}
catch(PDOException $e)
{
    echo 'slechte verbinding';
}



?>
<!doctype html>
<html>
<head>
    <title>gegevens wijzigen</title>
    <?php include('../style.php'); ?>
</head>
<body>
    <div>

        <?php include('header.php') ?>
        <h1>Gegevens wijzigen</h1>
        
        <form enctype="multipart/form-data" action="gegevens-bewerken.php" method='post'>
            
            <ul>
                
                <li>
                    <label for="profile_picture">Profielfoto
                        <img class="profile-picture" src=<?php echo(empty($profile_picture))?"img/placeholder.gif":$profile_picture; ?> alt=<?= $email ?>>
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture">
                </li>

                <li>
                    <label for="email">e-mail</label>
                    <input type="text" id="email" name="email" value="<?= strstr($_COOKIE['login'], ',', true); ?>">
                </li>

            </ul>

            <input type="submit" name="wijzigen" value="Gegevens wijzigen">
        </form>

        <?php if(isset($_SESSION['notification']['message'])): ?>
        <ul>
            <?php foreach ($_SESSION['notification']['message'] as $key => $message): ?>
                <li><?=$message?></li>
            <?php unset($_SESSION['notification']['message']); endforeach; ?>
        </ul> 
    <?php endif ?>
    </div>
</body>
</html>