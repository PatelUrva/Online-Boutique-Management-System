<?php include './connection.php'?>
<?php include './header.php';?>
<?php session_start(); 

?>
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
  <center>
      <div id="contact-page" class="container" style="padding-top: 35px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 300px">
                        <h2 class="title text-center">OTP</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="number" name="otp" class="form-control" placeholder="Enter OTP">
                            </div>           
                            <div class="form-group col-md-10" >
                                <input type="submit" name="btnDone" class="btn btn-primary pull-right" value="SUBMIT" style="margin-left: 70px">
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
    $otp = "";
    if (isset($_POST['Login'])) 
    {
        if (isset($_SESSION['email'])) 
        {
                    $sql = "select otp from login1 where emailid=" . $_SESSION['email'] . " order by id desc limit 0,1";
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0) 
                     {
                        while ($row = $result->fetch_assoc())
                         {
                            $otp =$row["otp"] . "<br/>";
                           $OTP1=$otp;
                        }
                    } 
                    else
                    {
                        echo "0 Result";
                    }
                }
                if ( $_POST['otp'] ===  $otp) 
                {
                    header("location:Ragistration.php");
                } 
                else
                {
                    echo "Invalid Otp..";
                }
        }
        ?>