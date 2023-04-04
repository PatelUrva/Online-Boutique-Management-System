
<?php ob_start();?>
<?php 
    session_start();
    if(empty($_SESSION["login_username"]))
    {
        header("location:login.php");
    }
?>
<?php include './connection.php';?>
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
</head>
    <body>
        <?php include './welcomeheader.php';?>
        
        <div style="margin-left: 1100px;">
            <h4> <b>
                <?php 
                    if(isset( $_SESSION["login_username"]))
                    {
                        $username=$_SESSION["login_username"];
                        $sql="select fname from tblcustomer where emailid='$username'";
                        $res= mysqli_query($con, $sql);                    
                        while($row = mysqli_fetch_row($res))
                        {
                            echo "Welcome ". $data=$row[0];
                        }
                    }
                ?> 
             </b></h4>
        </div>
        <form action="CustomerSearch.php" method="post">
           <input type="text" name="search" style="margin-top: 50px;margin-left: 1050px "/> 
           <button name="btnSearch" class="btn" style="background-color: orange"><i class="fa fa-search"></i></button>
       </form>
        <?php include './slider.php';?>
        <br> <br>
        <?php include './categorySide.php'; ?>
    </body>
</html>
<?php include './footer.php';?>
<?phpob_flush();?>