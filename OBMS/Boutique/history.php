<?php include './connection.php';?>
<?php 
    session_start();
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
    
    </head>
    <body>
       
        <?php 
            $sum=0;
             if(isset( $_SESSION["login_username"]))
             {
                                $username=$_SESSION["login_username"];
                                $custsql="select id from tblcustomer where emailid='$username'";
                                $custres= mysqli_query($con, $custsql);              
                                while($rowss = mysqli_fetch_row($custres))
                                {
                                    $custid=$rowss[0];
                                    include './welcomeheader.php';
                                }
             
                                    
                $sql="select ct.cartid,ct.Productid,c.Customerid,p.Description,ct.Size
                                from tblcarttransaction ct 
                            INNER JOIN tblcart c ON
                                ct.cartid=c.cart_id
                            INNER JOIN tblproduct p ON
                                ct.Productid=p.id
                            where  c.Customerid='$custid' and c.status='DEACTIVE'";
                $sqlres= mysqli_query($con, $sql);  
            if($sqlres->num_rows==0)
            {
                echo "<center> <h2 style='padding-top:120px'> No Order History!!.. </h2> </center>";
                 
                ?>
                <center>        
                    <input type="button" style="background-color: orange;width: 150px;color: white" onclick="location.href='welcome.php'" value="Contine Shopping !!.. "/>
                </center>    
            <?php
            }
            else
            {
        ?>
<div class="container" style="padding-left:400px;margin-top: 0px;font-size: 15px;width: 1500px"> 
    <div class="row">
        <table border="3px">
                
            <?php 
                                  
                while($rows= mysqli_fetch_array($sqlres))
                {
                    $pid=$rows['Productid'];
                    $size=$rows['Size'];
                    $desc=$rows['Description'];
                    $cid=$rows['cartid'];
                    
                ?>
                    <form method="post">
                    <tr>
                        <td>
                            <?php 
                                        $img = "SELECT FrontImage FROM tblproductimage where Productid='$pid'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['FrontImage'];
                                        $image_src = "uploadFrontImage/".$image;
                                    ?>
                            <a href="ccDesc.php?id=<?php echo $pid; ?>" > <img src="<?php echo $image_src?>" alt="" width="100px"/> </a>
                        </td>
                        <td>
                            <?php echo $desc;?>
                            <br> <label> Size: </label>
                            <?php echo $size; ?>
                            <br> 
                            <?php
                                $sqls="select o.Serialno,cts.cart_trans_id,cts.cartid,o.delivery_datetime,
                                              o.order_datetime ,o.order_status from tblcustomerorder o
                                                INNER JOIN tblcarttransaction cts ON
                                                    o.Cartid=cts.cartid where o.Cartid='$cid'";
                                $sqlsres= mysqli_query($con, $sqls);
                                while ($row1= mysqli_fetch_array($sqlsres))
                                {
                                    $serial=$row1['Serialno'];
                                    $date=$row1['delivery_datetime'];
                                    $time= strtotime($date);
                                    
                                    $day=date('D',$time);
                                    $dates= date('d',$time);
                                    $mon= date('M',$time);
                                    
                                    $orderstatus=$row1['order_status'];
                                }  
                                    if($orderstatus=='Pending')
                                    {
                                        ?>
                                           <label> Arriving By <?php echo $day.','.$dates.' '. $mon; ?> </label>
                                           <br> <br>
                                           
                                           <a href="cancelOrder.php?Serialno=<?php echo $serial; ?>" class="btn btn-danger">Cancel</a>
                                            
                                        <?php
                                    }
                                    if($orderstatus=='Delivered')
                                    {
                                        ?>
                                           <label> Delivered On <?php echo $day.','.$dates.' '. $mon; ?> </label>
                                           <br> <br>
                                           
                                           <a href="returnOrder.php?Serialno=<?php echo $serial; ?>&delivery_datetime=<?php echo $date; ?>" class="btn btn-danger">Return</a>
                                           
                                        <?php
                                    }
                                    if($orderstatus=='Cancelled')
                                    {
                                        ?>
                                           <label style="color:green"> Cancelled On <?php echo $day.','.$dates.' '. $mon; ?> </label>
                                           <br> <br>
                                        <?php
                                    }
                                    if($orderstatus=='Returned')
                                    {
                                        ?>
                                           <label style="color:green"> Return Confirmed </label>
                                           <br> <br>
                                        <?php
                                    }
                            ?>
                        </td>
                    </tr>
                    </form>
                    
                <?php
             }?>
                </table>
                    
                    <?php
             }
             }
             else
             {
                    header('location:login.php');
             }
?>
                </div>
            </div>
        </div>
   </body>
</html>
<br><br><br><br><br><br><br>
<?php include './footer.php';?>
<?php ob_flush();?>