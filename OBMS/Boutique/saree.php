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
<br>

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
        <br>
        <br>
            <div class="col-sm-2">
            </div>
                                    
        <div class="col-sm-9 padding-right">
            <div class="features_items" style="margin-top: 50px"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    
                                    <?php
                                        $sql="select c.id, p.id,p.Price,p.Description from tblproduct p , tblpcategory c where c.cat_name='Sarees' and p.PCategoryid=c.id " ;
                                        $sqlres= mysqli_query($con, $sql) or die("Query error : " . mysqli_error($con));
                                        $res=array();
                                        while ($row = mysqli_fetch_assoc($sqlres))
                                        {
                                            $res[]=$row;
                                        }
                                        foreach ($res as $list)
                                        {
                                            $id=$list['id'];
                                            $price=$list['Price'];
                                            $des=$list['Description'];
                                            
                                            $img = "SELECT FrontImage FROM tblproductimage where Productid='$id'";
                                            $imgres = $con->query($img);
                                            $row = mysqli_fetch_array($imgres);

                                            $image = $row['FrontImage'];
                                            $image_src = "uploadFrontImage/".$image;
                                        
                                     ?>
                                        <div class="col-sm-4">
                                            <div class="product-image-wrapper">
                                                <div class="single-products">
                                                    <div class="productinfo text-center">
                                                        <a href="ccDesc.php?id=<?php echo $id;?>">
                                                            <img  src="<?php echo $image_src?>" alt="product image" width="390px" height="485px" />
                                                        </a>
                                                        <p style="color: orange;font-size: 27px;"> <b> <i class="fa fa-inr"></i>  <?php echo $price;?> </b> </p>
                                                        <p> <b> <?php echo $des;?> </b> </p>
                                                    </div>
                                                </div>
                                           </div>
                                       </div>
                                    <?php
                                        }
                                        ?>
                    </div>
                </div><!--features_items-->
            </div>
    </body>
</html>
<br>
<br>
<?php include './footer.php';?>