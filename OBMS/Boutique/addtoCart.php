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
             
                                    
                $sql="select c.cart_id,ct.cart_trans_id,ct.Size,ct.Productid,c.Customerid,ct.cart_trans_id,p.Price,ct.cartid,ct.Total_Amount,ct.Quantity,pi.FrontImage,p.Description 
                            from tblcarttransaction ct
                        INNER JOIN tblproduct p ON
                            ct.Productid= p.id 
                        INNER JOIN tblproductimage pi ON
                            p.id=pi.Productid
                        INNER JOIN tblcart c ON
                            ct.cartid=c.cart_id where c.Customerid='$custid' and ct.status='ACTIVE'";
                $sqlres= mysqli_query($con, $sql);  
            if($sqlres->num_rows==0)
            {
                echo "<center> <h2 style='padding-top:120px'> Cart is Empty!!.. </h2> </center>";
                 
                ?>
                <center>        
                    <input type="button" style="background-color: orange;width: 150px;color: white" onclick="location.href='welcome.php'" value="Contine Shopping !!.. "/>
                </center>    
            <?php
            }
            else
            {
        ?>
<div class="container" style="padding-left:255px;margin-top: 0px;font-size: 15px;width: 1500px"> 
    <div class="row">
        <table border="3px">
           <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Selected Quantity</th>
                        <th>Size</th>
                        <th>Amount</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
            <?php 
                                  
                while($rows= mysqli_fetch_array($sqlres))
                {
                    $pid=$rows['Productid'];
                    $amt=$rows['Price'];
                    $totalamt=$rows['Total_Amount'];
                    $size=$rows['Size'];
                    $qty=$rows['Quantity'];
                    $desc=$rows['Description'];
                    $cid=$rows['cartid'];
                    $tcid=$rows['cart_trans_id'];
                    $ctid=$rows['cart_id'];
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
                        </td>
                        <td>
                            <input type="hidden" value="<?php echo $tcid; ?>" name="crtid"/>
                   
                            <select name="quantity" id="qty">
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                            </select>
                   
                        </td>
                        <td style="text-align:center">
                            <?php echo $qty; ?>
                        </td>
                        <td style="text-align:center">
                            <?php echo $size; ?>
                        </td>
                        <td style="text-align:center">
                            <?php echo $amt; ?>
                        </td>
                        <td style="text-align:center">
                            <?php 
                                echo $totalamt; 
                                $sum=$sum+$totalamt;  //payable amount
                            ?>
                            <input type="hidden" value="<?php echo $tcid; ?>" name="transid"/>
                            
                        </td>
                        <td>
                            <input class="btn btn-primary" type="submit" name="update" value="Update"/>
                            <input class="btn btn-danger" type="submit" name="delete" value="Delete"/>
                        <?php
                            if(isset($_POST['delete']))
                            {
                                $cmd=$_POST['transid'];
                               
                                $delete="delete from tblcarttransaction where cart_trans_id='$cmd'";
                                $deleteres= mysqli_query($con, $delete);
                                header("location:addtoCart.php");
                            }   
                           else if(isset($_POST['update']))
                            {
                               $cmd=$_POST['transid'];
                               $amts="select p.Price,c.cart_trans_id from tblproduct p INNER JOIN tblcarttransaction c ON c.Productid=p.id where id='$pid' and cart_trans_id='$cmd' ";
                               $amtsres= mysqli_query($con, $amts) ;
                               while ($amtsrow= mysqli_fetch_assoc($amtsres))
                               {
                                    $amount=$amtsrow['Price'];
                                    $qtys=$_POST['quantity']; 
                                    $finalamt=$amount*$qtys;
                                    echo $finalamt."<br>";
                                    echo $qtys."<br>";
                                    echo $amt."<br>";
                                    
                                    $update="update tblcarttransaction set Quantity='$qtys',Total_Amount='$finalamt' where cart_trans_id='$cmd'";
                                    $updateres= mysqli_query($con, $update);
                                    header("location:addtoCart.php");
                               }
                            }
                        ?>
                        </td>
                    </tr>
                    </form>
                    
                <?php
             }?>
                </table>
                <div style="margin-left: 0px; padding-top: 20px">
                    <a class="btn btn-primary" href="placeOrder.php">Place Order</a>
                    
                    <b class=" btn btn-success"style="margin-left: 700px">
                        Payable Amount :- <?php echo $sum; ?> </b>
                    <?php 
                        $sqlamt="update tblcart set Payable_Amount='$sum' where cart_id='$ctid'";
                        $amtres= mysqli_query($con, $sqlamt);
             }}
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