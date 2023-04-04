<?php ob_start();?>
<?php include './connection.php';?>

<?php 
    session_start();
   
?>                     
<?php
$id=$_GET['Serialno'];
$orderdate=$_GET['delivery_datetime'];
$date=date('Y-m-d');

$deldate=Date('Y-m-d', strtotime($orderdate.'+5 days'));

if($date<$deldate)
{
    $del= mysqli_query($con, "update tblcustomerorder set order_status='Returned' where Serialno='$id'");
    if($del)
    {
        header("location:history.php");
        exit;
    }
}
else
{
    echo "<script> window.alert('You have crossed 5 days return policy') ;
                             window.location.href='history.php';  </script>";
}
?>
<?phpob_flush();?>
