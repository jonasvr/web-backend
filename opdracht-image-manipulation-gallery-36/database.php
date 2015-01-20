<?php
	
	class database
	{
		private $db;

		public function __construct( )
		{	
			$hostname		= 	'localhost';
			$database  		=	'Manipulation-gallary';
			$root			=	'root';
			$password		=	'';
			$db 			=	new PDO( 'mysql:host='. $hostname.';dbname='.$database, $root, $password );
		
			$this->db	=	$db;
		}

		public function query($query,$tokens=false)
		{
			$statement = $this->db->prepare($query);

			if($tokens)#if there are tokens/data
			{
				#bind tokens toe query
				foreach($tokens as $token =>$tokenValue)
				{
					$statement->bindValue( $token, $tokenValue );
				}
			}

			$statement->execute();

			/*  Veldnamen ophalen*/
			/*$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta($fieldNumber);
			}
			*/
			/*De foto gegevens ophalen*/
			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			/*$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;*/

			$returnArray = $data;

			return $returnArray;
		}
	}
?>