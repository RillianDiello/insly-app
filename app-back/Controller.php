<?php
namespace app;


use app\Models;

class CalcController
{
	private $calc;

	public function createCalc($valueOfCar, $taxPercent,$numInstalments)
	{
		$this->calc = new Calc();
		$this->calc->setValueOfCar($valueOfCar);
		$this->calc->setTaxPercent($taxPercent);
		$this->calc->setNumInstalments($taxPercent);
		$this->calc->CalculateInsuranceMethod();

		echo "passou aki";
	}
	

	public function getCalculation{
		echo "passou aki";
	}
}

