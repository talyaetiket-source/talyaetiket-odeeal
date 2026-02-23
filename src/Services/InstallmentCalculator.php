<?php

class InstallmentCalculator {
    private $principal;
    private $interestRate;
    private $term;

    public function __construct($principal, $interestRate, $term) {
        $this->principal = $principal;
        $this->interestRate = $interestRate;
        $this->term = $term;
    }

    public function calculateMonthlyInstallment() {
        $monthlyRate = $this->interestRate / 100 / 12;
        $numberOfPayments = $this->term * 12;
        return ($this->principal * $monthlyRate) / (1 - pow(1 + $monthlyRate, -$numberOfPayments));
    }

    public function calculateTotalPayment() {
        return $this->calculateMonthlyInstallment() * $this->term * 12;
    }

    public function calculateTotalInterest() {
        return $this->calculateTotalPayment() - $this->principal;
    }
}

// Example usage:
// $calculator = new InstallmentCalculator(10000, 5, 2); // $10,000 loan, 5% interest, 2 years
// echo 'Monthly Installment: ' . $calculator->calculateMonthlyInstallment();
// echo 'Total Payment: ' . $calculator->calculateTotalPayment();
// echo 'Total Interest: ' . $calculator->calculateTotalInterest();
?>