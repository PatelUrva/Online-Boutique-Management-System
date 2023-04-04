<?php include './connection.php';?>
<?php include './sideheader.php'; ?>
<?php 
    session_start();
   
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
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="css/main.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </head>
<body>
   <center>
        <div class="main">
            <div id="contact-page" class="container" style="margin-top: 10px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Product Update</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form enctype='multipart/form-data' action="#" method="post" autocomplete="off" id="main-contact-form" class="contact-form row" name="contact-form">
                            <div class="form-group col-md-6">
                                <?php
                                    
                                    $id=$_GET['id'];
                                    
                                    $categorysql="select pc.cat_name from tblpcategory pc , tblproduct p where p.PCategoryid=pc.id and p.id='$id'";
                                    $catres= $con->query($categorysql);
                                    while($row = $catres->fetch_assoc()) 
                                    {
                                        $category=$row['cat_name'];
                                
                                        ?>
                                       
                                        <input type="text" value="<?php echo $category; ?>" name="category" class="form-control" disabled  style="width: 350px">
                                        <?php
                                    }
                                ?>
                                
                            </div>
                            <div class="form-group col-md-6">
                                <?php
                                    
                                    $id=$_GET['id'];
                                    
                                    $categorysql="select p.Size from tblproduct p where p.id='$id'";
                                    $catres= $con->query($categorysql);
                                    while($row = $catres->fetch_assoc()) 
                                    {
                                        $category=$row['Size'];
                                
                                        ?>
                                       
                                        <input type="text" value="<?php echo $category; ?>" name="category" class="form-control" disabled  style="width:350px">
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group col-md-6">
                                 <?php
                                    
                                    $id=$_GET['id'];
                                    
                                    $categorysql="select f.f_type from tblfabric f , tblproduct p where p.Fabricid=f.id and p.id='$id'";
                                    $catres= $con->query($categorysql);
                                    while($row = $catres->fetch_assoc()) 
                                    {
                                        $category=$row['f_type'];
                                
                                        ?>
                                       
                                        <input type="text" value="<?php echo $category; ?>" name="category" class="form-control" disabled  style="width: 350px">
                                        <?php
                                    }
                                ?>
                            </div>   
                             <div class="form-group col-md-6">
                                <?php
                                    
                                    $id=$_GET['id'];
                                    
                                    $categorysql="select o.type from tbloccasion o , tblproduct p where p.Occasionid=o.id and p.id='$id'";
                                    $catres= $con->query($categorysql);
                                    while($row = $catres->fetch_assoc()) 
                                    {
                                        $category=$row['type'];
                                
                                        ?>
                                       
                                        <input type="text" value="<?php echo $category; ?>" name="category" class="form-control" disabled  style="width: 350px">
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="form-group col-md-4">
                               <?php
                                    
                                    $id=$_GET['id'];
                                    
                                    $categorysql="select c.c_name from tblcolor c , tblproduct p where p.Colorid=c.id and p.id='$id'";
                                    $catres= $con->query($categorysql);
                                    while($row = $catres->fetch_assoc()) 
                                    {
                                        $category=$row['c_name'];
                                
                                        ?>
                                       
                                        <input type="text" value="<?php echo $category; ?>" name="category" class="form-control" disabled  style="width: 230px">
                                        <?php
                                    }
                                ?>
                            </div>
                             <div class="form-group col-md-4">
                                <input type="number" name="price" class="form-control" required="required" placeholder="Per Product Price" style="width: 230px">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" name="qty" class="form-control" required="required" placeholder="Product Quantity" style="width: 220 px">
                            </div>
                            <div class="form-group col-md-12" >
                                <?php
                                    
                                    $id=$_GET['id'];
                                    
                                    $categorysql="select Description from tblproduct where id='$id'";
                                    $catres= $con->query($categorysql);
                                    while($row = $catres->fetch_assoc()) 
                                    {
                                        $category=$row['Description'];
                                
                                        ?>
                                       
                                <textarea value="<?php echo $category; ?>" name="desc" class="form-control"  style="width:730px;height: 100px"></textarea>
                                        <?php
                                    }
                                ?>
                            </div>   
                            <div class="form-group col-md-4">
                                 <?php 
                                        $id=$_GET['id'];
                                        $img = "SELECT FrontImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['FrontImage'];
                                        $image_src = "uploadFrontImage/".$image;
                                    ?>
                                     <img src="<?php echo $image_src?>" alt="" height="230px" width="230px"/>
                            </div>
                            <div class="form-group col-md-4">
                                 <?php 
                                        $id=$_GET['id'];
                                        $img = "SELECT BackImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['BackImage'];
                                        $image_src = "uploadBackImage/".$image;
                                    ?>
                                <img src="<?php echo $image_src?>" alt="" height="230px" width="230px"/>
                            </div>
                            <div class="form-group col-md-4">
                                 <?php 
                                        $id=$_GET['id'];
                                        $img = "SELECT LeftImage FROM tblproductimage where Productid='$id'";
                                        $imgres = $con->query($img);
                                        $row = mysqli_fetch_array($imgres);

                                        $image = $row['LeftImage'];
                                        $image_src = "uploadLeftImage/".$image;
                                    ?>
                                     <img src="<?php echo $image_src?>" alt="" height="230px" width="220px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Update Front Angle Product Image </label>
                                <input type='file' name="frontimage"  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Update Back Angle Product Image </label>
                                <input type='file' name="backimage"  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Update Left Angle Product Image </label>
                                <input type='file' name="leftimage"  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Update Right Angle Product Image </label>
                                <input type='file' name="rightimage"  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-10" style="padding-top: 18px">
                                <input type="submit" style="width: 100px" name="btnUpdate" class="btn btn-primary pull-right" value="Update">
                            </div>
                            <div class="form-group col-md-2" style="padding-top: 18px">
                                <input type="button" style="width: 100px" name="btnReset" class="btn btn-primary pull-right" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </center>
    </body>
</html>
<?php
    if(isset($_POST['btnUpdate']))
    {
        $id=$_GET['id'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $desc=$_POST['desc'];
        
        if(isset($_POST['frontimage']))
        {
            $frontimage = $_FILES['frontimage']['name'];
            $target_dir = "uploadFrontImage/";
            $target_file = $target_dir . basename($_FILES["frontimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png","gif");
           if( in_array($imageFileType,$extensions_arr) )
           {
               if(isset ($_POST['desc']))
               {
                    $sql="update tblproduct set Price='$price' , Quantity='$qty',Description='$desc' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
               else
               {
                   $sql="update tblproduct set Price='$price' , Quantity='$qty' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
            }
        }
        else if(isset ($_POST['backimage']))
        {
            $backimage = $_FILES['backimage']['name'];
            $target_dir = "uploadBackImage/";
            $target_file = $target_dir . basename($_FILES["backimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png","gif");
           if( in_array($imageFileType,$extensions_arr) )
           {
               if(isset ($_POST['desc']))
               {
                    $sql="update tblproduct set Price='$price' , Quantity='$qty',Description='$desc' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
               else
               {
                   $sql="update tblproduct set Price='$price' , Quantity='$qty' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
           }
        }
        else if(isset ($_POST['leftimage']))
        {
            $leftimage = $_FILES['leftimage']['name'];
            $target_dir = "uploadLeftImage/";
            $target_file = $target_dir . basename($_FILES["leftimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png","gif");
           if( in_array($imageFileType,$extensions_arr) )
           {
               if(isset ($_POST['desc']))
               {
                    $sql="update tblproduct set Price='$price' , Quantity='$qty',Description='$desc' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
               else
               {
                   $sql="update tblproduct set Price='$price' , Quantity='$qty' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
           }
        }
        else if(isset($_POST['rightimage']))
        {
            $rightimage = $_FILES['rightimage']['name'];
            $target_dir = "uploadRightImage/";
            $target_file = $target_dir . basename($_FILES["rightimage"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $extensions_arr = array("jpg","jpeg","png","gif");
           if( in_array($imageFileType,$extensions_arr) )
           {
               if(isset ($_POST['desc']))
               {
                    $sql="update tblproduct set Price='$price' , Quantity='$qty',Description='$desc' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
               else
               {
                   $sql="update tblproduct set Price='$price' , Quantity='$qty' where id='$id'";
                    $res=mysqli_query($con, $sql);
                    if($res)
                    {
                        $query = "update tblproductimage set RightImage='".$rightimage."' where Productid='$id'";
                        mysqli_query($con,$query);
                        move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir.$rightimage);
                    
                        echo '<script>window.alert("Product Updated Successfully")</script>';
                    }
               }
           }
        }
        else if(isset ($_POST['desc']))
         {
               $sql="update tblproduct set Price='$price' , Quantity='$qty',Description='$desc' where id='$id'";
               $res=mysqli_query($con, $sql);
               if($res)
               {
                    echo '<script>window.alert("Product Updated Successfully")</script>';
               }
                else
                {
                    echo '<script>window.alert("Product not Updated !!..")</script>';
                }
        }
        else
        {
               $sql="update tblproduct set Price='$price' , Quantity='$qty' where id='$id'";
               $res=mysqli_query($con, $sql);
               if($res)
               {
                     echo '<script>window.alert("Product Updated Successfully")</script>';
               }
               else
               {
                   echo '<script>window.alert("Product not Updated !!..")</script>';
               }
        }
    }
?>