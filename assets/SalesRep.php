<?php
class SalesRep {
  // Properties
  public $name;
  public $comPercentage;
  public $taxRate;
  public $bonus;

    public function __construct($name, $comPercentage, $taxRate, $bonus) {
        $this->name = $name;
        $this->comPercentage = $comPercentage;
        $this->taxRate = $taxRate;
        $this->bonus = $bonus;
    }

    // Methods
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }

    function set_comPercentage($comPercentage) {
        $this->comPercentage = $comPercentage;
    }
    function get_comPercentage() {
        return $this->comPercentage;
    }

    function set_taxRate($taxRate) {
        $this->taxRate = $taxRate;
    }
    function get_taxRate() {
        return $this->taxRate;
    }

    function set_bonus($bonus) {
        $this->bonus = $bonus;
    }
    function get_bonus() {
        return $this->bonus;
    }
}
?>