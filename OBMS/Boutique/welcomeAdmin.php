<?php include './sideheader.php';?>
<?php include './connection.php';?>
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
    <style>
        .icon
        {
            margin-top: 50px;
        }
    </style>
    </head>
    <body>
        <div class="main" style="margin-top:80px">
            <div class="form-group col-md-6">
                <div class="form-control" style="width: 350px; height: 120px; background-color: lightgreen;margin-top: 20px">
                    <div class="form-group col-md-4">
                        <i class="fa fa-user fa-5x" style="padding-left: 20px;padding-top: 10px"> </i>
                    </div>
                    <div class="form-group col-md-7" style="padding-left:20px">
                        <label> Total Active Customers </label>
                    </div>
                    <?php
                        $sql="select * from tblcustomer where status='ACTIVE'";
                        $result= mysqli_query($con, $sql);
                        if($result)
                        {
                            $row= mysqli_num_rows($result);
                            if($row)
                            {
                                $res=$row;
                                ?> <label style="padding-left: 150px;font-size: 35px;"> <?php echo $res; ?></label>
                               <?php
                            }
                        }
                    ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="form-control" style="width: 350px; height: 120px; background-color: orange;margin-top: 20px">
                    <div class="form-group col-md-4">
                        <i class="fa fa-tshirt fa-5x" style="padding-left: 0px;padding-top: 10px"> </i>
                    </div>
                    <div class="form-group col-md-8" style="padding-left:30px">
                        <label> Total Available Products </label>
                    </div>
                    <?php
                        $sql1="select * from tblproduct where status='ACTIVE'";
                        $sql1res= mysqli_query($con, $sql1);
                        if($sql1res)
                        {
                            $row1= mysqli_num_rows($sql1res);
                            if($row1)
                            {
                                $res1=$row1;
                                ?> <label style="padding-left: 150px;font-size: 35px;"> <?php echo $res1; ?></label>
                               <?php
                            }
                        }
                    ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="form-control" style="width: 350px; height: 120px; background-color: yellow;margin-top: 20px">
                    <div class="form-group col-md-4">
                        <i class="fa fa-shopping-bag fa-5x" style="padding-left: 20px;padding-top: 10px"> </i>
                    </div>
                    <div class="form-group col-md-7" style="padding-left:39px">
                        <label> Total Customer Order </label>
                    </div>
                    <?php
                        $sql="select * from tblcustomerordermaster";
                        $result= mysqli_query($con, $sql);
                        if($result)
                        {
                            $row= mysqli_num_rows($result);
                            if($row)
                            {
                                $res=$row;
                                ?> <label style="padding-left: 150px;font-size: 35px;"> <?php echo $res; ?></label>
                               <?php
                            }
                        }
                    ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="form-control" style="width: 350px; height: 120px; background-color: lightskyblue;margin-top: 20px">
                    <div class="form-group col-md-4">
                        <i class="fa fa-exclamation fa-5x" style="padding-left: 20px;padding-top: 10px"> </i>
                    </div>
                    <div class="form-group col-md-7" style="padding-left:40px">
                        <label> Total Pending Orders </label>
                    </div>
                    <?php
                        $sql="select * from tblcustomerordermaster where status='Pending'";
                        $result= mysqli_query($con, $sql);
                        if($result)
                        {
                            $row= mysqli_num_rows($result);
                            if($row)
                            {
                                $res=$row;
                                ?> <label style="padding-left: 150px;font-size: 35px;"> <?php echo $res; ?></label>
                               <?php
                            }
                        }
                    ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="form-control" style="width: 350px; height: 120px; background-color: lightseagreen;margin-top: 20px">
                    <div class="form-group col-md-4">
                        <i class="fa fa-list-alt fa-5x" style="padding-left: 20px;padding-top: 10px"> </i>
                    </div>
                    <div class="form-group col-md-8" style="padding-left:90px">
                        <label> Total Feedback </label>
                    </div>
                    <?php
                        $sql="select * from tblfeedback";
                        $result= mysqli_query($con, $sql);
                        if($result)
                        {
                            $row= mysqli_num_rows($result);
                            if($row)
                            {
                                $res=$row;
                                ?> <label style="padding-left: 150px;font-size: 35px;"> <?php echo $res; ?></label>
                               <?php
                            }
                        }
                    ?>
                </div>
            </div>
            
            <div class="form-group col-md-6">
                <div class="form-control" style="width: 350px; height: 120px; background-color: plum;margin-top: 20px">
                    <div class="form-group col-md-4">
                        <i class="fa fa-user-plus fa-5x" style="padding-left: 20px;padding-top: 10px"> </i>
                    </div>
                    <div class="form-group col-md-8" style="padding-left:50px">
                        <label> Total Pending Payment </label>
                    </div>
                    <?php
                        $sql="select * from tblcustomerorder where Status='Pending'";
                        $result= mysqli_query($con, $sql);
                        if($result)
                        {
                            $row= mysqli_num_rows($result);
                            if($row)
                            {
                                $res=$row;
                                ?> <label style="padding-left: 150px;font-size: 35px;"> <?php echo $res; ?></label>
                               <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
        // put your code here
        ?>
    </body>
</html>
