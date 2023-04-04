<?php include './connection.php'; ?>


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
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link href="css/main.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    </head>
    <body>
         <div id="contact-page" class="container" style="margin-left: 300px;">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Add New Address</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" method="post" autocomplete="off" id="main-contact-form" class="contact-form row" name="contact-form">
                            <div class="form-group col-md-6">
                                <input type="text" name="fname" class="form-control" required="required" placeholder="Full Name" style="width: 350px">
                            </div>
                            <div class="form-group col-md-6"> 
                                <input type="phone" name="phone" class="form-control" required="required" placeholder="Mobile Number" style="width: 357px">
                            </div>
                             <div class="form-group col-md-4">
                                 <select name="country" id="countrySel" class="form-control" required="required" style="width: 230px">
                                <option value="--Select country--" > --Select Country-- </option>
                                <?php 
                                    $res= mysqli_query($con, "select * from tblcountry");
                                    while($row= mysqli_fetch_array($res))
                                    {
                                        ?>
                                        <option value= "<?php echo $row["c_id"];  ?>"> <?php echo $row["country_name"];  ?> </option>
                                        <?php
                                    }
                                ?>
                                </select>
                            </div>
                             <div class="form-group col-md-4">
                                <select name="state" id="stateSel" class="form-control" required="required" style="width: 230px">
                                <option value="--Select state--" > --Select State-- </option>
                                
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <select name="city" id="citySel" class="form-control" required="required" style="width: 230px">
                                <option value="--Select city--" > --Select City-- </option>
                                
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                              <input type="number" name="pincode" class="form-control" required="required" placeholder="Pincode" >
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="address" class="form-control" required placeholder="Flat, House no., Building, Company, Apartment" style="width:357px">
                            </div> 
                            <div class="form-group col-md-6">
                                <input type="text" name="area" class="form-control"  placeholder="Area, Colony, Street, Sector, Village">
                            </div> 
                            <div class="form-group col-md-6">
                                <input type="text" name="landmark" class="form-control"  placeholder="Landmark e.g. near Apollo Hospital" style="width: 357px">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="submit" name="btnAddAddress" class="btn btn-primary" value="Add Address" style="margin-left: 630px">
                            </div>
                        </form>
                    </div>
                    <script type="text/javascript">
                                $(document).ready(function(){
                                    $('#countrySel').on('change',function(){
                                    var countryID = $(this).val();
                                    if(countryID){
                                        $.ajax({
                                            type:'POST',
                                            url:'./ajaxFile.php',
                                            data:'c_id='+countryID,
                                            success:function(html){
                                                $('#stateSel').html(html);
                                                $('#citySel').html('<option value="">Select state first</option>'); 
                                            }
                                        }); 
                                        }else{
                                        $('#stateSel').html('<option value="">Select country first</option>');
                                        $('#citySel').html('<option value="">Select state first</option>'); 
                                      }
                                    });
    
                               $('#stateSel').on('change',function(){
                                var stateID = $(this).val();
                                if(stateID){
                                $.ajax({
                                    type:'POST',
                                    url:'./ajaxFile.php',
                                    data:'s_id='+stateID,
                                    success:function(html){
                                    $('#citySel').html(html);
                                   }
                                }); 
                            }else{
                                $('#citySel').html('<option value="">Select state first</option>'); 
                            }
                        });
                      });
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['btnAddAddress']))
    {
        if(isset( $_SESSION["login_username"]))
        {
            $username=$_SESSION["login_username"];
            $sql="select id from tblcustomer where emailid='$username'";
            $res= mysqli_query($con, $sql);              
            while($row = mysqli_fetch_row($res))
            {
                $c_id=$row[0];
                
                $address=$_POST['address'];
                $area=$_POST['area'];
                $landmark=$_POST['landmark'];
                $fulladdress=$address.','.$area.','.$landmark;
                $city=$_POST['city'];
                $pincode=$_POST['pincode'];
                $fname=$_POST['fname'];
                $phone=$_POST['phone'];
                
                $sql = "insert into tblcustomerordermaster(Customerid,Full_Name,Mobile_Number,Shipping_address,Cityid,pincode,status) values('$c_id','$fname','$phone','$fulladdress','$city','$pincode','Pending')";
                if($con->query($sql) == TRUE)
                {
                    header("location:placeOrder.php");
                }
            }
        }
        else
        {
            echo "<script> window.alert('Login First !!..') <script>";
        }
    }
?>
<?php 
    include './footer.php';
    ob_flush();
?>