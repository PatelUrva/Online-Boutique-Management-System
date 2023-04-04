<?php 
    include './connection.php';
    
?>
<?php 
    session_start();
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
        }
 else {include './header.php';}
    ob_start();?>
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div id="contact-page" class="container" style="padding-top: 40px">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 350px">
                        <h2 class="title text-center" >MAKE PAYMENT</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form action="#" id="main-contact-form" class="contact-form row" autocomplete="off" name="contact-form" method="post">
                            
                                <input type="radio" name="pay" data-toggle="collapse" data-target="#demo" />
                                <label style="font-size:20px;padding-left: 10px">Debit Card </label>
                                
                            <div class="container" style="background-color:lightgray;width:400px">
                                <div id="demo" class="collapse" style="padding-left:50px">
                                    <div class="form-group col-md-6" style="padding-top:40px">
                                        <label>Card Holder Name</label> <br>
                                        <input type="text" required name="name" placeholder="e.g. JOHN IBRAHIM" class="form-group" style="width:260px;"/>
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label>Card Number</label> <br>
                                        <input type="text"  required onkeyup="addHyphen(this)" id="number" placeholder="e.g. 9898 9898 9898 9898 " name="cn" class="form-group" style="width:260px;" maxlength="19" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Expiry Month/Year</label> <br>
                                        <input type="text" required name="expdate" id="fooDate" placeholder="e.g.02/21" class="form-group" style="width:100px;" maxlength="5" />
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <label style="padding-left:20px">CVV</label> <br>
                                        <input type="text" required  name="cvv" class="form-group" maxlength="3" style="margin-left:23px;width: 70px"/>
                                    </div>
                                    <div class="form-group col-md-6" >
                                        <input type="submit" name="btnPay" value="Pay Now" class="btn btn-primary" style="margin-left: 70px"/>
                                    </div>
                                </div>
                            </div>
                            <br> 
                            
                                <input type="radio" name="pay" data-toggle="collapse" data-target="#demo1" />
                                <label style="font-size:20px;padding-left: 10px">Cash On Delivery </label>
                                
                             <div class="container" style="background-color:lightgray;width:400px">
                                <div id="demo1" class="collapse" style="padding-left:50px">
                                    <div class="form-group col-md-6" style="padding-top:40px">
                                        <button type="button" onclick="location.href='cotinue.php'" class="btn btn-primary" style="margin-left: 70px;width: 100px;height: 30px;"> Continue </button>
                                       
                                    </div>
                                </div>
                             </div>
                            <br>
                        </form>
                    <script>
                            var acc = document.getElementsByClassName("accordion");
                            var i;

                            for (i = 0; i < acc.length; i++) 
                            {
                                acc[i].addEventListener("click", function() {
                                    this.classList.toggle("active");
                                    var panel = this.nextElementSibling;
                                     if (panel.style.maxHeight) {
                                        panel.style.maxHeight = null;
                                    } else {
                                    panel.style.maxHeight = panel.scrollHeight + "px";
                                    } 
                                });
                            }
                           var dateField = document.getElementById("fooDate");
                                dateField.onkeyup = bar;
                            function bar(evt)
                            {
                                var v = this.value;
                                if (v.match(/^\d{2}$/) !== null) 
                                {
                                    this.value = v + '/';
                                } 
                            }
                            
                           function addHyphen (element) 
                           {
                                let ele = document.getElementById(element.id);
                                ele = ele.value.split(' ').join('');    

                                let finalVal = ele.match(/.{1,4}/g).join(' ');
                                document.getElementById(element.id).value = finalVal;
                            }
                        </script>
                </div>
            </div>
    </div>
    </body>
</html>
<?php
    if(isset($_POST['btnPay']))
    {
        
            $order="select * from tblcustomerordermaster where Customerid='$c_id'";
            $orderres= mysqli_query($con, $order);
            while($row = mysqli_fetch_assoc($orderres))
            {
                $orderid=$row['no'];
            
                $cart="select * from tblcart where Customerid='$c_id' and status='ACTIVE'";
                $cartres= mysqli_query($con, $cart);
                while($row1 = mysqli_fetch_assoc($cartres))
                {
                    $cartid=$row1['cart_id'];
                    $amt=$row1['Payable_Amount'];
                    $payDesc='Debit Card';
                    $status='Paid';
                
                    $qtysql="select * from tblcarttransaction where cartid='$cartid' and status='ACTIVE'";
                    $qtyres= mysqli_query($con, $qtysql);
                    $rows= mysqli_num_rows($qtyres);
                    $qty=$rows;
                
                    $cardno=$_POST['cn'];
                    $expdate=$_POST['expdate'];
                    $now = new DateTime('now');
                    $month = $now->format('m');
                    $year = $now->format('y');
                    $exp=$month.'/'.$year;
                    if($expdate >= $exp)
                    {
                        $cvv=$_POST['cvv'];
                
                        function billNumber($length = 25) 
                        {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $charactersLength = strlen($characters);
                            $randomString = '';
                            for ($i = 0; $i < $length; $i++) 
                            {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            return $randomString;
                        }   
                        $billno = billNumber(7);
                        $transid= billNumber(15);
               
                        $orderdate = date("Y-m-d");
                        $deldate=Date('y:m:d', strtotime($orderdate.'+5 days'));
                        
                
                        $sqlinsert="insert into tblcustomerorder(Billno,Orderno,Customerid,Cartid,Quantity,Amount,PaymentDesc,Transactionid,order_datetime,delivery_datetime,Status,order_status) values('$billno','$orderid','$c_id','$cartid','$qty','$amt','$payDesc','$transid','$orderdate','$deldate','$status','Pending')";
                        if($con->query($sqlinsert) == TRUE)
                        {
                    
                        ?>
                        <center>
                            <label style="margin-top: 50px;font-size: 20px;color: green;background-color: lightgreen">Payment Successful !!.. Your Transaction id is : <?php echo $transid; ?></label>
                            <br> <br>
                            <a href="bill.php?transid=<?php echo $transid; ?>'" class="btn btn-primary">View Invoice</a>
                        </center>
                        <?php
                        }
                    }
                    else
                    {
                        echo "<script> window.alert('Enter valid expiry date !!..') </script>";
                    }
                }
            
        }       
    }
?>
<br> <br> <br> <br> <br> <br>
<?php
    ob_flush(); 
?>