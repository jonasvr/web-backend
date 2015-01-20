<?php
session_start();

	function __autoload($classname)
	{
		require_once($classname.'.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>image manipulation gallary</title>
	<?php include('../style.php'); ?>
</head>
<body>
	<a href='gallary.php'> Terug naar de gallerij </a>
	<h1>Foto uploaden</h1>

	<form action='photo-upload.php' method='post' enctype='multipart/form-data'>
		<ul>
			<li>
				<label for='fileUpload'> Bestand Uploaden </label>
				<input type='file' name='fileUpload' id='fileUpload'>
			</li>
			<li>
				<label for='title'> Titel </label>
				<input type='text' name='title' id='title'>
			</li>
			<li>
				<label for='caption'> Beschrijving </label>
				<input type='text' name='caption' id='caption'>
			</li>
		</ul>
		<input type='submit' name='submit'>
	</form>
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