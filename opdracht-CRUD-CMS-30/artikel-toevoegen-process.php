<?php
session_start();
	try
    {
        $db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms','root','');

        $query = 'INSERT INTO Artikels (titel, artikel, kernwoorden, datum) 
                       			VALUES(:titel, :artikel, :kernwoorden, :datum)';
        $statement = $db->prepare($query);
        $statement->bindParam( ':titel', $_POST['titel']);
        $statement->bindParam( ':artikel', $_POST['artikel']);
        $statement->bindParam( ':kernwoorden', $_POST['kernwoorden'] );
       	$statement->bindParam( ':datum', $_POST['datum'] );
       	$toegevoegd = $statement->execute();
       	//$toegevoegd = false;

       	if($toegevoegd)
       	{
       		header('location: artikel-overzicht.php');
       	}
       	else
       	{
       		$_SESSION['notification']=  'Het toevoegen is mislukt.';
       		redirect();
       	}
				            
    }
    	catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
    {
        $_SESSION['notification']=  'De connectie is mislukt.';
        redirect();
	}

	function redirect()
	{
		header('location: artikel-toevoegen-form.php');
	}
?>