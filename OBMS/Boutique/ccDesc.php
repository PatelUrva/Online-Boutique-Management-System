<?php include './connection.php'; ?>
<?php ob_start(); ?>

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
        } else {include './header.php';}
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
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.4.3.min.js"></script>

     <style>
body {font-family: Arial, Helvetica, sans-serif;}

#myImg,#myImg1 {
  border-radius: 5px;
  cursor: pointer;
}

#myImg,#myImg1:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.8); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 360px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: white;
  font-size: 40px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: white;
  text-decoration: none;
  cursor: pointer;
}

</style>

     </head>
<body >
    <?php
        $id=$_GET['id'];
    ?>
    <form action="#" method="post">
            <div class="col-md-1 column" style="margin-left: 230px">
                <table>
                    <tr>
                        <?php 
                                        $img = "SELECT LeftImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['LeftImage'];
                                        $image_src = "uploadLeftImage/".$image;
                                    ?>
                        <img id="myImg" onclick="onClick(this)" src="<?php echo $image_src?>" alt="" width="100px"/>
                    </tr>
                    <br> <br>
                    <tr>
                        <?php 
                                        $img = "SELECT FrontImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['FrontImage'];
                                        $image_src = "uploadFrontImage/".$image;
                                    ?>
                        <img id="myImg" onclick="onClick(this)" src="<?php echo $image_src?>" alt="" width="100px"/>
                    </tr>
                    <br> <br>
                    <tr>
                        <?php 
                                        $img = "SELECT BackImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['BackImage'];
                                        $image_src = "uploadBackImage/".$image;
                                    ?>
                        <img id="myImg" onclick="onClick(this)" src="<?php echo $image_src?>" alt="" width="100px"/>
                    </tr>
                </table>
               </div>
               
                <div id="myModal" class="modal" onclick="this.style.display='none'">
                    <span class="close">&times;</span>
                    <img class="modal-content" id="img01">
                </div>
                <div class="col-md-3" style="margin-left: 30px">
                        <?php 
                                        $img = "SELECT FrontImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['FrontImage'];
                                        $image_src = "uploadFrontImage/".$image;
                                    ?>
                        <img  src="<?php echo $image_src?>" alt="" width="330px"/>
                    </div>
                <div class="col-md-4" style="padding-left:50px;font-size: 22px">
                    <?php 
                        $desc = "SELECT Description FROM tblproduct where id='$id'";
                            $resdes = $con->query($desc);
                            if ($resdes->num_rows > 0 )
                            {
                                while ($row = $resdes->fetch_assoc())
                                { ?>
                                    <p style="color: black"> <b> <?php echo $row['Description'];?> </b> </p>
                                   <?php
                                }
                            }    
                     ?>
                </div>
        <br>
                <div class="col-md-4" style="padding-left:50px;font-size: 22px;padding-top: 50px">
                    Qty
                    <select name="qty" id="qty" style="width:100px;margin-left: 30px">
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                    </select>
               </div>
                 <div class="col-md-4" style="padding-left:50px;font-size: 22px;padding-top: 50px">
                    <?php 
                        $desc = "SELECT Price FROM tblproduct where id='$id'";
                            $resdes = $con->query($desc);
                            if ($resdes->num_rows > 0 )
                            {
                                while ($row = $resdes->fetch_assoc())
                                { 
                                    $prices=$row['Price'];
                                    ?>
                                    <p style="color: black;font-size: 22px"> Rs. <?php echo $prices;?> </p>
                                   <?php
                                }
                            }    
                     ?>
                </div>
                <div class="col-md-4" style="padding-left:50px;font-size: 22px;padding-top: 50px">
                    <?php 
                        $desc = "SELECT Size FROM tblproduct where id='$id'";
                            $resdes = $con->query($desc);
                            if ($resdes->num_rows > 0 )
                            {
                                while ($row = $resdes->fetch_assoc())
                                { 
                                    
                                    ?>
                                       <select name="size" style="width:100px">
                                         <?php
                                            $string=explode(',', $row['Size']);
                                    
                                            foreach($string as $i) 
                                            {
                                               echo '<option value="' .($i) . '">' . $i . '</option>';
                                            }
                                               ?>
                                        </select>
                                <?php
                                    
                                }
                            }    
                     ?>
                </div>
        <br> <br> <br>
                
                <div class="col-md-4" style="padding-left:50px;font-size: 22px;padding-top: 90px">
                    <button type="submit" name="addtocart" class="btn btn-default add-to-cart" style="background-color:orange;color: black"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                </div>
                
               </form>
    </body>
    <?php include './footer.php';?>
