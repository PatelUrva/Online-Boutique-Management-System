<?php ob_start();?>
<?php include './connection.php';?>
<?php include './profile.php';?>
<?php 
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
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
    <body>
        <div id="contact-page" class="container" style="padding-top: 40px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 300px">
                        <h2 class="title text-center" style="margin-left: 90px">DELETE ACCOUNT</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" id="main-contact-form" class="contact-form row" name="contact-form" method="post" autocomplete="off">
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Address">
                            </div>           
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="submit" name="btnDelete" class="btn btn-primary pull-right" value="DELETE ACCOUNT">
                            </div>
                        </form>
                    </div>	
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['btnDelete']))
    {
        $email=$_POST['email'];
        $sql="update tblcustomer set status='DEACTIVATE' where emailid='$email'";
        $result= mysqli_query($con, $sql);
        if($result)
        {
            echo "<script>window.alert('Account Deleted !!')</script>";
            header('location:index.php');
        }
        else 
        {
            echo "<script>window.alert('Account Not Deleted !!')</script>";
        }
    }
?>
<?php include './footer.php'?>
<?phpob_flush();?>