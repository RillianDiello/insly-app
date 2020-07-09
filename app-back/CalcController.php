<?php
namespace app;

class CalcController
{
	private $calc;

	public function CalcController(){	
		echo "meu peniz"	;
		$this->calc = new Calc();
	}

	public function createCalc($valueOfCar, $taxPercent,$numInstalments)
	{
		
		$this->calc->setValueOfCar($valueOfCar);
		$this->calc->setTaxPercent($taxPercent);
		$this->calc->setNumInstalments($numInstalments);
		$this->calc->CalculateInsuranceMethod();

		echo "passou aki";
	}
	

	public function getCalculation(){
		echo "passou aki";
	}
}


?>
