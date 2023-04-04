<?php include './connection.php';?>
<style>
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  background-color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
    padding-top: 20px;
    padding-left: 20px; 
  text-decoration: none;
  font-size: 18px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color:orange;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<div class="header-bottom" >
    <div class="col-sm-12" style="height: 120px">
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="#"><img src="images/logo.png" alt=""  height="150px" width="150px" style="margin-left: 0px;margin-top: 0px"/></a></li>
                        <li><a href="welcome.php" class="active"  style="padding-top: 30px;padding-left: 120px"><i class="fa fa-home"></i>  Home </a></li>
                        <li  style="padding-top: 30px;padding-left: 50px"><a href="aboutus.php"><i class="fa fa-info-circle"></i>  About Us</a></li>
                        
                        <li class="dropdown" style="padding-top: 30px;padding-left: 50px">
                            <a href="#"><i class="fa fa-female"></i> Catalog</a>
                            <ul role="menu" class="sub-menu" style="width: 500px">
                                <li><a href="kurti.php">Kurtis</a></li>
                                <li><a href="salwarSuit.php">Salwar Suits</a></li>  
                                <li><a href="saree.php">Sarees</a></li>
                                <li><a href="dresses.php">Dresses</a></li>
                                <li><a href="chaniyaCholi.php">Chaniya Cholis</a></li> 
                                <li><a href="gowns.php">Gowns</a></li>
                                <li><a href="indoWestern.php">Indo Western</a></li>
                            </ul>
                        </li> 
                        <?php
                            if(isset( $_SESSION["login_username"]))
                            {
                                $username=$_SESSION["login_username"];
                                $sql2="select id from tblcustomer where emailid='$username'";
                                $res= mysqli_query($con, $sql2);              
                                while($row = mysqli_fetch_row($res))
                                {
                                    $c_id=$row[0];
          
                                    $sql="select * from tblcart where Customerid='$c_id' and status='ACTIVE'";
                                    $sqlres= mysqli_query($con, $sql);
                                    while($row= mysqli_fetch_assoc($sqlres))
                                    {
                                        $cartid=$row['cart_id'];
                                
                                        $sql1="select * from tblcarttransaction where cartid='$cartid' and status='ACTIVE'";
                                        $sqlres1= mysqli_query($con, $sql1);
                                        $row1= mysqli_num_rows($sqlres1);
                                        $cnt=$row1;
                                    }
                                }
                            }
                        ?>
                        <li  style="padding-top: 25px;padding-left: 50px">
                                <a href="addtoCart.php" style="color:#000;">
                                    <img src="images/carticon.jfif" height="30px" width="30px"/> Cart
                                    <span style="font-size: 12px;line-height: 14px;background: #F68B1E;padding: 2px; border: 2px solid #fff;border-radius: 50%;position: absolute;top: -1px;left: 13px;color: #fff;width: 20px;height: 20px;text-align: center;">
                                        <?php 
                                            if($row1==0)
                                            {
                                                echo "0";
                                            }
                                            else
                                            {
                                                echo $cnt;
                                            }
                                        ?>
                                    </span>
                                </a>
                        </li>
                        <li  style="padding-top: 30px;padding-left: 50px"><a href="contactus.php"><i class="fa fa-envelope"></i>  Contact US </a></li>
                        <li  style="padding-top: 30px;padding-left: 50px"><a href="checkout.php"><i class="fa fa-sign-out"></i>  Logout </a></li>
                        <li style="padding-top: 25px;padding-left: 50px">
                            <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; </span>
                        </li>
                        <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <a href="profile.php"> <i class="fa fa-user"></i>  Account </a>
                            <a href="history.php"><i class="fa fa-shopping-bag"></i> Your Orders</a>
                            <a href="Feedback_Add.php"><i class="fa fa-envelope"></i>  Give Feedback</a>
                        </div>
                        
                    </ul>
            </div>
                
         </div>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "215px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>