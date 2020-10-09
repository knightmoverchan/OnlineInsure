<?php
class Payroll {
  // Properties
  public $salesRep;
  public $datePeriod;
  public $bonuses;

  public function __construct($salesRep, $datePeriod, $bonuses) {
        $this->salesRep = $salesRep;
        $this->datePeriod = $datePeriod;
        $this->bonuses = $bonuses;
    }

    // Methods
    function set_salesRep($salesRep) {
        $this->salesRep = $salesRep;
    }
    function get_salesRep() {
        return $this->salesRep;
    }

    function set_datePeriod($datePeriod) {
        $this->datePeriod = $datePeriod;
    }
    function get_datePeriod() {
        return $this->datePeriod;
    }

    function set_bonuses($bonuses) {
        $this->bonuses = $bonuses;
    }
    function get_bonuses() {
        return $this->bonuses;
    }
}
?>