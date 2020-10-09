<?php
class Client{
  // Properties
  public $name;
  public $email;
  public $commission;
  public $payroll;

  public function __construct($name, $email, $commission, $payroll) {
        $this->name = $name;
        $this->email = $email;
        $this->commission = $commission;
        $this->payroll = $payroll;
    }

    // Methods
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }

    function set_email($email) {
        $this->email = $email;
    }
    function get_email() {
        return $this->email;
    }

    function set_commission($commission) {
        $this->commission = $commission;
    }
    function get_commission() {
        return $this->commission;
    }
    function set_payroll($payroll) {
        $this->payroll = $payroll;
    }
    function get_payroll() {
        return $this->payroll;
    }
}
?>