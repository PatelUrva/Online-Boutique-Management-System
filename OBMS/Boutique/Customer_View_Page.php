<?php ob_start();?>
<?php include './connection.php';?>
<?php include './sideheader.php';?>

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

        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <style>
.switch {
  position: relative;
  display: inline-block;
  width: 40px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height:13px;
  width: 15px;
  left: -3px;
  bottom: 5px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: red;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 25px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
    </head>
    <body>
            <div class="form-group col-md-6" style="padding-left: 280px;margin-top: 20px">
                <a href="generateCustomerReport.php" class="btn btn-success">Generate PDF</a>
            </div>
            <div class="form-group col-md-6" style="padding-left: 350px;margin-top: 20px">
                <form action="#" method="post">
                    <input type="text" name="search" /> 
                    <button name="btnSearch" class="btn" style="background-color: orange"><i class="fa fa-search"></i></button>
                </form>
        </div> 
        <?php
            if(isset($_POST['btnSearch']))
            {
                $search=$_POST['search'];
                
                $sql="select id,fname,lname,address,city_name,pincode,gender,dob,contactno,emailid from tblcustomer a INNER JOIN tblCity b ON a.cityid=b.city_id where a.fname='$search' OR a.lname='$search' or a.gender='$search' or a.pincode='$search' or b.city_name='$search'  ORDER BY id";
                $result= mysqli_query($con, $sql);
                
                ?>
<form action="#" method="post">
<div class="container" style="margin-left: 280px;margin-top: 0px;font-size: 17px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Id </th>
               <th> First Name </th>
               <th> Last Name </th>
               <th> Address </th>
               <th> City </th>
               <th> Pincode </th>
               <th> Gender </th>
               <th> Date of Birth </th>
               <th> Contact Number </th>
               <th> Email Address </th>
               <th> Actions </th>
           </tr>
           <?php 
                if($result->num_rows>0)
                {
                     while($row= mysqli_fetch_array($result))
                        {?>
                <tr>
                                <td> <?php echo $row['id'];?> </td>
                                <td> <?php echo $row['fname'];?> </td>
                                <td> <?php echo $row['lname'];?> </td>
                                <td> <?php echo $row['address'];?> </td>
                                <td> <?php echo $row['city_name'];?> </td>
                                <td> <?php echo $row['pincode'];?> </td>
                                <td> <?php echo $row['gender'];?> </td>
                                <td> <?php echo $row['dob'];?> </td>
                                <td> <?php echo $row['contactno'];?> </td>
                                <td> <?php echo $row['emailid'];?> </td>
                                <td> 
                                    <button type="button" class="btn btn-dager" style="background-color: #0080ff;color: white"  onclick="location.href='Customer_Add_Page.php?id=<?php echo $row["id"]; ?>'"><i class="fa fa-plus"></i></button>
                                   <?php
                                        if($row['status']=="ACTIVE")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-dnger" style="background-color:orange;color: white" onclick="location.href='Customer_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-off"></i></button>
                                            <?php
                                        }
                                        if($row['status']=="DEACTIVE")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-dnger" style="background-color:orange;color: white" onclick="location.href='Customer_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-on"></i></button>
                                            <?php
                                        }
                                        ?>  
                                </td>
                </tr>
                            <?php
                }}?>
                       </table>
                <?php }
 else 
 {
 
    $sql="select a.id,a.fname,a.lname,a.address,b.city_name,a.pincode,a.gender,a.dob,a.status,a.contactno,a.emailid from tblcustomer a, tblcity b where a.cityid=b.city_id";
    $result= mysqli_query($con, $sql);
    
    ?>
<form action="#" method="post">
<div class="container" style="margin-left: 280px;margin-top: 0px;font-size: 13px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Id </th>
               <th> First Name </th>
               <th> Last Name </th>
               <th> Address </th>
               <th> City </th>
               <th> Pincode </th>
               <th> Gender </th>
               <th> Date of Birth </th>
               <th> Status </th>
               <th> Contact Number </th>
               <th> Email Address </th>
               <th> Actions </th>
           </tr>
               <?php 
                if($result->num_rows>0)
                {
                     while($row= mysqli_fetch_array($result))
                        {?>
                            <tr>
                                <td> <?php echo $row['id'];?> </td>
                                <td> <?php echo $row['fname'];?> </td>
                                <td> <?php echo $row['lname'];?> </td>
                                <td> <?php echo $row['address'];?> </td>
                                <td> <?php echo $row['city_name'];?> </td>
                                <td> <?php echo $row['pincode'];?> </td>
                                <td> <?php echo $row['gender'];?> </td>
                                <td> <?php echo $row['dob'];?> </td>
                                <td> <?php echo $row['status'];?> </td>
                                <td> <?php echo $row['contactno'];?> </td>
                                <td> <?php echo $row['emailid'];?> </td>
                                <td> 
                                    <button type="button" class="btn btn-dager" style="background-color: #0080ff;color: white"  onclick="location.href='Customer_Add_Page.php?id=<?php echo $row["id"]; ?>'"><i class="fa fa-plus"></i></button>
                                   <?php
                                        if($row['status']=="ACTIVE")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-dnger" style="background-color:orange;color: white" onclick="location.href='Customer_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-off"></i></button>
                                            <?php
                                        }
                                        if($row['status']=="DEACTIVE")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-dnger" style="background-color:orange;color: white" onclick="location.href='Customer_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-on"></i></button>
                                            <?php
                                        }
                                        ?>  
                                </td>
                            </tr>
                            <?php
                        }?>
                       </table>
                <?php }
 }
?>
    </div>
</div>
</form>
 </body>
</html>