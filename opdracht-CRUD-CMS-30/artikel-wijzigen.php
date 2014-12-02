<?php
session_start();

if(isset($_POST['wijzigen']))
{
  try
    {
        $db = new PDO('mysql:host=localhost;dbname=opdracht-crud-cms','root','');
        $query  = 'UPDATE Artikels
                      SET titel     = :titel,
                          artikel   = :artikel,
                          kernwoorden  = :kernwoorden,
                          datum  = :datum,
                      WHERE ID= :ID;';
        $statement=$db->prepare($query);
        $statement->bindParam( ":titel",  $_POST[ 'titel' ] );
        $statement->bindParam( ":artikel",  $_POST[ 'artikel' ] );            
        $statement->bindParam( ":kernwoorden",  $_POST[ 'kernwoorden' ] );
        $statement->bindParam( ":datum",  $_POST[ 'datum' ] );            
        $statement->bindParam( ":ID",  $_POST[ 'gemeente' ] );
        $statement->execute();
    }
		catch ( PDOException $e ) // http://be2.php.net/manual/en/class.pdoexception.php
    {
        $_SESSION['notification']=  'De connectie is mislukt.';
        header('location: artikel-wijzigen-form.php');
    }
	            
  }
else
{
  $_SESSION['notification']=  'naar een pagina op een niet correcte manier.';
  header('location: artikel-wijzigen-form.php');
}

	
?>