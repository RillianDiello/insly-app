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
        $this->calculate->setTax($this->getTaxPercent());
    }
}


class CalculateInsurance 
{
    private $base_premium;
    private $comission;
    private $tax;
    private $totalCost;
    private $arrayInstalments;   

    const COMISSIONBASE = 17.0;
    const BASEPRICE = 11.0;
    const BASEPRICEFRIDAY = 13.0;
    const FRIDAY = 5;
    

    public function CalculateInsurance(){
        $this->base_premium = 0;
        $this->comission = 0;
        $this->tax = 0;
        $this->totalCost = 0;
        $this->arrayInstalments=[];    
    }

    public function setBasePremium(float $value)
    {     
        if($this->checkWeekDay() && $this->checkInterval())
        {
            $this->base_premium = $value * (self::BASEPRICEFRIDAY/100);
        }else{
            $this->base_premium = $value * (self::BASEPRICE/100);
        }
        
    }

    public function setComission(){
        $this->comission = $this->comission * (self::COMISSIONBASE/100);
    }

    public function setTax(float $tax){
        $this->tax = $this->tax * ($tax/100);
    }

    public function setTotalCost(){
        $this->totalCost = $this->getBasePremium() + $this->getComission() + $this->getTax();
    }

    private function checkInterval() {
        $now = new DateTime('now');
        $start = new DateTime('08:25:00');
        $end = new DateTime('12:25:00');

        if ( $start <= $now && $now <= $end ) {
            return true;
        }
        return false;

    } 
    private function checkWeekDay(){
        $now = new DateTime('now');
        $day = date('w', strtotime($now->format('Y-m-d')));
        if($day == self::FRIDAY ) {
            return true;
        }
        return false;

    }

    public function setArrayInstalments($numInstalments){
        $mediumValueBase = $this->getBasePremium()/ $numInstalments;
        $mediumValueComission = $this->getComission()/ $numInstalments;
        $mediumValueTax = $this->getTax()/ $numInstalments;
        for ($i=0; $i < $numInstalments; $i++) {
            $calcInta  = new CalculateIntalment();
            $calcInta->setBaseIntalmen($mediumValueBase);
            $calcInta->setComission($mediumValueComission);
            $calcInta->setTaxIntalmen($mediumValueTax);
            array_push($this->arrayInstalments,$calcInta);           
        }

    }
    
    public function getBasePremium(){
        return $this->base_premium;;
    }
    public function getComission(){
        return $this->comission;;
    }
    public function getTax(){
        return $this->tax;
    }
    public function getTotalCost(){
        return $this->totalCost;
    }

    public function getArrayInstalments(){
        return $this->arrayInstalments;
    }

}

class CalculateIntalment 
{
    private $baseIntalmen;
    private $comissionIntalmen;
    private $taxIntalmen;

    public function CalculateIntalment(){
        $this->baseIntalmen = 0;
        $this->comissionIntalmen = 0;
        $this->taxIntalmen = 0;           
    }

     public function setBaseIntalmen($value)
    {     
        $this->baseIntalmen = $value;
    }

    public function setComission($value){
        $this->comissionIntalmen = $value;
    }

    public function setTaxIntalmen($value){
        $this->tax = $value;
    }
    
    public function getBaseIntalmen(){
        return $this->baseIntalmen;;
    }
    public function getComissionIntalmen(){
        return $this->comissionIntalmen;;
    }
    public function getTaxIntalmen(){
        return $this->taxIntalmen;;
    }

  
}

?>
