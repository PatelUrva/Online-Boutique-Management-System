<?php ob_start();?>
<?php include './connection.php';?>
<!DOCTYPE html>
<?php 
    session_start();
    if(empty($_SESSION["login_username"]))
    {
        header("location:login.php");
    }
?>
<html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Fashion Boutique</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="css/main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
    <body>
        <?php include './header.php';?>
        <form action="#" method="post" autocomplete="off">
    <center>
        <div id="contact-page" class="container">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 300px">
                        <h2 class="title text-center">Reset Password</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Address">
                            </div>       
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="password" name="newpass" class="form-control" required="required" placeholder="New Password">
                            </div> 
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="password" name="confirmpass" class="form-control" required="required" placeholder="Confirm Password">
                            </div> 
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="submit" name="btnReset" class="btn btn-primary pull-right" value="RESET PASSWORD">
                            </div>
                    </div>	
                </div>
                </center>
</form>
    </body>
</html>
<?php include './footer.php';?>
<?php
    if(isset($_POST['btnReset']))
    {
        $confirmpass=$_POST['confirmpass'];
        $newpass=$_POST['newpass'];
        $email=$_POST['email'];
        
        $sql="update tblcustomer set password='$confirmpass' where emailid='$email'";
        $sql1="select password from tblcustomer where emailid='$email'";
        $sql2="update tbluser set password='$confirmpass' where username='$email'";
        $res= mysqli_query($con, $sql1);
       
        while($row = mysqli_fetch_row($res))
        {
            if($newpass == $confirmpass)
                {
                    if($con->query($sql) == TRUE)
                    {
                         if($con->query($sql2) == TRUE)
                         {
                            echo "<script>window.alert('Password reset successfully !!') </script>";
                         }
                    }   
                    else 
                    {
                        echo "<script>window.alert('Password not reset !!') </script>";
                    }
                }
                else 
                {
                    echo "<script>window.alert('New Password and Confirm Password does not match !!') </script>";
                }
        }
    }
?>