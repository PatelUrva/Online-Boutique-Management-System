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
            $this->Cell(80,15,'Customer Order Report',1,0,'C');
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
$select = "select m.no,m.Full_Name,m.Mobile_Number,o.order_datetime,o.delivery_datetime,m.Shipping_address,
                ct.city_name,m.pincode,m.status from tblcustomerordermaster m
                    INNER JOIN tblcustomerorder o ON
                        m.Customerid=o.Customerid
                     INNER JOIN tblcity ct ON
                        m.Cityid=ct.city_id    
                        ORDER BY m.no ASC";
$result = $con->query($select);
$pdf = new PDF('P','mm',array(900,370));
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('times','B',12);

$pdf->Cell(30,10,'Full Name',1);
$pdf->Cell(40,10,'Mobile Number',1);
$pdf->Cell(35,10,'Order DateTime',1);
$pdf->Cell(38,10,'Delivery DateTime',1);
$pdf->Cell(110,10,'Shipping Address',1);
$pdf->Cell(20,10,'City',1);
$pdf->Cell(20,10,'Pincode',1);
$pdf->Cell(30,10,'Status',1);
$pdf->Ln();

while($row = $result->fetch_object())
    {
        $pdf->SetFont('times','I',12);
        
        $fname = $row->Full_Name;
        $mobile = $row->Mobile_Number;
        $order = $row->order_datetime;
        $del = $row->delivery_datetime;
        $addres = $row->Shipping_address;
        $city = $row->city_name;   
        $pin = $row->pincode;
        $status = $row->status;
            
        
        $pdf->Cell(30,10,$fname,1);
        $pdf->Cell(40,10,$mobile,1);
        $pdf->Cell(35,10,$order,1);
        $pdf->Cell(38,10,$del,1);
        $pdf->Cell(110,10,$addres,1);
        $pdf->Cell(20,10,$city,1);
        $pdf->Cell(20,10,$pin,1);
        $pdf->Cell(30,10,$status,1);
        $pdf->Ln();
}
ob_end_clean();
$pdf->Output();
?>