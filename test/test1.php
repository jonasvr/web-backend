<?php
session_start();
	if (isset($_SESSION['notification']))
	{
	 var_dump($_SESSION['notification']);
	}

?>
<html>
<head>
	<title>image manipulation gallary</title>
</head>
<body>
	<form action='test2.php' method='post' enctype='multipart/form-data'>
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
				
				<label for='description'> Beschrijving </label>
				<input type='text' name='description' id='description'>
			</li>
		</ul>
		<input type='submit' name='submit'>
	</form>
</body>
</html>