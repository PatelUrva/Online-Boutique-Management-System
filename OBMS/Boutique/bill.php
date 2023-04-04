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
        <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            $sql="select * from tblcustomerorder where Customerid='$c_id'";
            $sqlres= mysqli_query($con, $sql);
            while($row = mysqli_fetch_assoc($sqlres))
            {
                $billno=$row['Billno'];
                $qty=$row['Quantity'];
                $amt=$row['Amount'];
                $orderdate=$row['order_datetime'];
            }
            
            $sql1="select * from tblcustomerordermaster where Customerid='$c_id'";
            $sqlres1= mysqli_query($con, $sql1);
            while($row1 = mysqli_fetch_assoc($sqlres1))
            {
                
                $shipaddress=$row1['Shipping_address'];
                $pincode=$row1['pincode'];
            }
            
            $sql2="select * from tblcart where Customerid='$c_id' and status='ACTIVE'";
            $sqlres2= mysqli_query($con, $sql2);
            while($row2 = mysqli_fetch_assoc($sqlres2))
            {
                $cartid=$row2['cart_id'];
                $total=$row2['Payable_Amount'];
            
            $billdate=$today=date("Y-m-d");
        ?>
        <div style="margin-left: 875px;font-size: 20px">
            Invoice Number : 
            <?php echo "<b>". $billno. "</b>" ?> 
        </div>
        <br>
        <div style="margin-left: 895px;font-size: 20px">
            Invoice Date  :
            <?php echo "<b>". $billdate. "</b>" ?> 
        </div>
        <br>
        <div style="margin-left: 895px;font-size: 20px">
            Order Date : 
                <?php echo "<b>". $orderdate. "</b>" ?> 
        </div>
        <br>
        <div style="margin-left: 250px;font-size: 20px">
            Shipping Address : 
            <?php echo "<p> <b>". $shipaddress.','.$pincode. "</b> </p>" ?> 
        </div>
        <hr size="30">
        <table border="2px solid" style="margin-left:250px;margin-top: 20px;font-size: 20px">
            <tr>
                <th> Product </th>
                <th> Quantity </th>
                <th> Actual Price </th>
                <th> Total Amount </th>
            </tr>
            
                <?php
                    $sql3="select * from tblcarttransaction where cartid='$cartid' and status='ACTIVE'";
                $sqlres3= mysqli_query($con, $sql3);
                $res=array();
                while($row3 = mysqli_fetch_assoc($sqlres3))
                {
                    $res[]=$row3;
               }
               foreach ($res as $list)
               {
                    $id=$list['Productid'];
                    $pqty=$list['Quantity'];
                    $price=$list['Total_Amount'];
                    
                    $sql4="select * from tblproduct where id='$id'";
                    $sqlres4= mysqli_query($con, $sql4);
                    $row4 = mysqli_fetch_array($sqlres4);
                    
                    $pdesc = $row4['Description'];
                    $amt=$row4['Price'];
                
                ?>
            <tr>
                <td> <?php echo $pdesc; ?> </td>
                <td> <?php echo $pqty; ?> </td>
                <td> <?php echo $amt; ?> </td>
                <td> <?php echo $price; ?> </td>
                <?php
                }
                ?>
            </tr>
            
        </table>
        <br>
        <div style="margin-left: 1000px;font-size: 20px">
            <label> Payable Amount : <?php echo $total;?> </label>
        </div>
        <?php
            $transid= isset($_GET['transid'])?$_GET['transid']:'';
        
            if($transid>0)
            {
                $sqldel="update tblcarttransaction set status='DEACTIVE' where cartid='$cartid'";
                $delres= mysqli_query($con, $sqldel);
               
                
            }
            else
            {
                $sqldel="update tblcarttransaction set status='DEACTIVE' where cartid='$cartid'";
                $delres= mysqli_query($con, $sqldel);
                
                $del="update tblcart set status='DEACTIVE' where cart_id='$cartid'";
                $resdel= mysqli_query($con, $del);
            }
         }
        ?>
    </center>
    </body>
</html>
