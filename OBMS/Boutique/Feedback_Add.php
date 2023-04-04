<?php ob_start();?>
<?php include './connection.php';?>
<?php 
    session_start();
    if(empty($_SESSION["login_username"]))
    {
        header("location:login.php");
    }
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
        <?php include './welcomeheader.php';?>
        <form action="#" method="post" autocomplete="off" id="main-contact-form" class="contact-form row" name="contact-form">
    <center>
        <div id="contact-page" class="container">
            <div class="bg">
                <div class="col-sm-8">
                    <div class="contact-form"  style="margin-left: 330px">
                        <h2 class="title text-center">Feedback</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                            <div class="form-group col-md-12">
                                <textarea name="comment" id="message"  class="form-control" placeholder="Enter Comment" style="width: 530px;height: 150px"></textarea>
                            </div> 
                        <div class="form-group col-md-10" style="margin-left: 230px">
                                <input type="submit" name="btnFeed" class="btn btn-primary pull-right" value="Give Feedback">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
  </form>
    </body>
</html>
<?php include './footer.php';?>
<?php 
    if(isset($_POST['btnFeed']))
    {
        $comment=$_POST['comment'];
         if(isset( $_SESSION["login_username"]))
         {
            $username=$_SESSION["login_username"];
            $selectsql="select id from tblcustomer where emailid='$username'";
            $res= mysqli_query($con, $selectsql);                
            while($row= mysqli_fetch_array($res))
            {
                $cid=$row['id'];
              
                $sql="insert into tblfeedback(comment,Customerid) values('$comment','$cid')";
                $resql= mysqli_query($con, $sql);
                if($resql)
                {
                    header("location:welcome.php");
                }
                else 
                {
                    header("location:Feedback_Add.php");
                }
            }
        }
    }
?>
<?phpob_flush();?>