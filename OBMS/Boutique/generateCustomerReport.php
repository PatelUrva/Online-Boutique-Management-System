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
            $this->Cell(80,15,'Customer Report',1,0,'C');
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
$select = "SELECT fname, lname, address,pincode,gender,contactno,emailid,status FROM tblcustomer where status='ACTIVE'";
$result = $con->query($select);
$pdf = new PDF('P','mm',array(900,370));
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('times','B',12);

$pdf->Cell(30,10,'First Name',1);
$pdf->Cell(30,10,'Last Name',1);
$pdf->Cell(100,10,'Address',1);
$pdf->Cell(20,10,'Pincode',1);
$pdf->Cell(30,10,'Gender',1);
$pdf->Cell(35,10,'Contact Number',1);
$pdf->Cell(40,10,'Email Address',1);
$pdf->Cell(30,10,'Status',1);
$pdf->Ln();

while($row = $result->fetch_object())
    {
        $pdf->SetFont('times','I',12);
        
        $fname = $row->fname;
        $lname = $row->lname;
        $addres= $row->address;
        $pin = $row->pincode;
        $gender = $row->gender;
        $contact = $row->contactno;   
        $email= $row->emailid;
        $status = $row->status;
            
        
        $pdf->Cell(30,10,$fname,1);
        $pdf->Cell(30,10,$lname,1);
        $pdf->Cell(100,10,$addres,1);
        $pdf->Cell(20,10,$pin,1);
        $pdf->Cell(30,10,$gender,1);
        $pdf->Cell(35,10,$contact,1);
        $pdf->Cell(40,10,$email,1);
        $pdf->Cell(30,10,$status,1);
        $pdf->Ln();
}
ob_end_clean();
$pdf->Output();
?>