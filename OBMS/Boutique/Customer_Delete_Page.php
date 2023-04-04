<?php ob_start();?>
<?php include './connection.php';?>
<?php include './sideheader.php';?>
<?php 
    session_start();
    
?>
<?php
 $id=$_GET['id'];
$status=$_GET['status'];
if($status=="ACTIVE")
{
       $del= mysqli_query($con, "update tblcustomer set status='DEACTIVE' where id='$id'");
       if($del)
       {
           header("location:Customer_View_Page.php");
            exit;
       }
       else
       {
           echo "<script> window.alert('Error in deleting') </script>";
           header("location:Customer_View_Page.php");
       }
}
if($status=="DEACTIVE")
{
       $del= mysqli_query($con, "update tblcustomer set status='ACTIVE' where id='$id'");
       if($del)
       {
           header("location:Customer_View_Page.php");
            exit;
       }
       else
       {
           echo "<script> window.alert('Error in deleting') </script>";
           header("location:Customer_View_Page.php");
       }
}
?>
<?phpob_flush();?>