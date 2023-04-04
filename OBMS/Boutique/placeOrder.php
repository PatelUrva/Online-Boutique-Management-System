<?php include './connection.php'; ?>


<?php 
    session_start();
    if(isset( $_SESSION["login_username"]))
        {
            $username=$_SESSION["login_username"];
            $sql="select id from tblcustomer where emailid='$username'";
            $res= mysqli_query($con, $sql);              
            while($row = mysqli_fetch_row($res))
            {
                $c_id=$row[0];
                include './welcomeheader.php';
            }
        }
 else {include './header.php';}
    ob_start();?>
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
        <form action="editDeliveryAddress.php" method="post">
       <div id="contact-page" class="container" style="margin-left: 300px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Select Delivery Address</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <?php 
                        if(isset( $_SESSION["login_username"]))
                        {
                            $username=$_SESSION["login_username"];
                            $sql="select id from tblcustomer where emailid='$username'";
                            $res= mysqli_query($con, $sql);              
                            while($row = mysqli_fetch_row($res))
                            {
                                    $cusid=$row[0];
                                    
                                    $addsql="select * from tblcustomerordermaster where Customerid='$cusid'";
                                    $addres= mysqli_query($con, $addsql);
                                    while ($row1 = mysqli_fetch_array($addres)) 
                                    {
                                        $fname=$row1['Full_Name'];
                                        $deladdress=$row1['Shipping_address'];
                                        $_SESSION['deladdress']=$deladdress;
                                        ?>
                                         
                                        <label style="font-size: 20px;margin-left: 25px;font-style:bold;margin-top: 0px"> <?php echo $fname; ?> </label> <br>
                                        <input type="radio" name="deladress" value="<?php echo $deladdress; ?>" style="margin-left: 0px;"/> 
                                        <label style="font-size: 16px;margin-left: 10px"> <?php echo $deladdress; ?> </label>
                                        <br>
                                        <br>
                                        <input type="submit" name="editadd" value="Edit Address" class="btn btn-dager" style="background-color: lightgray;color: black;margin-left: 20px"/>
                                        
                                        <br> <br> <br>
                                        <?php
                                    }
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <a href="payIndex.php"  name="deladd"  class="btn btn-dager" style="background-color: lightgray;color: black;margin-left: 347px">Deliver to this Address</a>
        <div  style="margin-left: 349px;padding-top:50px">
            <a href="deliveryAddress.php" class="btn btn-prmary" style="background-color: orange;color: white">Add New Address</a>
        </div>
    </body>
</html>
<?php 
    include './footer.php';
    ob_flush();
?>