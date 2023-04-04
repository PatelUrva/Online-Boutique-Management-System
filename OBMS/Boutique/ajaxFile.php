<?php

include('./connection.php');

if(isset($_POST["c_id"]))
    {
    
	$country_id= $_POST['c_id'];
        $query = "SELECT * FROM tblstate WHERE country_id = '$country_id' ORDER BY state_name ASC";
	$run_query = mysqli_query($con, $query);
    
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display states list
    if($count > 0){
        echo '<option value="">Select state</option>';
        while($row = mysqli_fetch_array($run_query)){
		$state_id=$row['s_id'];
		$state_name=$row['state_name'];
        echo "<option value='$state_id'>$state_name</option>";
        }
    }else{
        echo '<option value="">State not available</option>';
    }
}

if(isset($_POST["s_id"])){
	$state_id= $_POST['s_id'];
    
    $query = "SELECT * FROM tblcity WHERE state_id = '$state_id' 
	ORDER BY city_name ASC";
    $run_query = mysqli_query($con, $query);
    //Count total number of rows
    $count = mysqli_num_rows($run_query);
    
    //Display cities list
    if($count > 0){
        echo '<option value="">Select city</option>';
        while($row = mysqli_fetch_array($run_query)){
		$city_id=$row['city_id'];
		$city_name=$row['city_name']; 
        echo "<option value='$city_id'>$city_name</option>";
        }
    }else{
        echo '<option value="">City not available</option>';
    }
}
?>


