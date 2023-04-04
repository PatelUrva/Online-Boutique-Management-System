<?php 
    include './connection.php';
    
?>
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
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div id="contact-page" class="container" style="padding-top: 40px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 350px">
                        <h2 class="title text-center" >MAKE PAYMENT</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>
<?php
    
            $order="select * from tblcustomerordermaster where Customerid='$c_id'";
            $orderres= mysqli_query($con, $order);
            while($row = mysqli_fetch_assoc($orderres))
            {
                $orderid=$row['no'];
            
                $cart="select * from tblcart where Customerid='$c_id' and status='ACTIVE'";
                $cartres= mysqli_query($con, $cart);
                while($row1 = mysqli_fetch_assoc($cartres))
                {
                    $cartid=$row1['cart_id'];
                    $amt=$row1['Payable_Amount'];
                    $payDesc='COD';
                    $status='Pending';
                
                    $qtysql="select * from tblcarttransaction where cartid='$cartid' and status='ACTIVE'";
                    $qtyres= mysqli_query($con, $qtysql);
                    $rows= mysqli_num_rows($qtyres);
                    $qty=$rows;
                
                    function billNumber($length = 25) 
                    {
                        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        for ($i = 0; $i < $length; $i++) 
                        {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        return $randomString;
                    }
                    $billno = billNumber(7);
                    $orderdate = date("Y-m-d");
                    $deldate=Date('y:m:d', strtotime($orderdate.'+5 days'));
                    
                    $sqlinsert="insert into tblcustomerorder(Billno,Orderno,Customerid,Cartid,Quantity,Amount,PaymentDesc,order_datetime,delivery_datetime,Status,order_status) values('$billno','$orderid','$c_id','$cartid','$qty','$amt','$payDesc','$orderdate','$deldate','$status','Pending')";
                    if($con->query($sqlinsert) == TRUE)
                    {
                        ?>
                        <center>
                            <label style="margin-top: 50px;font-size: 20px;color: green;background-color: lightgreen">Your Order has been Successfully Placed !!..</label>
                            <br> <br>
                            <a href="bill.php" class="btn btn-primary">View Invoice</a>
                        </center>
                   <?php
                    
                }
            }
        }
    ?>
<br> <br> <br> <br> <br> <br>
<?php
    ob_flush(); 
?>