<?php ob_start();?>
<?php include './connection.php';?>
<?php include './sideheader.php';?>
<?php 
    session_start();
    
?>
<?php
$no=$_GET['no'];
$status=$_GET['status'];
if($status=="Pending")
{
       $del= mysqli_query($con, "update tblcustomerordermaster set status='Delivered' where no='$no'");
       if($del)
       {
           header("location:Customer_View_Order.php");
            exit;
       }
       else
       {
           echo "<script> window.alert('Error in deleting') ;
           window.location.href='Customer_View_Order.php'; </script>"; 
       }
}
if($status=="Delivered")
{
       $del= mysqli_query($con, "update tblcustomerordermaster set status='Pending' where no='$no'");
       if($del)
       {
           header("location:Customer_View_Order.php");
            exit;
       }
       else
       {
           echo "<script> window.alert('Error in deleting') ;
           window.location.href='Customer_View_Order.php'; </script>"; 
       }
}
?>
<?phpob_flush();?>