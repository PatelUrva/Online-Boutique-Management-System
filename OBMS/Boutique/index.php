<?php include './connection.php';?>
<?php include './header.php';?>

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
        <?php include './categorySide.php'; ?>
    </body>
</html>
<?php include './footer.php';?>
