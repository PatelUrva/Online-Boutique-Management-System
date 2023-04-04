
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body 
{
  font-family: "Lato", sans-serif;
}

.sidenav
{
  height: 100%;
  width: 250px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a, .dropdown-btn 
{
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: white;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

.sidenav a:hover, .dropdown-btn:hover 
{
  color: orange;
}


.main 
{
  margin-left: 300px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}


.active {
  background-color: green;
  color: orange;
}

.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 16px;
}

.fa-caret-down {
  float: right;
  padding-right: 8px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
    <button onclick="document.location.href='index.php'" class="btn" style="background-color:white"><i class="fa fa-home">FOF</i></button>
    <label style="color:orange;padding-left: 30px"> Welcome Admin </label>
    <br>
    <br> <br> <br>
    <a href="welcomeAdmin.php"><i class="fa fa-home"></i>  Home</a>
    
    <button class="dropdown-btn"> <i class="fa fa-tshirt"></i>  Manage Product 
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href="Product_Add_Page.php">Add New</a>
      <a href="Product_View_Page.php">View/Search/Update</a>
      <a href="Product_View_Page.php">Active/Deactive</a>
    </div>
    
    <button class="dropdown-btn"><i class="fa fa-user"></i>   Manage Customer 
        <i class="fa fa-caret-down"></i>
    </button>
     <div class="dropdown-container">
      <a href="Customer_Add_Page.php">Add New</a>
      <a href="Customer_View_Page.php">View/Search/Update</a>
      <a href="Customer_View_Page.php">Active/Deactive</a>
    </div>
    
     <button class="dropdown-btn"> <i class="fa fa-shopping-bag"></i>  Manage Customer Order
        <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-container">
        <a href="Customer_View_Order.php">View </a>
     </div>
    
     <button class="dropdown-btn"> <i class="fa fa-shopping-bag"></i>  Manage Payment
        <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-container">
        <a href="Payment_View.php">View </a>
     </div>
    
     <button class="dropdown-btn"> <i class="fa fa-list-alt"></i>  Manage Feedback 
        <i class="fa fa-caret-down"></i>
     </button>
     <div class="dropdown-container">
        <a href="Feedback_View_Page.php">View </a>
     </div>
    
    
    
    <a href="checkout.php"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Logout </a>
</div>



<script>

var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html> 
