<?php 
    session_start();
    if(empty($_SESSION["login_username"]))
    {
        header("location:login.php");
    }
?>
<?php ob_start();?>
<?php include './connection.php';?>
<!DOCTYPE html>
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
        <form action="forgotresetpass.php" method="post">
    <center>
        <div id="contact-page" class="container">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 300px">
                        <h2 class="title text-center">OTP</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="forgotresetpass.php" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="number" name="otp" class="form-control" placeholder="Enter OTP">
                            </div>           
                            <div class="form-group col-md-10" >
                                <input type="submit" name="btnDone" class="btn btn-primary pull-right" value="SUBMIT" style="margin-left: 70px">
                            </div>
                    </div>	
                </div>
                </center>
</form>
    </body>
</html>
<?php include './footer.php';?>