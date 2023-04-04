<?php include './connection.php'?>

<?php 
    session_start();
    if(empty($_SESSION["login_username"]))
    {
        header("location:login.php");
    }
?>
<?php  include './welcomeheader.php'; ?>
<!DOCTYPE html>
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
   <center>
            <div id="contact-page" class="container" style="font-size: 20px">
                <div style="padding-left:10px;padding-top:30px">
                    <i class="fa fa-user-circle fa-5x"></i>
                </div>
                <table>
                    <tr>
                        <td> <label> Name  </label> </td>
                        <td style="padding-left: 15px">:</td>
                        <td style="padding-left: 20px"> 
                            <?php
                                $username=$_SESSION["login_username"];
                                $sql="select fname from tblcustomer where emailid='$username' and status='ACTIVE'";
                                $res= mysqli_query($con, $sql); 
                                while($row = mysqli_fetch_row($res))
                                {
                                    ?>
                                	      <label> <?php echo $data=$row[0];?> </label>
                                     <?php 
                                     
                                } 
                                ?> 
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Email Address  </label> </td>
                        <td style="padding-left: 15px">:</td>
                        <td style="padding-left: 20px"> 
                            <?php
                                $username=$_SESSION["login_username"];
                                $sql="select emailid from tblcustomer where emailid='$username' and status='ACTIVE'";
                                $res= mysqli_query($con, $sql); 
                                while($row = mysqli_fetch_row($res))
                                {
                                    ?>
                                	      <label> <?php echo $data=$row[0];?> </label>
                                     <?php 
                                     
                                } 
                                ?> 
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Contact Number  </label> </td>
                        <td style="padding-left: 15px">:</td>
                        <td style="padding-left: 20px"> 
                            <?php
                                $username=$_SESSION["login_username"];
                                $sql="select contactno from tblcustomer where emailid='$username' and status='ACTIVE'";
                                $res= mysqli_query($con, $sql); 
                                while($row = mysqli_fetch_row($res))
                                {
                                    ?>
                                	      <label> <?php echo $data=$row[0];?> </label>
                                     <?php 
                                     
                                } 
                                ?> 
                        </td>
                    </tr>
                    <tr>
                        <td> <label> Date of Birth  </label> </td>
                        <td style="padding-left: 15px">:</td>
                        <td style="padding-left: 20px"> 
                            <?php
                                $username=$_SESSION["login_username"];
                                $sql="select dob from tblcustomer where emailid='$username' and status='ACTIVE'";
                                $res= mysqli_query($con, $sql); 
                                while($row = mysqli_fetch_row($res))
                                {
                                    ?>
                                	      <label> <?php echo $data=$row[0];?> </label>
                                     <?php 
                                     
                                } 
                                ?> 
                        </td>
                    </tr>
                </table>
                <div class="main" style="padding-left: 150px;margin-top: 20px">
                    <button onclick="document.location.href='update.php'" class="btn" style="background-color: orange"><i class="fa fa-edit fa-2x"></i></button>
                	<button onclick="document.location.href='delete.php'" class="btn" style="background-color: orange"><i class="fa fa-trash fa-2x"></i></button>
                </div> 
            </div>
    </center>
   </body>
</html>
