
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      
        <?php
        $hostname='localhost';
        $user='root';
        $pass='';
        
        $con= mysqli_connect($hostname,$user,$pass);
        mysqli_select_db($con, "boutique");
       
        ?>
    </body>
</html>
