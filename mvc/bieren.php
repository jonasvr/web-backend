<?php
	class Bieren extends Controller
	{
		public function __Construct()
		{
			var_dump("hallo vanuit bieren construct");
			$this->bierenOverzicht();
		}
		private function bierenOverzicht()
		{
			var_dump("hallo vanuit bierenoverzicht");
			$bierenModel = new Bieren_model();

			$bieren = $bierenModel->bieren();
			$view = new View();

			$view->show('header.php',array('title' => 'overzicht van de bieren'));
			$view->show('bieren_overzicht.php',array('bieren' => $bieren));
			$view->show('footer.php',array('bieren' => $bieren));

			/*include('header.php');
			include('bieren_overzicht.php');
			include('footer.php');*/
			//var_dump($bieren);
		}
	}
?>