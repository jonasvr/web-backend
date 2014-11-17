<?php
	class Animal{
		protected $name;
		protected $gender;
		protected $health;
		public function __construct($name,$gender,$health);
			{
				public function getName()
					{
						return $this->name;
					}
				public function getGender()
					{
						return $this->gender;
					}
				public function getHealth()
					{
						return $this->health;
					}
				public function changeHealth($health)
					{
						$this->health+=$health;
					}
				public function doSpacialMove()
					{
						return "Walk";
					}
			}
	}	
?>