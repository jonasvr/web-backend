<?php
session_start();
$whiteList=array();
$whiteList[]='image/jpg';
$whiteList[]='image/png';
$whiteList[]='image/gif';
$whiteList[]='image/jpeg';
$maxPhotoSize=2097152; //=2mb
$maxWidth=400;
$allDataCorrect=true;
$uploadLocation='img/';
$cookieExplode=explode(',',$_COOKIE['login']);
$email = $cookieExplode[0];


if(isset($_POST['wijzigen']))
{
	$file=$_FILES['profile_picture'];
    //var_dump($_FILES);
    if(!in_array($file['type'],$whiteList))
    {
    	$_SESSION['notification']['message'][]="Het bestand is niet van het correcte type";
    	$allDataCorrect=false;
    }

    if($file['size']>$maxPhotoSize)
    {
    	$_SESSION['notification']['message'][]="Het bestand is niet van het correcte grootte";
    	$allDataCorrect=false;
    	//echo 'false size';
    }
    if(!empty($file['error']))
    {
    	$_SESSION['notification']['message'][]=$file['error'];
    	$allDataCorrect=false;
    }

    $imageInfo = getimagesize($file['tmp_name']);
    $imageWidth=$imageInfo[1];

    if($imageWidth>$maxWidth)
    {
    	$_SESSION['notification']['message'][]='uw afbeelding breedte is te groot';
    	$allDataCorrect=false;
    }


    
    if($allDataCorrect)
    {
    	$filename = time().$file['name'];
    	if(!file_exists($uploadLocation.$filename))
    	{
    		if(move_uploaded_file($file['tmp_name'], $uploadLocation.$filename))
    		{
    			try
    			{
    				$db = new PDO('mysql:host=localhost;dbname=opdracht-upload','root','');
    				$query= 'UPDATE users
    						SET `profile_picture`= "'.$filename.'"
    						WHERE `email` = "'.$email.'"';
    				$statement=$db->prepare($query);
    				$statement->execute();

    				$_SESSION['notification']['message'][]='nieuwe profielfoto is succesvol geupload';
    				redirect();
    			}
    			catch(PDOException $e)
    			{
    				$_SESSION['notification']['message'][]='failed connection';
    				redirect();
    			}
    		}
    	}
    }
    else
    {
    	redirect();
    }

}

function redirect()
{
	header('location: gegevens-wijzigen.php');
}
?>
