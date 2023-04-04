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
       <div class="main" style="padding-left: 10px;margin-top: 20px">
                <form action="#" method="post">
                    <div class="form-group col-md-2" style="margin-top:27px;padding-left: 10px">
                        <a href="PaymentReport.php" class="btn btn-success">Generate PDF</a>
                    </div>
                    <div class="form-group col-md-2" style="padding-left:20px">
                        From : <input type="date" class="form-control" name="from" />
                    </div>
                    <div class="form-group col-md-2">
                        To : <input type="date" class="form-control" name="to" />
                    </div>
                    <div class="form-group col-md-3" style="margin-top:27px">
                        <select name="status" class="form-control" style="width:200px">
                            <option> Pending </option>
                            <option> Delivered </option>
                        </select>
                    </div>
                    <button name="btnSearch" style="margin-top:27px;background-color: orange" class="btn"><i class="fa fa-search"></i></button>
                </form>
        </div> 
        <br>
        <?php
            if(isset($_POST['btnSearch']))
            {
                $from=date('Y-m-d', strtotime($_POST['from']));
                $to=date('Y-m-d', strtotime($_POST['to']));
                $status=$_POST['status'];
                
                $sql="select o.Full_Name,o.Mobile_Number,p.order_datetime,p.delivery_datetime,o.Shipping_address,
                    o.pincode,c.emailid,p.Billno,p.Quantity,p.Amount,p.PaymentDesc,p.Status
                    from tblcustomerorder p
                    INNER JOIN tblcustomer c ON
                        p.Customerid=c.id
                     INNER JOIN tblcustomerordermaster o ON
                        p.Orderno=o.no
                        where  p.order_datetime BETWEEN '$from' AND '$to' AND p.Status='$status'
                        ORDER BY order_datetime ASC";
                $result= mysqli_query($con, $sql);
                
                ?>
<form action="#" method="post">
<div class="container" style="margin-left: 280px;margin-top: 0px;font-size: 13px;width: 1290px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Full Name </th>
               <th> Mobile Number </th>
               <th> Order DateTime </th>
               <th> Delivery DateTime </th>
               <th> Shipping Address </th>
               <th> Pincode </th>
               <th> Email Address </th>
               <th> Bill Number </th>
               <th> Quantity </th>
               <th> Amount </th>
               <th> Payment Type </th>
               <th> Status </th>
           </tr>
           <?php 
                if($result->num_rows>0)
                {
                     while($row= mysqli_fetch_array($result))
                        {?>
                <tr>
                                 <td> <?php echo $row['Full_Name'];?> </td>
                                <td> <?php echo $row['Mobile_Number'];?> </td>
                                <td> <?php echo $row['order_datetime'];?> </td>
                                <td> <?php echo $row['delivery_datetime'];?> </td>
                                <td> <?php echo $row['Shipping_address'];?> </td>
                                <td> <?php echo $row['pincode'];?> </td>
                                <td> <?php echo $row['emailid'];?> </td>
                                <td> <?php echo $row['Billno'];?> </td>
                                <td> <?php echo $row['Quantity'];?> </td>
                                <td> <?php echo $row['Amount'];?> </td>
                                <td> <?php echo $row['PaymentDesc'];?> </td>
                                <td> <?php echo $row['Status'];?> </td>
                                
                </tr>
                            <?php
                }}?>
                       </table>
                <?php }
 else 
 {
 
    $sql="select o.Full_Name,o.Mobile_Number,p.order_datetime,p.delivery_datetime,o.Shipping_address,
                    o.pincode,c.emailid,p.Billno,p.Quantity,p.Amount,p.PaymentDesc,p.Status
                    from tblcustomerorder p
                    INNER JOIN tblcustomer c ON
                        p.Customerid=c.id
                     INNER JOIN tblcustomerordermaster o ON
                        p.Orderno=o.no
                        ORDER BY p.Serialno ASC";
                $result= mysqli_query($con, $sql);
    
    ?>
<form action="#" method="post">
<div class="container" style="margin-left: 280px;margin-top: 0px;font-size:13px;width: 1290px"> 
    <div class="row">
        <table border="2px">
           <tr>
               <th> Full Name </th>
               <th> Mobile Number </th>
               <th> Order DateTime </th>
               <th> Delivery DateTime </th>
               <th> Shipping Address </th>
               <th> Pincode </th>
               <th> Email Address </th>
               <th> Bill Number </th>
               <th> Quantity </th>
               <th> Amount </th>
               <th> Payment Type </th>
               <th> Status </th>
           </tr>
               <?php 
                if($result->num_rows>0)
                {
                     while($row= mysqli_fetch_assoc($result))
                        {?>
                            <tr>
                                <td> <?php echo $row['Full_Name'];?> </td>
                                <td> <?php echo $row['Mobile_Number'];?> </td>
                                <td> <?php echo $row['order_datetime'];?> </td>
                                <td> <?php echo $row['delivery_datetime'];?> </td>
                                <td> <?php echo $row['Shipping_address'];?> </td>
                                <td> <?php echo $row['pincode'];?> </td>
                                <td> <?php echo $row['emailid'];?> </td>
                                <td> <?php echo $row['Billno'];?> </td>
                                <td> <?php echo $row['Quantity'];?> </td>
                                <td> <?php echo $row['Amount'];?> </td>
                                <td> <?php echo $row['PaymentDesc'];?> </td>
                                <td> <?php echo $row['Status'];?> </td>
                               
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