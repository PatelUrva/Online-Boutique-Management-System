<?php ob_start();?>
<?php include './connection.php';?>

<?php 
    session_start();
   
?>                     
<?php
$id=$_GET['id'];
$status=$_GET['status'];
if($status=="ACTIVE")
{
       $del= mysqli_query($con, "update tblproduct set status='DEACTIVE' where id='$id'");
       if($del)
       {
           header("location:Product_View_Page.php");
            exit;
       }
       else
       {
           echo "<script> window.alert('Error in deleting') </script>";
           header("location:Product_View_Page.php");
       }
}
if($status=="DEACTIVE")
{
       $del= mysqli_query($con, "update tblproduct set status='ACTIVE' where id='$id'");
       if($del)
       {
           header("location:Product_View_Page.php");
            exit;
       }
       else
       {
           echo "<script> window.alert('Error in deleting') </script>";
           header("location:Product_View_Page.php");
       }
}
?>
<?phpob_flush();?>
