<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht comments</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
			<h1>Opdracht comments: deel 1</h1>

			<ul>
				<li>Maak een pagina (incl. HTML5 doctype), met daarin een PHP-block (inline) dat er voor zorgt dat je voornaam & naam op het scherm tevoorschijn komen.</li>

				<li>Maak een commentaar-block met je naam en e-mail</li>
			</ul>

            <p><?php echo "Van Reeth Jonas"; ?>
            <p><?php echo "jonasvanreeth@gmail.com"; ?>
            <p><?php print_r("Van Reeth Jonas"); ?>
            <p><?php print_r("jonasvanreeth@gmail.com"); ?>
			
		</section>

    </body>
</html>