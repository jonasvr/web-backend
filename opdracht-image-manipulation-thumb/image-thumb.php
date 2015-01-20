<?php
session_start();
unset($_SESSION['notification']['message']);
$whiteList=array('image/jpg',
	'image/png',
	'image/gif',
	'image/jpeg');
$maxSize=5242880; //5Mb
$allDataCorrect=true;
$uploadLocation='img/';
var_dump($_FILES);

if(isset($_POST['wijzigen']))
{
	$file=$_FILES['image'];
		
	if(!in_array($file['type'],$whiteList))//juiste bestandstype?
    {
    	$_SESSION['notification']['message'][]="Het bestand is niet van het correcte type";
    	$allDataCorrect=false;
    }

    if($file['size']>$maxSize) //nakijken of het bestand niet te groot is
    {
    	$_SESSION['notification']['message'][]="Het bestand is niet van het correcte grootte";
    	$allDataCorrect=false;
    	//echo 'false size';
    }
    if(!empty($file['error'])) //nakijken of er geen errors zijn
    {
    	$_SESSION['notification']['message'][]=$file['error'];
    	$allDataCorrect=false;
    }

	$imageInfo = getimagesize($file['tmp_name']);//hoogte en breedte zoeken		    
    	
	if($allDataCorrect)
    {
    	$filename = time().$file['name'];
    		if(move_uploaded_file($file['tmp_name'], $uploadLocation.$filename))
    		{
    			// hoogte en breedte instellen voor te croppen
    			$width=100;
    			$height=100;
    			# Create empty canvas - zwart canvas waar de gecropte versie op geplakt wordt
				$canvas = imagecreatetruecolor( $width, $height );

				#origineel canvas - type bepalen - http://php.net/manual/en/function.imagecreatefromjpeg.php
				switch ( $file['type'] )
				{
					case ('image/jpg'):
						$original 	= 	imagecreatefromjpeg( $uploadLocation.$filename );
						$extension = 'jpg';
						break;

					case ('image/jpeg'):
						$original 	= 	imagecreatefromjpeg( $uploadLocation.$filename );
						$extension = 'jpeg';
						break;
						
					case ('image/png'):
						$original 	=	imagecreatefrompng( $uploadLocation.$filename );
						$extension = 'png';
						break;

					case ('image/gif'):
						$original 	=	imagecreatefromgif( $uploadLocation.$filename );
						$extension = 'gif';
						break;
				}

				#cordinaten berekenen - nodig om het midden te vinden en correct te croppen
				$beginXCoordinaat	=	0;
				$beginYCoordinaat	=	0;
				var_dump($file);
    			//$imageInfo = getimagesize($file['tmp_name']);//hoogte en breedte zoeken
			    $imageWidth=$imageInfo[1];//breedte
			    $imageHeight=$imageInfo[0];//hoogte

			    if($imageWidth<=$imageHeight)//landscape
			    {	
			    	echo 'breedte groter';
			    	$kort=$imageWidth;
			    	$breed=$imageHeight;
			    	$beginYCoordinaat=($imageWidth-$imageHeight)/2;
			    }
			    elseif($imageWidth>$imageHeight)//portret
			    {	
			    	echo 'hoogte groter';
			    	$breed=$imageWidth;
			    	$kort=$imageHeight;
			    	$beginXCoordinaat=($imageHeight-$imageWidth)/2;
			    }
			
				# Resize original
				# Passed by reference to $canvas
				//http://php.net/manual/en/function.imagecopyresized.php
				imagecopyresized( $canvas, $original, 0, 0, $beginXCoordinaat, $beginYCoordinaat, $width, $height, $kort, $breed );

				# Save new image
			$thumbnailFilename	=	'thumbnail-' . $filename;
			$thumbnailPath		=	 $uploadLocation . 'thumbnails/' . $thumbnailFilename;
			
			//var_dump($this->thumbnailPath);
			$isThumbnail = saveImage( $canvas, $thumbnailPath, $extension );

			echo '<img src="img/thumbnails/'.$thumbnailFilename.'" alt="Verkleinde afbeelding">';
    		}
   	}
}
if (isset($_SESSION['notification']['message']))
{
	var_dump($_SESSION['notification']['message']);
}

function saveImage( $imageSource, $path,$extension )
		{
			switch ( $extension )
			{
				case ('jpeg'):
					$resized 	= 	imagejpeg( $imageSource, $path, 100);
					break;
					
				case ('png'):
					$resized 	=	imagepng( $imageSource, $path, 100);
					break;

				case ('gif'):
					$resized 	=	imagegif( $imageSource, $path);
					break;
			}
		}

?>