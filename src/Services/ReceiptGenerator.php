<?php

require('fpdf.php');

class ReceiptGenerator extends FPDF {
    public function header() {
        // Logo
        $this->Image('logo.png',10,8,33);
        $this->Cell(80);
        $this->SetFont('Arial','B',15);
        $this->Cell(30,10,'Payment Receipt',0,1,'C');
        $this->Ln(10);
    }

    public function footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

    public function generateReceipt($customerName, $amount, $date) {
        // Add a new page
        $this->AddPage();
        $this->SetFont('Arial','',12);

        $this->Cell(0,10,'Customer Name: '.$customerName,0,1);
        $this->Cell(0,10,'Amount Paid: $'.$amount,0,1);
        $this->Cell(0,10,'Date: '.$date,0,1);
        $this->Ln(10);
        $this->Cell(0,10,'Thank you for your payment!',0,1,'C');
    }
}

?>