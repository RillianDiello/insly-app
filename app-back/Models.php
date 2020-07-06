<?php
namespace app;

class Calc
{
    private $valueOfCar;
    private $taxPercent;
    private $numInstalments;
    private $calculate;

    function Calc(){
        $this->valueOfCar = 0;
        $this->taxPercent = 0;
        $this->numInstalments = 0;
        $this->calculate = new CalculateInsurance();
    }


    public function setValueOfCar($valueOfCar){
        $this->valueOfCar= $valueOfCar;
    }
    public function setTaxPercent($taxPercent){
        $this->taxPercent= $taxPercent;
    }
    public function setNumInstalments($numInstalments){
        $this->numInstalments= $numInstalments;
    }

    // function Calc($valueOfCar, $taxPercent, $numInstalments)
    // {
    //     $this->valueOfCar = $valueOfCar;
    //     $this->taxPercent = $taxPercent;
    //     $this->numInstalments = $numInstalments;
    //     $this->calculate = new CalculateInsurance();
    // }

    public function getValueOfCar(){
        return $this->valueOfCar;;
    }
    public function getTaxPercent(){
        return $this->taxPercent;;
    }
    public function getNumInstalments(){
        return $this->numInstalments;;
    }

    public function CalculateInsuranceMethod(){
        
        $this->calculate->setBasePremium($this->getValueOfCar());
        $this->calculate->setComission();
        $this->calculate->setTax();
    }
}


class CalculateInsurance 
{
    private $base_premium;
    private $comission;
    private $tax;   

    const COMISSIONBASE = 17.0;
    const BASEPRICE = 11.0;
    const BASEPRICEFRIDAY = 13.0;
    const  TAX = 10.0;

    public function CalculateInsurance(){
        $this->base_premium = 0;
        $this->comission = 0;
        $this->tax = 0;    
    }

    public function setBasePremium(float $value)
    {     
        $this->base_premium = $value * (self::BASEPRICE/100);
    }

    public function setComission(){
        $this->comission = $this->comission * (self::COMISSIONBASE/100);
    }

    public function setTax(){
        $this->tax = $this->tax * (self::TAX/100);
    }
    
    public function getBasePremium(){
        return $this->base_premium;;
    }
    public function getComission(){
        return $this->comission;;
    }
    public function getTax(){
        return $this->tax;;
    }


}