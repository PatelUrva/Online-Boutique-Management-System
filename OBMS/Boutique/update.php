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
                    <div class="contact-form"  style="margin-left: 350px">
                        <h2 class="title text-center" >UPDATE ACCOUNT</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" id="main-contact-form" class="contact-form row" autocomplete="off" name="contact-form" method="post">
                            <div class="form-group col-md-10">
                                <input name="email" type="email" required class="form-control" placeholder="Email Address"></textarea>
                            </div> 
                            <div class="form-group col-md-10">
                                <input type="number" name="mobile" class="form-control" required="required" placeholder="Contact Number">
                            </div>       
                            <div class="form-group col-md-10">
                                <textarea name="address" id="message" required class="form-control" placeholder="Residential Address" style="height: 80px"></textarea>
                            </div> 
                            <div class="form-group col-md-10">
                                <input type="submit" name="btnUpdate" class="btn btn-primary pull-right" value="UPDATE ACCOUNT">
                            </div>
                        </form>
                    </div>	
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['btnUpdate']))
    {
        $mobile=$_POST['mobile'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        
        $sql="update tblcustomer set contactno='$mobile',address='$address' where emailid='$email'";
        $result= mysqli_query($con, $sql);
        if($result)
        {
            echo "<script>window.alert('Account Updated !!')</script>";
        }
        else 
        {
            echo "<script>window.alert('Account Not Updated !!')</script>";
        }
    }
?>
<?php include './footer.php'?>
<?phpob_flush();?>