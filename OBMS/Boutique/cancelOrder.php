<?php ob_start();?>
<?php include './connection.php';?>

<?php 
    session_start();
   
?>                     
<?php
$id=$_GET['Serialno'];
$del= mysqli_query($con, "update tblcustomerorder set order_status='Cancelled' where Serialno='$id'");
if($del)
{
    header("location:history.php");
    exit;
    
}
else
{
    echo "<script> window.alert('Error in deleting') </script>";
    header("location:history.php");
}
?>
<?phpob_flush();?>
