<?php ob_start();?>
<?php include './connection.php';?>
<?php include './sideheader.php';?>
<?php 
    session_start();
    
?>
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
 <form action="#" method="post" autocomplete="off">
    <center>
        <div class="main">
            <div id="contact-page" class="container" style="margin-top: 0px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Registration</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" method="post" autocomplete="off" id="main-contact-form" class="contact-form row" name="contact-form">
                            <div class="form-group col-md-6">
                                <input type="text" name="fname" class="form-control" required="required" placeholder="First Name" style="width: 350px">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="lname" class="form-control" required="required" placeholder="Last Name" style="width: 350px">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="address" id="message" required class="form-control" placeholder="Residential Address" style="width: 730px"></textarea>
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
                                <select name="city" id="citySel" class="form-control" required="required" style="width: 225px">
                                <option value="--Select city--" > --Select City-- </option>
                                
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" name="pincode" class="form-control" required="required" placeholder="Pincode" style="width: 350px">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" name="mobile" class="form-control" required="required" placeholder="Contact Number" style="width: 350px">
                            </div>
                            <div class="row">
                            <div class="form-group col-md-6"> 
                                <label for="dob" style="color:	#B0B0B0; padding-left: 0px"> Date of Birth : </label>
                                <input type="date" name="dob" class="form-control" required="required" placeholder="Date of Birth" style="margin-left: 12px">
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-1" >
                                    <label for="gender" style="color:#B0B0B0"> Gender: </label>
                                        <input type="radio" name="gender" style="padding-top: 20px" class="form-control" required="required"  value="Male" checked>
                                  </div>
                                  <div class="form-group col-md-2">
                                    <label class="title text-center" style="padding-top: 35px; font-size: 19px;color:	#B0B0B0"> Male </label>
                                  </div>
                                <div class="form-group col-sm-1" style="padding-top: 23px">
                                      <input type="radio" name="gender" class="form-control" style="padding-left:10px" value="Female" required="required">
                                  </div>
                                  <div class="form-group col-md-2">
                                    <label class="title text-center" style="padding-top: 35px; font-size: 19px;color:	#B0B0B0"> Female </label>
                                  </div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required placeholder="Email Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" style="margin-left: 12px;">
                            </div> 
                            <div class="form-group col-md-6">
                                <input type="password" name="password" class="form-control" required placeholder="Password">
                            </div> 
                            <div class="form-group col-md-10">
                                <input type="submit" name="btnReg" class="btn btn-primary pull-right" value="Register">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="button" name="btnReset" class="btn btn-primary pull-right" value="Cancel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </center>
</form>
    </body>
</html>
<?php
    
    if(isset($_POST['btnReset']))
    {
        header('location:Customer_View_Page.php');
    }
    if(isset($_POST['btnReg']))
    {
        
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $city=$_POST['city'];
            $address=$_POST['address']; 
            $pincode=$_POST['pincode'];
            $gender=$_POST['gender'];
            $dob=$_POST['dob'];
            $mobile=$_POST['mobile'];
            $email=$_POST['email'];
            $pass=$_POST['password'];
            
            $today=date("Y-m-d");
            $diff= date_diff(date_create($dob), date_create($today));
            $age=$diff->format('%y');
            
            if($age < 18)
            {
                echo '<script>window.alert("Your minimum age should be 18 for registration !!")</script>';
            }
            else
            {
                $sql = "insert into tblcustomer(fname,lname,address,cityid,pincode,gender,dob,contactno,emailid,password,status) values('$fname','$lname','$address','$city','$pincode','$gender','$dob','$mobile','$email','$pass','ACTIVE')";
                if($con->query($sql) == TRUE)
                {
                    $sql1="insert into tblUser(username,password) values('$email','$pass')";
                    if($con->query($sql1) == TRUE)
                    {
                        echo "<script>window.alert('Record inserted successfully !!') </script>";
                        header("location:Customer_View_Page.php");
                    }
                    else
                    {
                        echo "<script>window.alert('Record not inserted  !!') </script>";
                    }
                }
                else
                {
                    echo "<script>window.alert('Record not inserted  !!') </script>";
                }
            }
    }
?>

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
<?phpob_flush();?>