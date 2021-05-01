<?php
$staff_id="";
$first_name="";
$last_name="";
$address_id="";
$email="";
$store_id="";
$active="";
$username="";
$password="";


if(isset($_POST["select"]))
{
    include_once 'connect.php';

    $staff_id = $_POST['Staff_Id'];
    
    $search_Result = mysqli_query($conn,"SELECT * FROM staff WHERE staff_id = $staff_id");
    
    while($row = mysqli_fetch_array($search_Result))
    {
        $staff_id = $row['staff_id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $address_id = $row['address_id']; 
        $email = $row['email'];
        $store_id = $row['store_id'];
        $active = $row['active'];
        $username = $row['user_name'];
        $password = $row['password'];
    
       
    }
}
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Staff Info</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="email">Staff_Id:</label>
      <input type="text" class="form-control" id="Staff_Id" placeholder="Enter Staff_Id" name="Staff_Id" value="<?php echo $staff_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">First_name:</label>
      <input type="text" class="form-control" id="First_name" placeholder="Enter First_Name" name="First_Name" value="<?php echo $first_name; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Last_Name:</label>
      <input type="Text" class="form-control" id="Last_Name" placeholder="Enter Last_Name" name="Last_Name" value="<?php echo $last_name; ?>">
    <div class="form-group">
      <label for="pwd">Address_Id:</label>
      <input type="text" class="form-control" id="Address_Id" placeholder="Enter Address_Id" name="Address_Id" value="<?php echo $address_id; ?>">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="Email" placeholder="Enter Email" name="Email" value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Store_Id:</label>
      <input type="text" class="form-control" id="Store_Id" placeholder="Enter Store_id" name="Store_Id" value="<?php echo $store_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Active:</label>
      <input type="text" class="form-control" id="Active" placeholder="Enter 0or1" name="Active" value="<?php echo $active; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Username:</label>
      <input type="text" class="form-control" id="Username" placeholder="Enter Username" name="Username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" id="Password" placeholder="Enter Password" name="Password" value="<?php echo $password; ?>">
    </div>
    </div>
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    <button type="submit"  name="delete" class="btn btn-default">Delete</button>
    <button type="submit"  name="update" class="btn btn-default">Update</button>
    <button type="submit"  name="select" class="btn btn-default">Select</button>
  </form>
</div>
</div>


<div class="col-lg-12">


</div>


</body>


<?php
if(isset($_POST["insert"]))
{


	include_once 'connect.php';

	$staff_id = $_POST['Staff_Id'];
	$first_name = $_POST['First_Name'];
	$last_name = $_POST['Last_Name'];
    $address_id = $_POST['Address_Id'];
    $email = $_POST['Email'];
    $store_id = $_POST['Store_Id'];
    $active = $_POST['Active'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

	$sql = "INSERT INTO staff (staff_id, first_name, last_name, address_id, email, store_id, active, user_name, password) VALUES ('$staff_id', 
		'$first_name', '$last_name','$address_id','$email','$store_id','$active','$username','$password');";
	if(mysqli_query($conn, $sql))	
    {
        echo '<script>alert("Add Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/staff.php"</script>';
    }else{
        echo '<script>alert("Add Fail")</script>'; 
    }

	
}
    
elseif(isset($_POST["delete"]))
{
    
	include_once 'connect.php';

	$staff_id = $_POST['Staff_Id'];
	$first_name = $_POST['First_Name'];
	$last_name = $_POST['Last_Name'];
    $address_id = $_POST['Address_Id'];
    $email = $_POST['Email'];
    $store_id = $_POST['Store_Id'];
    $active = $_POST['Active'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];

	$sql2 = "DELETE FROM staff WHERE staff_id='$staff_id';";	
	if(mysqli_query($conn, $sql2))	
    {
        echo '<script>alert("Dlt Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/staff.php"</script>';
    }else{
        echo '<script>alert("Dlt Fail")</script>'; 
    }

	
}
elseif(isset($_POST["update"]))
{

    include_once 'connect.php';

	$staff_id = $_POST['Staff_Id'];
	$first_name = $_POST['First_Name'];
	$last_name = $_POST['Last_Name'];
    $address_id = $_POST['Address_Id'];
    $email = $_POST['Email'];
    $store_id = $_POST['Store_Id'];
    $active = $_POST['Active'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
	
	$sql3 = "UPDATE staff SET staff_id='$staff_id', first_name='$first_name', last_name='$last_name', address_id='$address_id', email='$email', store_id='$store_id', active='$active', user_name='$username', password='$password' WHERE staff_id='$staff_id';";	
	if(mysqli_query($conn, $sql3))	
    {
        echo '<script>alert("Update Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/staff.php"</script>';
    }else{
        echo '<script>alert("Update Fail")</script>'; 
    }

	 
}

?>


</html>