</html>
<?php
    if(isset($_POST['addtocart']))
    {
       
        if(isset($_SESSION['login_username']))
        {
        $cust="select * from tblcart where Customerid='$c_id' and status='ACTIVE'";
        $cusres= mysqli_query($con, $cust);
       if ($row3 = mysqli_fetch_assoc($cusres))
       {
           $cartid=$row3['cart_id'];
       }
        else
        {
            $tid="insert into tblcart(Customerid,status) values('$c_id','ACTIVE')";
            $tidres= mysqli_query($con, $tid);
            $cust="select * from tblcart where Customerid='$c_id' and status='ACTIVE'";
            $cusres= mysqli_query($con, $cust);
            if ($row3 = mysqli_fetch_assoc($cusres))
            {
                $cartid=$row3['cart_id'];
            }
        }  
        $sizesql="select Size from tblcarttransaction where Productid='$id' and cartid='$cartid'";
        $sizeres= mysqli_query($con, $sizesql);
        if ($sizerow= mysqli_fetch_assoc($sizeres))
        {
            $oldsize=$sizerow['Size'];
            echo $oldsize;
            $size=$_POST['size'];
            
                if($oldsize==$size)
                {
                    echo "<script>window.alert('Same size product already added to cart..Please increase quanity..!!') ;
                                      window.location.href='addtoCart.php'; </script>"; 
                }
                else
                {
                    $prices = "SELECT Price FROM tblproduct where id='$id'";
                    $resprice = mysqli_query($con, $prices);
                    while ($rows = mysqli_fetch_assoc($resprice))
                    { 
                        $price=$rows['Price'];
                        $qty=$_POST['qty'];
                        
                        if($qty==1)
                        {
                            $newprice=1*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==2)
                        {   
                            $newprice=2*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==3)
                        {
                            $newprice=3*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==4)
                        {
                            $newprice=4*$price;
                
                            
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==5)
                        {
                            $newprice=5*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else 
                        {
                
                        }
                    }
                }
            }
            else 
            {
                $size=$_POST['size'];
                $prices = "SELECT Price FROM tblproduct where id='$id'";
                $resprice = mysqli_query($con, $prices);
                while ($rows = mysqli_fetch_assoc($resprice))
                { 
                    $price=$rows['Price'];
                    $qty=$_POST['qty'];
                
                    if($qty==1)
                    {
                        $newprice=1*$price;
                
                            $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                            $resql= mysqli_query($con, $sql);
                            if($resql)
                             {
                                header("location:addtoCart.php");
                            }
                     }
                     else if($qty==2)
                     {   
                            $newprice=2*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==3)
                        {
                            $newprice=3*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==4)
                        {
                            $newprice=4*$price;
                
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else if($qty==5)
                        {
                            $newprice=5*$price;
                
                            
                                $sql="insert into tblcarttransaction(cartid,Productid,Size,Quantity,Total_Amount,status) values($cartid,$id,'$size',$qty,$newprice,'ACTIVE')";
                                $resql= mysqli_query($con, $sql);
                                if($resql)
                                {
                                    header("location:addtoCart.php");
                                }
                        }
                        else 
                        {
                
                        }                
                }
            }
        }
        else 
        {
            echo "<script>window.alert('Please Login First..!!') ;
                                      window.location.href='login.php'; </script>"; 
        }
    }
?>
<?php ob_flush(); ?>