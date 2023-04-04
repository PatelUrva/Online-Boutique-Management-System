<?php 
    session_start();
    include './connection.php';
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
        } else {include './header.php';}
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
        <img width="900" src="images/visitcard.jpg"/>

    </center>
    </body>
</html>
<?php include './footer.php';?>