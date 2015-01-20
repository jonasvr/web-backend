<?php
	function autoload($classname)
	{
		$classname = strtolower($classname);
		$filename = $classname . '.php';

		if(file_exists( $filename))
		{
			include_once($filename);// verschil opzoeken
		}
	}
	spl_autoload_register("autoload");

	$controller= new Bieren();
?>