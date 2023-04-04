<?php ob_start();?>
<?php include './connection.php';?>
<?php include './sideheader.php';?>
<?php 
    session_start();
?>
<?phpinclude 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreasheet; ?>
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
            .switch 
            {
                position: relative;
                display: inline-block;
                width: 40px;
                height: 20px;
            }
            .switch input 
            { 
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
         <form action="#" method="post">
         <div class="form-group col-md-6" style="padding-left: 280px;margin-top: 20px">
                <a href="generateProductReport.php" class="btn btn-success" name="export">Generate PDF</a>
            </div>
       <div class="form-group col-md-6" style="padding-left: 350px;margin-top: 20px">
               
                    <input type="text" name="search" /> 
                    <button name="btnSearch" class="btn" style="background-color: orange"><i class="fa fa-search"></i></button>
                
            </div>
             </form>
        <?php
            if(isset($_POST['btnSearch']))
            {
                $search=$_POST['search'];
                
                $sql="select p.id, pc.cat_name,f_type,c.c_name, p.Size, o.type, p.Price,p.Quantity,p.status,p.Description
                            from tblproduct p
                         INNER JOIN tblpcategory pc ON
                            p.PCategoryid=pc.id
                        INNER JOIN tblfabric f ON
                            p.Fabricid=f.id
                        INNER JOIN tblcolor c ON
                            p.Colorid=c.id
                        INNER JOIN tbloccasion o ON
                            p.Occasionid=o.id
                         where pc.cat_name='$search' or f.f_type='$search' or c.c_name='$search' or p.Size='$search'
                                or o.type='$search' or p.Price='$search' or p.status='$search'
                        ORDER BY p.id ASC";
                $result= mysqli_query($con, $sql);
                
                ?>
<form action="#" method="post">
<div class="container" style="padding-left: 280px;margin-top: 0px;font-size: 15px;width: 1520px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Category </th>
               <th> Description </th>
               <th> Color </th>
               <th> Size </th>
               <th> Occasion </th>
               <th> Price </th>
               <th> Quantity </th>
               <th> Status </th>
               <th> Actions </th>
           </tr>
           <?php 
                if($result->num_rows>0)
                {
                     while($row= mysqli_fetch_array($result))
                      {
                         $status=$row['status'];
                         ?>
                            <tr>
                                <td> <?php echo $row['cat_name'];?> </td>
                                <td> <?php echo $row['Description'];?> </td>
                                <td> <?php echo $row['c_name'];?> </td>
                                <td> <?php echo $row['Size'];?> </td>
                                <td> <?php echo $row['type'];?> </td>
                                <td> <?php echo $row['Price'];?> </td>
                                <td> <?php echo $row['Quantity'];?> </td>
                                <td> <?php echo $status;?> </td>
                                <td>
                                    <button type="button" class="btn btn-success" onclick="location.href='Product_Update_Page.php?id=<?php echo $row["id"]; ?>'"><i class="fa fa-edit"></i></button>
                                    <button type="button" class="btn btn-dager" style="background-color:orange;color: white" onclick="location.href='Product_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-off"></i></button>
                                </td>
                            </tr>
                         <?php
                        }
                      }
                      ?>
                       </table>
                <?php }
                else
                {
  

    $sql="select p.id, pc.cat_name,f_type,c.c_name, p.Size, o.type, p.Price, p.Quantity, p.Description,p.status 
        from tblproduct p
            INNER JOIN tblpcategory pc ON
	p.PCategoryid=pc.id
             INNER JOIN tblfabric f ON
	p.Fabricid=f.id
             INNER JOIN tblcolor c ON
	p.Colorid=c.id
             INNER JOIN tbloccasion o ON
	p.Occasionid=o.id
             ORDER BY p.id ASC";
    $qures= mysqli_query($con, $sql);
    
    ?>
<form action="#" method="post">
<div class="container" style="margin-left: 280px;margin-top: 0px;font-size: 13px;width: 1220px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Category </th>
               <th> Description </th>
               <th> Color </th>
               <th> Size </th>
               <th> Occasion </th>
               <th> Price </th>
               <th> Quantity </th>
               <th> Status </th>
               <th> Actions </th>
           </tr>
               <?php 
                if($qures->num_rows>0)
                {
                     while($row= mysqli_fetch_array($qures))
                     {
                         ?>
                            <tr>
                                <td> <?php echo $row['cat_name'];?> </td>
                                <td> <?php echo $row['Description'];?> </td>
                                <td> <?php echo $row['c_name'];?> </td>
                                <td> <?php echo $row['Size'];?> </td>
                                <td> <?php echo $row['type'];?> </td>
                                <td> <?php echo $row['Price'];?> </td>
                                <td> <?php echo $row['Quantity'];?> </td>
                                <td> <?php echo $row['status'];?> </td>
                                <td>
                                    <button type="button" class="btn btn-success" onclick="location.href='Product_Update_Page.php?id=<?php echo $row["id"]; ?>'"><i class="fa fa-edit"></i></button>
                                    <?php
                                        if($row['status']=="ACTIVE")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-dnger" style="background-color:orange;color: white" onclick="location.href='Product_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-off"></i></button>
                                            <?php
                                        }
                                        if($row['status']=="DEACTIVE")
                                        {
                                            ?>
                                            <button type="button" class="btn btn-dnger" style="background-color:orange;color: white" onclick="location.href='Product_Delete_Page.php?id=<?php echo $row["id"];?>&status=<?php echo $row["status"] ?>'" name="delete"><i class="fa fa-toggle-on"></i></button>
                                            <?php
                                        }
                                        ?>  
                               </td>
                            </tr>
                     <?php
                     }
                        ?>
                       </table>
                <?php 
                        }
                    }
                ?>
            </div>
        </div>
    </form>
 </body>
</html>