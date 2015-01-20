<?php

	class Image
	{
		private $name;
		private $type; 
		private $tmpName; 
		private $error; 
		private $size;

		private $filename;
		private $newFilename;
		private $extension;
		private $imgPath;
		private $newFilePath;

		private $thumbnailFilename;
		private $thumbnailPath;
		private $originalHeight;
		private $originalWidth;

		public function __construct( $name, $type, $tmpName, $error, $size, $path)
		{
			$this->name 		= $name;
			$this->type 		= $type;
			$this->tmpName 		= $tmpName;
			$this->error 		= $error;
			$this->size 		= $size;
			$this->imgPath 		= $path;
		}

		public function validateType($type)
		{
			$isType = false;
			
			if( in_array($this->type, $type) )
			{
				$isType = true;
			}

			return $isType;
		}

		public function validateSize($size)
		{
			$correctSize = false;

			if( $this->size < $size )
			{
				$correctSize = true;
			}

			return $correctSize;
		}

		public function hasError()
		{
			$hasError = false;
			if( $this->error == 0 )
			{
				$hasError = true;
			}
			return $hasError;
		}


		public function uniqueName()
		{
			$concat = date(time()) . $this->name;
			$hash = hash('md5', $concat);
			$this->calculateExtension();

			if (file_exists($this->imgPath . $hash . '.' . $this->extension))
			{
				#als het al bestaat functie opnieuw doen.
				uniqueName();
			}
			else
			{
				$this->newFilename	=	$hash;
			}
		}

		public function calculateExtension()
		{
			$fileNameArray 		=	pathinfo($this->name); #http://php.net/manual/en/function.pathinfo.php
			$this->filename 	= 	$fileNameArray['filename'];
			$this->extension 	=	$fileNameArray['extension'];
		}

		public function upload()
		{
				$this->newFilePath	=	$this->imgPath . $this->newFilename . '-' . $this->filename . '.' . $this->extension; 
				#move_uploaded_file(file, destination) destination= path+new name
				return (move_uploaded_file( $this->tmpName, $this->newFilePath ));
		}

		#thumb----------------------------------------------------------------------------------------------------

		public function createThumb( $thumbSize )
		{
			$isThumbnail 	=	false;

			#data from uploaded file
			$imageSize = getimagesize( $this->newFilePath ); 

			$this->originalWidth 	= 	$imageSize[ '0' ];
			$this->originalHeight 	= 	$imageSize[ '1' ];

			# Create empty canvas based on uploaded file
			$canvas = imagecreatetruecolor( $thumbSize, $thumbSize );

			# Recreate original
			$original 	=	$this->createOriginalImageCanvas();

			# Crop original to biggest possible square
			$beginXCoordinaat	=	0;
			$beginYCoordinaat	=	0;

			# Standaard: hoogte groter dan breedte
			$breedsteZijde	=	$this->originalHeight;
			$kortsteZijde	=	$this->originalWidth;

			if ( $this->originalWidth >= $this->originalHeight )
			{
				$breedsteZijde		=	$this->originalWidth;
				$kortsteZijde		=	$this->originalHeight;
				$beginXCoordinaat	=	( $this->originalWidth - $this->originalHeight ) / 2;
			}
			else # Wanneer hoogte groter is dan breedte
			{
				$beginYCoordinaat	=	( $this->originalHeight - $this->originalWidth ) / 2;
			}			

			# Resize original
			# Passed by reference to $canvas
			imagecopyresized( $canvas, $original, 0, 0, $beginXCoordinaat, $beginYCoordinaat, $thumbSize, $thumbSize, $kortsteZijde, $kortsteZijde );

			# Save new image
			$this->thumbnailFilename	=	'thumbnail-' . $this->newFilename . '-' . $this->filename . '.' . $this->extension;
			$this->thumbnailPath		=	$this->imgPath . 'thumbnails/' . $this->thumbnailFilename;
			
			//var_dump($this->thumbnailPath);
			$isThumbnail = $this->saveImage( $canvas, $this->thumbnailPath );

			return $isThumbnail;
		}

		public function createOriginalImageCanvas()
		{
			$source	=	false;

			switch ( $this->type )
			{
				case ('image/jpeg'):
					$source 	= 	imagecreatefromjpeg( $this->newFilePath );
					break;
					
				case ('image/png'):
					$source 	=	imagecreatefrompng( $this->newFilePath );
					break;

				case ('image/gif'):
					$source 	=	imagecreatefromgif( $this->newFilePath );
					break;
			}

			return $source;
		}

		public function saveImage( $imageSource, $path )
		{
			switch ( $this->type )
			{
				case ('image/jpeg'):
					$resized 	= 	imagejpeg( $imageSource, $path, 100);
					break;
					
				case ('image/png'):
					$resized 	=	imagepng( $imageSource, $path, 100);
					break;

				case ('image/gif'):
					$resized 	=	imagegif( $imageSource, $path);
					break;
			}

			return $resized;
		}

#sendInfo----------------------------------------------------------------

		public function getCompleteNewFilename()
		{
			return $this->newFilename . '-' . $this->filename . '.' . $this->extension;
		}

		public function getThumbnailFilename()
		{
			return $this->thumbnailFilename;
		}
	}
?>