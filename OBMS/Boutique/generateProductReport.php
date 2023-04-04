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
            $this->Cell(80,15,'Product Report',1,0,'C');
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
$select = "select p.id, pc.cat_name,f_type,c.c_name, p.Size, o.type, p.Price, p.Quantity, p.Description,p.status 
        from tblproduct p
            INNER JOIN tblpcategory pc ON
	p.PCategoryid=pc.id
             INNER JOIN tblfabric f ON
	p.Fabricid=f.id
             INNER JOIN tblcolor c ON
	p.Colorid=c.id
             INNER JOIN tbloccasion o ON
	p.Occasionid=o.id
             ORDER BY p.id ASC";
$result = $con->query($select);
$pdf = new PDF('P','mm',array(900,370));
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('times','B',12);

$pdf->Cell(30,10,'Category',1);
$pdf->Cell(170,10,'Product Description',1);
$pdf->Cell(25,10,'Fabric',1);
$pdf->Cell(20,10,'Color',1);
$pdf->Cell(40,10,'Size',1);
$pdf->Cell(20,10,'Price',1);
$pdf->Cell(20,10,'Quantity',1);
$pdf->Cell(30,10,'Status',1);
$pdf->Ln();

while($row = $result->fetch_object())
    {
        $pdf->SetFont('times','I',12);
        
        $cat_name = $row->cat_name;
        $des = $row->Description;
        $fabric = $row->f_type;
        $color = $row->c_name;
        $size = $row->Size;
        $price = $row->Price;   
        $qty = $row->Quantity;
        $status = $row->status;
            
        
        $pdf->Cell(30,10,$cat_name,1);
        $pdf->Cell(170,10,$des,1);
        $pdf->Cell(25,10,$fabric,1);
        $pdf->Cell(20,10,$color,1);
        $pdf->Cell(40,10,$size,1);
        $pdf->Cell(20,10,$price,1);
        $pdf->Cell(20,10,$qty,1);
        $pdf->Cell(30,10,$status,1);
        $pdf->Ln();
}
ob_end_clean();
$pdf->Output();
?>