<?php

	function __autoload($className)
	{
		include 'classes/'.$className.'.php';
	}

	$Kermit = new Animal('Kermit','male',100);
	$Dikkie = new Animal('Dikkie','male',90);
	$Flipper = new Animal ('Flipper','Female',80);

	$Kermit->changeHealth(-20);

	$Simba 	= 	new Lion('Simba', 'male', 100, 'Congo lion');
	$Scar 	= 	new Lion('Scar', 'female', 100, 'Kenia lion');

	
	$Zeke = new Zebra('Zeke', 'male', 120, 'Quagga');
	$Zana = new Zebra('Zana', 'female', 100, 'Selous');
?>

<!DOCTYPE html>
<html>
<head>
	<?php include('../style.php'); ?>
</head>
	<body>
	

		<h1>classes extend animals</h1>
		
		
		<p><?php echo $Kermit->getName() ?> is van het geslacht <?php echo $Kermit->getGender() ?> en heeft momenteel <?php echo $Kermit->getHealth() ?> levenspunten</p>

		<p><?php echo $Dikkie->getName() ?> is van het geslacht <?php echo $Dikkie->getGender() ?> en heeft momenteel <?php echo $Dikkie->getHealth() ?> levenspunten</p>

		<p><?php echo $Flipper->getName() ?> is van het geslacht <?php echo $Flipper->getGender() ?> en heeft momenteel <?php echo $Flipper->getHealth() ?> levenspunten</p>


	<h1>Specifieke dierenklassen die gebaseerd zijn op de Animal klasse</h1>

	<h2>Leeuwen</h2>

		<p>Simba's (soort: <?php echo $Simba->getSpecies() ?>) special move: <?php echo $Simba->doSpecialMove() ?></p>
		<p>Scar's (soort: <?php echo $Scar->getSpecies()  ?>) special move: <?php echo $Scar->doSpecialMove() ?></p>


	<h2>Zebras</h2>

		<p>Zekes's (soort: <?php echo $Zeke->getSpecies() ?>) special move: <?php echo $Zeke->doSpecialMove() ?></p>
		<p>Zana's (soort: <?php echo $Zana->getSpecies()  ?>) special move: <?php echo $Zana->doSpecialMove() ?></p>


	</body>
</html>