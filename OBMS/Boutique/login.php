<?php ob_start();?>
<?php include './connection.php';?>

<!DOCTYPE html>
<?php session_start(); 
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
                    <div class="contact-form"  style="margin-left: 330px">
                        <h2 class="title text-center">Login</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" >
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="email" name="username" class="form-control" required placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" >
                            </div>
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                            </div>                  
                            <div class="form-group col-md-10" style="margin-left: 72px">
                                <input type="submit" name="btnlogin" class="btn btn-primary pull-right" value="LOGIN">
                            </div>
                            <div class="form-group col-md-10">
                                <h5 class="title text-center" style="margin-left: 72px;"> <a href="./forgotpass.php" >Forgot Password </a> | <a href="./resetpass.php"> Reset Password </a></h5>
                            </div>
                            <div class="form-group col-sm-10">
                                <h5 class="title text-center" style="margin-left: 80px;"> Registered User If Not ??<a href="./registration.php" > Click Here </a></h5>
                            </div>
                    </div>	
                </div>
                </center>
</form>
    </body>
</html>
<?php include './footer.php';?>
<?php 
    if(isset($_POST['btnlogin']))
    {
        $uname=$_POST['username'];
        $pass=$_POST['password'];
        
        $sql= "select * from tblcustomer where emailid= '$uname' and password= '$pass' and status='ACTIVE'";
        $sql1="select * from tblcustomer where emailid= '$uname' and status='DEACTIVATE' ";
        $result= mysqli_query($con, $sql);
        $res= mysqli_query($con, $sql1);
       
            if($uname == 'urupatel818@gmail.com' && $pass == 'urvap' || $uname == 'dhvanishah182001@gmail.com' && $pass == 'dhvani')
            {
                header('location:welcomeAdmin.php');
            }
            else if($res->num_rows > 0)
            {
                echo "<script>window.alert(' You are not a registered user.Please Register first!! ') </script>";
            }
            else if($result->num_rows == 0)
            {
                echo "<script>window.alert(' Username or Password is incorrect ') </script>";
            }
            else if ($result->num_rows > 0) 
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $_SESSION["login_username"]=$uname;
                    header('location:welcome.php');
                }
            }
            else 
            {
                echo "<script>window.alert(' Username or Password is incorrect ') </script>";
            }
        }
    mysqli_close($con);
?>
<?phpob_flush();?>