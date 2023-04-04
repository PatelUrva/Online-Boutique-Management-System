<?php ob_start();?>
<?php include './connection.php';?>
<?php include './sideheader.php';?>
<?php 
    session_start();
   
?>
<html>
    <head>
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
        <div class="main" style="padding-left: 650px;margin-top: 20px">
            <div class="form-group col-md-12">
                <form action="#" method="post">
                    <input type="text" name="search" /> 
                    <button name="btnSearch" class="btn" style="background-color: orange"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div> 
        <?php
            if(isset($_POST['btnSearch']))
            {
                $search=$_POST['search'];
                
                $sql="select f.id, f.comment,c.fname
                            from tblfeedback f
                         INNER JOIN tblcustomer c ON
                            f.Customerid=c.id
                         where c.fname='$search' 
                        ORDER BY f.id ASC";
                $result= mysqli_query($con, $sql);
                
                ?>
<form action="#" method="post">
<div class="container" style="padding-left:600px;padding-top:20px;font-size: 18px;width: 1200px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Comment </th>
               <th style="padding-left: 10px"> Customer Name </th>
           </tr>
           <?php 
                if($result->num_rows>0)
                {
                     while($row= mysqli_fetch_array($result))
                        {?>
                <tr>
                                <td> <?php echo $row['comment'];?> </td>
                                <td> <?php echo $row['fname'];?> </td>
                                
                </tr>
                            <?php
                }}?>
                       </table>
                <?php }
                else
                {
  
    $sql="select f.id, f.comment,c.fname
                            from tblfeedback f
                         INNER JOIN tblcustomer c ON
                            f.Customerid=c.id
                        ORDER BY f.id ASC";
    $qures= mysqli_query($con, $sql);
    
    ?>
<form action="#" method="post">
<div class="container" style="padding-left:600px;padding-top:20px;font-size: 18px;width: 1200px"> 
    <div class="row">
        <table border="2px" style="text-align: center;">
           <tr>
               <th> Comment </th>
               <th style="padding-left: 10px"> Customer Name </th>
           </tr>
               <?php 
                if($qures->num_rows>0)
                {
                     while($row= mysqli_fetch_array($qures))
                        {?>
                            <tr>
                                <td> <?php echo $row['comment'];?> </td>
                                 <td> <?php echo $row['fname'];?> </td>
                                
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