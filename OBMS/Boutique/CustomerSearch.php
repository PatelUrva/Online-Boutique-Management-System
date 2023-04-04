<?php include './connection.php';?>
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
</head>
    <body>
        <form action="CustomerSearch.php" method="post">
           <input type="text" name="search" style="margin-top: 50px;margin-left: 1050px "/> 
           <button name="btnSearch" class="btn" style="background-color: orange"><i class="fa fa-search"></i></button>
       </form>
        <?php include './slider.php';?>
        
        <br> <br>
        <section>
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-9 padding-right">
            <div class="features_items" style="margin-top: 50px"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    
                                    <?php
                                    if(isset($_POST['btnSearch']))
                                    {
                                        
                                        $search=$_POST['search'];
                                        list($color,$category)= explode(" ", $search);
                                        $sql="select p.id, pc.cat_name,f_type,c.c_name, p.Size, o.type, p.Price,p.Quantity,p.status,p.Description
                                                    from tblproduct p
                                                INNER JOIN tblpcategory pc ON
                                                    p.PCategoryid=pc.id
                                                INNER JOIN tblfabric f ON
                                                    p.Fabricid=f.id
                                                INNER JOIN tblcolor c ON
                                                    p.Colorid=c.id
                                                INNER JOIN tbloccasion o ON
                                                    p.Occasionid=o.id
                                                where pc.cat_name LIKE '".$category."%' AND c.c_name LIKE '".$color."%'";
                                        $sqlres= mysqli_query($con, $sql);
                                        $res=array();
                                         while ($row = mysqli_fetch_assoc($sqlres))
                                            {
                                                $res[]=$row;
                                            }
                                            if(empty($res))
                                            {
                                                ?>
                                            <div id="contact-page" class="container">
                                                <div class="title"style="color: gray;font-size: 40px;padding-left: 180px"> &#128542; No Result Found &#128542; </div>
                                            </div>
                                            <?php
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
<br> <br> <br> <br>
<?php include './footer.php';?>