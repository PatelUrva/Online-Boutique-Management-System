<?php ob_start();?>
<?php include './connection.php';?>
<?php

    require './PHPMailer.php';
    require './Exception.php';
    require './SMTP.php';
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<?php session_start(); ?>
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
 <center>
     <div id="contact-page" class="container" style="padding-top: 40px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 300px">
                        <h2 class="title text-center">Forgot Password</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" id="main-contact-form" autocomplete="off" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email Address">
                            </div> 
                            
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="submit" name="btnSend" class="btn btn-primary pull-right" value="SEND EMAIL">
                            </div>
                        </form>
                    </div>	
                </div>
            </div>
        </div>
   </center>
</body>
</html>
<?php include './footer.php';?>
<?php
function generateNumericOTP($n) 
{ 

    $generator = "1357902468"; 
    $result = ""; 
    for ($i = 1; $i <= $n; $i++) 
    { 
        $result .= substr($generator, (rand()%(strlen($generator))), 1); 
    } 
    return $result;
} 
  $n = 6; 
?> 
        <?php
        
        if(isset($_POST['btnSend']))
        {
        $emai=$_POST['email'];
        $mail=new PHPMailer();
        $mail->isSMTP();
        $mail->Host="smtp.gmail.com";
        $mail->SMTPAuth="true";
        $mail->SMTPSecure="tls";
        $mail->Port="587";
        $mail->Username="18bmiit099@gmail.com";
        $mail->Password="Urva818pp";
        $mail->Subject="Check Mail";
        $mail->setFrom("18bmiit099@gmail.com");
        $mail->Body="Your OTP by FOF is:".generateNumericOTP($n);
        $mail->addAddress($emai);

        if($mail->send())
        {
            echo"mail sent".$mail->ErrorInfo;
            header('location:otp.php');
        }
        else
        {
            echo"Not sent";    
        }
            $mail->smtpClose();}
    ?>
