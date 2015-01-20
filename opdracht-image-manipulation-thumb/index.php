<!doctype html>
<html>
<head>
	<title>thumbnail gereneren</title>
	<?php include('../style.php'); ?>
</head>
<body>
	<div>
		<h1>thumbnail gereneren</h1>

		<form enctype="multipart/form-data" action="image-thumb.php" method='post'>
			<ul>
                <label for="image">Foto kiezen</label>
                <input type="file" id="image" name="image">
            </ul>
            <input type="submit" name="wijzigen" value="Gegevens wijzigen">
            
		</form>
	</div>
</body>
</html>