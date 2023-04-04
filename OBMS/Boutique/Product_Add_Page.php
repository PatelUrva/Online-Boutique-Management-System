<?php include './connection.php';?>
<?php include './sideheader.php';?>
<?php 
    session_start();
    
?>
<?php ob_start();?>
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
        <script>
            var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}
        </script>
        <style>
            .multiselect {
  width: 200px;
}

.selectBox {
  position: relative;
}

.selectBox select {
  width: 100%;
  font-weight: bold;
}

.overSelect {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
}

#checkboxes {
  display: none;
  border: 1px #dadada solid;
}

#checkboxes label {
  display: block;
}


        </style>  
    </head>
<body>
   <center>
        <div class="main">
            <div id="contact-page" class="container" style="margin-top: 10px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Product Add</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form enctype='multipart/form-data' action="#" method="post" autocomplete="off" id="main-contact-form" class="contact-form row" name="contact-form">
                            <div class="form-group col-md-6">
                                <select name="category" class="form-control" style="width: 350px">
                                    <option value="--Select Product Category--" > --Select Product Category-- </option>
                                    <option value="Kurtis"> Kurtis </option>
                                    <option value="Chaniya Choli"> Chaniya Choli </option>
                                    <option value="Dresses"> Dresses </option>
                                    <option value="Sarees"> Sarees </option>
                                    <option value="Salwar Suits"> Salwar Suits </option>
                                    <option value="Gowns"> Gowns </option>
                                    <option value="Indo Western"> Indo Western </option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                               <div class="form-control" style="width:350px">
                                    <label for="XS">
                                        <input type="checkbox" name="size[]" value="XS" />XS
                                    </label>
                                    <label for="S">
                                        <input type="checkbox"name="size[]"  value="S" />S
                                    </label>
                                    <label for="L">
                                        <input type="checkbox" name="size[]"  value="L" />L
                                    </label>
                                    <label for="M">
                                        <input type="checkbox" name="size[]"  value="M" />M
                                    </label>
                                    <label for="XL">
                                        <input type="checkbox" name="size[]"  value="XL" />XL
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                 <select name="fabric" class="form-control" style="width: 350px">
                                    <option value="--Select Product Fabric--" > --Select Product Fabric-- </option>
                                    <option value="Cotton"> Cotton </option>
                                    <option value="Synthetic"> Synthetic </option>
                                    <option value="Silk"> Silk </option>
                                    <option value="Canvas"> Canvas </option>
                                    <option value="Shiffon"> Shiffon </option>
                                    <option value="Georgette"> Georgette </option>
                                    <option value="Muslin"> Muslin </option>
                                    <option value="Organza"> Organza </option>
                                    <option value="Velvet"> Velvet </option>
                                </select>
                            </div>   
                             <div class="form-group col-md-6">
                                <select name="occasion" class="form-control" style="width: 350px">
                                    <option value="--Select Occassion--" > --Select Occassion-- </option>
                                    <option value="Party"> Party </option>
                                    <option value="Wedding"> Wedding </option>
                                    <option value="Casual"> Casual </option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                               <select name="pcolor" class="form-control" style="width: 230px">
                                    <option value="--Select Product Color--" > --Select Product Color-- </option>
                                    <option value="Black"> Black </option>
                                    <option value="Blue"> Blue </option>
                                    <option value="Green"> Green </option>
                                    <option value="Navy Blue"> Navy Blue </option>
                                    <option value="Pink"> Pink </option>
                                    <option value="Yellow"> Yellow </option>
                                    <option value="Red"> Red </option>
                                    <option value="White"> White </option>
                                    <option value="Off-White"> Off-White </option>
                                    <option value="Gray"> Gray </option>
                                    <option value="Mustard"> Mustard </option>
                                    <option value="Maroon"> Maroon </option>
                                    <option value="Orange"> Orange </option>
                                    <option value="Pink"> Pink </option>
                                    <option value="Peech"> Peech </option>
                                    <option value="Paroot"> Paroot </option>
                                    <option value="Brown"> Brown </option>
                                    <option value="Magenta"> Magenta </option>
                                    <option value="Purple"> Purple </option>
                                    <option value="Golden"> Golden </option>
                                    <option value="Silver"> Silver </option>
                                    <option value="Copper"> Copper </option>
                                    <option value="Nude"> Nude </option>
                                    <option value="Cream"> Cream </option>
                                    <option value="Multi Color"> Mutli Color </option>
                                </select>
                            </div>
                             <div class="form-group col-md-4">
                                <input type="number" name="price" class="form-control" required="required" placeholder="Per Product Price" style="width: 230px">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="number" name="qty" class="form-control" required="required" placeholder="Product Quantity" style="width: 220px">
                            </div>
                            <div class="form-group col-md-12" >
                                <textarea name="pdesc" id="message" style="height: 130px;width: 727px" required class="form-control" placeholder="Product Description"></textarea>
                            </div>   
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Enter Front Angle Product Image </label>
                                <input type='file' name="frontimage" required  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Enter Back Angle Product Image </label>
                                <input type='file' name="backimage" required  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Enter Left Angle Product Image </label>
                                <input type='file' name="leftimage" required  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="color:gray;font-size: 15px    "> Enter Right Angle Product Image </label>
                                <input type='file' name="rightimage" required  class="form-control" style="width: 350px"/>
                            </div>
                            <div class="form-group col-md-10" style="padding-top: 18px">
                                <input type="submit" style="width: 100px" name="btnAdd" class="btn btn-primary pull-right" value="Add">
                            </div>
                            <div class="form-group col-md-2" style="padding-top: 18px">
                                <input type="button" style="width: 100px" name="btnReset" class="btn btn-primary pull-right" value="Cancel">
                            </div>
                        </form>
                        <script> 
                            var show = true; 
  
                            function showCheckboxes() { 
                                var checkboxes =document.getElementById("checkBoxes"); 
  
                                if (show) { 
                                    checkboxes.style.display = "block"; 
                                    show = false; 
                                } else { 
                                    checkboxes.style.display = "none"; 
                                    show = true; 
                                    } 
                                } 
                    </script> 
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

    if(isset($_POST['btnAdd']))
    {
        $category=$_POST['category'];
        $occasion=$_POST['occasion'];
        $fabric=$_POST['fabric'];
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $desc=$_POST['pdesc'];
        $color=$_POST['pcolor'];
        $desc=$_POST['pdesc'];
         $size = implode(',', $_POST['size']);
                                        
        $categorysql="select id from tblpcategory where cat_name='$category'";
        $catres= $con->query($categorysql);
        $occsql="select id from tbloccasion where type='$occasion'";
        $occres= $con->query($occsql);
        $fabricsql="select id from tblfabric where f_type='$fabric'";
        $fabres= $con->query($fabricsql);
        $color="select id from tblcolor where c_name='$color'";
        $colores=$con->query($color);
                                    
        if ($catres->num_rows > 0 || $occres->num_rows > 0 || $fabres->num_rows > 0 || $colores->num_rows>0)   
        {
            while($row = $catres->fetch_assoc()) 
            {
                while($row2= $occres->fetch_assoc())
                    {
                        while($row3= $fabres->fetch_assoc())
                        {
                            while ($row4=$colores->fetch_assoc())
                            {
                                $pcid=$row['id'];
                                $oid=$row2['id'];
                                $fcid=$row3['id'];
                                $date = date("Y-m-d H:i:s");
                                $colorid=$row4['id'];
                                
                                if(!empty($_POST['size'])) 
                                {
                                    $sql1="insert into tblproduct(PCategoryid,Fabricid,Colorid,Size,Price,Quantity,Occasionid,Description,status,DateTime) values('$pcid','$fcid','$colorid','$size','$price','$qty','$oid','$desc','ACTIVE','$date')";
                                    if($con->query($sql1) == TRUE)
                                    {
                                        $frontimage = $_FILES['frontimage']['name'];
                                        $backimage = $_FILES['backimage']['name'];
                                        $leftimage = $_FILES['leftimage']['name'];
                                        $rightimage = $_FILES['rightimage']['name'];
                                        
                                        $target_dir = "uploadFrontImage/";
                                        $target_dir1 = "uploadBackImage/";
                                        $target_dir2 = "uploadLeftImage/";
                                        $target_dir3 = "uploadRightImage/";
                                        
                                        $target_file = $target_dir . basename($_FILES["frontimage"]["name"]);
                                        $target_file1 = $target_dir1 . basename($_FILES["backimage"]["name"]);
                                        $target_file2 = $target_dir2 . basename($_FILES["leftimage"]["name"]);
                                        $target_file3 = $target_dir3 . basename($_FILES["rightimage"]["name"]);
                                        
                                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
                                        $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));
                                        $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));
                                        
                                        $extensions_arr = array("jpg","jpeg","png","gif");
                                        if( in_array($imageFileType,$extensions_arr) )
                                        {
                                            if( in_array($imageFileType1,$extensions_arr) )
                                            {
                                                if( in_array($imageFileType2,$extensions_arr) )
                                                {   
                                                    if( in_array($imageFileType3,$extensions_arr) )
                                                    {
                                                        $sqlinsert="select id from tblproduct where DateTime='$date'";
                                                        $sqlres= mysqli_query($con, $sqlinsert);
                                                        
                                                        while($rows=$sqlres->fetch_assoc())
                                                        {
                                                            $pid=$rows['id'];
                                                            
                                                            $query = "insert into tblproductimage(FrontImage,BackImage,LeftImage,RightImage,Productid) values('".$frontimage."','".$backimage."','".$leftimage."','".$rightimage."','".$pid."')";
                                                            mysqli_query($con,$query);
                                                            move_uploaded_file($_FILES['frontimage']['tmp_name'],$target_dir.$frontimage);
                                                            move_uploaded_file($_FILES['backimage']['tmp_name'],$target_dir1.$backimage);
                                                            move_uploaded_file($_FILES['leftimage']['tmp_name'],$target_dir2.$leftimage);
                                                            move_uploaded_file($_FILES['rightimage']['tmp_name'],$target_dir3.$rightimage);
                                                        
                                                            echo "<script>window.alert('Product Added Successfully !!..')</script>";
                                                            header('location:Product_View_Page.php');
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    else
                                    {
                                        echo "Error in insertion";
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    
    ?>
<?php ob_flush();?>