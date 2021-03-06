<?php
	
	class Model
	{
		private $db;

		public function __construct( )
		{
			$this->db	=	new pdo('mysql:host=localhost;dbname=bieren','root','');
		}

		public function query( $query, $tokens = false )
		{
			$statement = $this->db->prepare( $query );
			
			if ( $tokens )
			{
				foreach ( $tokens as $token => $tokenValue )
				{
					$statement->bindValue( $token, $tokenValue );
				}
			}

			$statement->execute();

			/*  Veldnamen ophalen*/
			$fieldnames	=	array();

			for ( $fieldNumber = 0; $fieldNumber < $statement->columnCount(); ++$fieldNumber )
			{
				$fieldnames[]	=	$statement->getColumnMeta( $fieldNumber );
			}

			/*De brouwer-data ophalen*/
			$data	=	array();

			while( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$data[]	=	$row;
			}

			$returnArray['fieldnames']	=	$fieldnames;
			$returnArray['data']		=	$data;

			return $returnArray;
		}
	}
?>