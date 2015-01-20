<?php
session_start();

function __autoload($classname)
		{
			require_once($classname.'.php');
		}

if (isset($_POST['submit']))
{
	#data uit _POST halen
		$ID=$_POST['id'];
		$file_name=$_POST['file_name'];

	#bestande verplaatsten => http://php.net/manual/en/function.rename.php
		$movePhoto	=	rename(
					'uploads/img/' . $file_name,
					'uploads/bin/' . $file_name );
		$moveThumbs =	rename(
					'uploads/img/thumbnails/thumbnail-' . $file_name,
					'uploads/bin/thumbnail-' . $file_name );

	#gegevens in data base aanpassen
		$db = new database();
		$query	=	'UPDATE
						gallary
					SET
						is_archived = 1
					WHERE
						id = :id';
		$tokens = array( ':id' => $ID );

		$update = $db->query($query,$tokens);
	
	#checken en redirect:
		if ( $movePhoto && $moveThumbs)
		{
			$_SESSION['notifications']['type']='success';
			$_SESSION['notifications']['message'][]='De afbeelding is met succes verwijderd';
			header( 'location: gallary.php' );
		} else {
			$_SESSION['notifications']['type']='error';
			$_SESSION['notifications']['message'][]='het verwijderen van de afbeelding is mislukt';
			header( 'location: gallary.php' );
		}

}
else
{
	$_SESSION['notifications']['type']='error';
	$_SESSION['notifications']['message'][]=$message;
	header('location: gallary.php');
}


?>