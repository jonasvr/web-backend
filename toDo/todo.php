<?php
session_start();

	// nakijken of de toDo lijst gemaakt is
	if(!isset($_SESSION['toDo']))
	{
		$_SESSION['toDo']=array();
	}

	//kijken of op de toevoegen knop gedrukt is
	if (isset($_POST['addTodo']) && isset($_POST['description']))
	{
		$taak=$_POST['description'];
		//zien aan welke ID we zitten
		$idTaak=count($_SESSION['toDo']);

		//toevoegen aan sessions en juiste id (geen id is voor taak en done een aparte array maken)
		$_SESSION['toDo'][$idTaak]['taak']=$taak;
		$_SESSION['toDo'][$idTaak]['done']=false;	
	}

	//als er een taak geselecteerd is...
	if (isset($_POST['Task']))
	{
		$idTaak=$_POST['taak']; // id opslaan

		if($_POST['Task']=='gedaan') // als gedaan geselecteerd is true zetten
		{
			$_SESSION['toDo'][$idTaak]['done']=true;
		}
		elseif($_POST['Task']=='nietGedaan') // als de taak dan toch niet gedaan is, terug false
		{
			$idTaak=$_POST['taak'];
			$_SESSION['toDo'][$idTaak]['done']=false;
		}
		elseif($_POST['Task']=='Delete')
		{
			$idTaak=$_POST['taak'];
			unset($_SESSION['toDo'][$idTaak]);
		}
	}


	if (isset($_POST['destroy']))
	{
		session_destroy();
	}

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todo App</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

    <h1>Todo app</h1>

					<!--<p>Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?</p>-->
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<ul>
				<?php foreach ($_SESSION['toDo'] as $key=>$taak):?>
					<?php if(!$taak['done']): ?>
						<li><input type="radio" name="taak" value="<?php echo $key; ?>"><?php echo $taak['taak']; ?></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		<input type="submit" name="Task" value="Gedaan">
		<input type="submit" name="Task" value="Delete">
		<input type="submit" name="destroy" value="destroy">
		</form>


	<h1>Done</h1>
	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
			<ul>
				<?php foreach ($_SESSION['toDo'] as $key=>$taak):?>
					<?php if($taak['done']): ?>
						<li><input type="radio" name="taak" value="<?php echo $key; ?>"><?php echo $taak['taak']; ?></li>
					<?php endif ?>
				<?php endforeach ?>
			</ul>
		<input type="submit" name="Task" value="nietGedaan">
		</form>
		<h1>Todo toevoegen</h1>

		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

			<ul>
				<li>
					<label for="description">Beschrijving: </label>
					<input type="text" id="description" name="description">
				</li>
			</ul>

			<input type="submit" name="addTodo" value="Toevoegen">

		</form>
    </body>
</html>