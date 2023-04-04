<?php
include './connection.php';
?>

<html>
    <head>
       
 </head>
 <body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-9 padding-right">
            <div class="features_items" style="margin-top: 50px"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                   
                                    <?php
                                        $sql="select c.id, p.id,p.Price,p.Description from tblproduct p , tblpcategory c where
                                                    p.PCategoryid=c.id order by p.id asc limit 15" ;
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
                </div>
            </div>
        </div>
    </div>
</section>
 </body>
</html>
