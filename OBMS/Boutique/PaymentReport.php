<?php
include 'pdf/fpdf.php';
// Database Connection 
include './connection.php';
//Check for connection error
if($con->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$con->connect_error);    
}

class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Logo
            $this->Image('images/logo.png',10,3,50);
            $this->SetFont('Arial','B',15);
            // Move to the right
            $this->Cell(130);
             // Title
            $this->Cell(80,15,'Payment Report',1,0,'C');
            // Line break
            $this->Ln(50);
        }   
        function Footer()
        {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
   
// Select data from MySQL database
$select = "select o.Full_Name,o.Mobile_Number,p.order_datetime,p.delivery_datetime,o.Shipping_address,
                    o.pincode,c.emailid,p.Billno,p.Quantity,p.Amount,p.PaymentDesc,p.Status
                    from tblcustomerorder p
                    INNER JOIN tblcustomer c ON
                        p.Customerid=c.id
                     INNER JOIN tblcustomerordermaster o ON
                        p.Orderno=o.no
                        ORDER BY p.Serialno ASC";
$result = $con->query($select);
$pdf = new PDF('P','mm',array(900,400));
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('times','B',12);

$pdf->Cell(22,10,'Full Name',1);
$pdf->Cell(32,10,'Mobile Number',1);
$pdf->Cell(33,10,'Order DateTime',1);
$pdf->Cell(36,10,'Delivery DateTime',1);
$pdf->Cell(100,10,'Shipping Address',1);
$pdf->Cell(18,10,'Pincode',1);
$pdf->Cell(37,10,'Email Address',1);
$pdf->Cell(24,10,'Bill Number',1);
$pdf->Cell(17,10,'Quantity',1);
$pdf->Cell(17,10,'Amount',1);
$pdf->Cell(28,10,'Payment Type',1);
$pdf->Cell(23,10,'Status',1);
$pdf->Ln();

while($row = $result->fetch_object())
    {
        $pdf->SetFont('times','I',12);
        
        $fname = $row->Full_Name;
        $mobile = $row->Mobile_Number;
        $order = $row->order_datetime;
        $del = $row->delivery_datetime;
        $addres = $row->Shipping_address;
        $pin = $row->pincode;
        $email = $row->emailid;
        $bill = $row->Billno;
        $qty = $row->Quantity;
        $amt= $row->Amount;
        $pay = $row->PaymentDesc;
        $status = $row->Status;
            
        
        $pdf->Cell(22,10,$fname,1);
        $pdf->Cell(32,10,$mobile,1);
        $pdf->Cell(33,10,$order,1);
        $pdf->Cell(36,10,$del,1);
        $pdf->Cell(100,10,$addres,1);
        $pdf->Cell(18,10,$pin,1);
        $pdf->Cell(37,10,$email,1);
        $pdf->Cell(24,10,$bill,1);
        $pdf->Cell(17,10,$qty,1);
        $pdf->Cell(17,10,$amt,1);
        $pdf->Cell(28,10,$pay,1);
        $pdf->Cell(23,10,$status,1);
        $pdf->Ln();
}
ob_end_clean();
$pdf->Output();
?>