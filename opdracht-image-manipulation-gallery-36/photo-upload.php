<?php 

	#load classes
	function __autoload($classname)
		{
			require_once($classname.'.php');
		}

	#start session and empty notifications 
	session_start();
	unset($_SESSION['notifications']);

	#DATA
	
	#to uses data - upload & thumb
	$whiteList	=	array(
						'image/jpg', 
						'image/jpeg',
						'image/png',
						'image/gif'
						);
	$maxSize	=	2097152;
	$allSet		=	true;
	$imgPath	=	'uploads/img/';
	$thumbSize	= 	50; #thumb is square => 50*50

#logic ----------------------------------------------------------

	// check if data isset (submit, title, descrition, file)?
	if(!isset($_POST['submit']))
	{
		falseSet('U bent naar de verkeerde pagina gegaan.');
	}
	else
	{ 
		#input boxes filled in?
		if($_POST['title'] == "" && $_POST['caption'] == "")
		{
			falseSet('U heeft niet alle velden ingevuld.');
		}

		$image = new image // create new image 
		(
			$_FILES['fileUpload']['name'],
			$_FILES['fileUpload']['type'],
			$_FILES['fileUpload']['tmp_name'],
			$_FILES['fileUpload']['error'],
			$_FILES['fileUpload']['size'],
			$imgPath
		);

		#check if data is correct
		$correctType=$image->validateType($whiteList);
		$correctSize=$image->validateSize($maxSize);
		$noError=$image->hasError();

		if($correctSize && $correctType && $noError) 
		{
			$image->uniqueName();
			$isUploaded 	=	$image->upload();
			if ($isUploaded)
			{
				$isThumbed		=	$image->createThumb($thumbSize);
				if($isThumbed)
				{
					database($image);
				}
				else
				{
					falseSet('fout bij het aanmaken van de thumbnail');
				}
			}
			else
			{
				falseSet('fout bij het uploaden');
			}
		} 
		else
		{
			falseSet('uw file voldoet niet aan de voorwaarden');
		}
		
	}

	#fault in data, return to form
	if(!$allSet)
	{
		redirect();
	}

#functions----------------------------------------------------------
	function database($image)
	{
		$db = new database( );
		
		$gallaryQuery	=	'INSERT INTO gallary( 
												file_name, 
												title, 
												caption)
									VALUES ( 	
												:file_name, 
												:title, 
												:caption )';

			$gallaryTokens	=	array( 	':file_name' => $image->getCompleteNewFilename(),
										':title' => $_POST['title'],
										':caption' => $_POST['caption']);


			$gallary	=	 $db->query( $gallaryQuery, $gallaryTokens );

			$_SESSION['notifications']['type']='success';
			$_SESSION['notifications']['message'][]='De foto is succesvol aan de database toegevoegd.';
			header( 'location: photo-upload-form.php' );

	}


	function falseSet($message)
	{
		global $allSet;
		$allSet=false;
		$_SESSION['notifications']['type']='error';
		$_SESSION['notifications']['message'][]=$message;
	}
	function redirect()
	{
		header('location: photo-upload-form.php');
	}
?>