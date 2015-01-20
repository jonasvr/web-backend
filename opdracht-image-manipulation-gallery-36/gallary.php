<?php
session_start();

function __autoload($classname)
		{
			require_once($classname.'.php');
		}

$db = new database( );
$gallaryQuery	=	'SELECT *
					FROM gallary
					WHERE `is_archived` =0';

$gallary	=	 $db->query( $gallaryQuery );
			
?>

<!DOCTYPE html>
<html>
<head>
	<title>gallary</title>
	<?php include('../style.php'); ?>
	<style type="text/css">
		.opdracht-image-manipulation-gallery caption {
    		display: block;
		}
		.gallery {
			list-style: none;
		}
		.gallery li {
			ist-style-type: none;
		    margin-bottom: 24px;
		}
		.gallery li button {
		    margin-left: 40px;
		}
		.gallery li + li {
		    border-top: 1px solid #eeeeee;
		}
	</style>
	
</head>
<body>
	<h1>Fotogallerij</h1>
	<a href='photo-upload-form.php'> foto toevoegen </a>

	<ul class="gallery">
	<?php foreach($gallary as $data): ?>
	<li>
		<a href="uploads/img/<?=$data['file_name']; ?>">
			<img src="uploads/img/thumbnails/thumbnail-<?= $data['file_name'] ?>" alt="<?= $data['title'] ?>">		
		</a>
		<figcaption><?= $data['title'] ?></figcaption>
		<form action="photo-delete.php" method="POST">
			<input type="hidden" name="id" value="<?= $data['ID'] ?>">
			<input type="hidden" name="file_name" value="<?= $data['file_name'] ?>">
			<input type="submit" name="submit" value="Verwijderen">
		</form>
	</li>
	<?php endforeach ?>
	</ul>

	<?php if(isset($_SESSION['notifications'])): ?>
		<ul>
			<?php foreach($_SESSION['notifications']['message'] as $notification): ?>
				<li class=<?=$_SESSION['notifications']['type']; ?> >
					<p><?= $notification; ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php unset($_SESSION['notifications']); ?>
	<?php endif; ?> 
</body>
</html>