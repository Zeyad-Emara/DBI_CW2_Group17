<?php
$rental_id="";
$rental_date="";
$inventory_id="";
$customer_id="";
$return_date="";
$staff_id="";

if(isset($_POST["select"]))
{
    include_once 'connect.php';

    $rental_id = $_POST['Rental_Id'];
    
    $search_Result = mysqli_query($conn,"SELECT * FROM rental WHERE rental_id = $rental_id");
    
    while($row = mysqli_fetch_array($search_Result))
    {
        $rental_id = $row['rental_id'];
        $rental_date = $row['rental_date'];
        $inventory_id = $row['inventory_id'];
        $customer_id = $row['customer_id'];
        $return_date = $row['return_date'];
        $staff_id = $row['staff_id'];

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
  <h2>Rental Info</h2>
  <form action="" name="form1" method="post">
  <div class="form-group">
      <label for="email">Rental_Id:</label>
      <input type="text" class="form-control" id="Rental_Id" placeholder="Enter Rental_Id" name="Rental_Id" value="<?php echo $rental_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Rental_Date:</label>
      <input type="text" class="form-control" id="Rental_Date" placeholder="Enter Rental_Date" name="Rental_Date" value="<?php echo $rental_date; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Inventory_Id:</label>
      <input type="Text" class="form-control" id="Inventory_Id" placeholder="Eneter Inventoy_Id" name="Inventory_Id" value="<?php echo $inventory_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Customer_Id:</label>
      <input type="text" class="form-control" id="Customer_Id" placeholder="Enter Customer_Id" name="Customer_Id" value="<?php echo $customer_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Return_Date:</label>
      <input type="text" class="form-control" id="Return_Date" placeholder="Enter Return_Date" name="Return_Date" value="<?php echo $return_date; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Staff_Id:</label>
      <input type="text" class="form-control" id="Staff_Id" placeholder="Enter Staff_Id" name="Staff_Id" value="<?php echo $staff_id; ?>">
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

	$rental_id = $_POST['rental_id'];
	$rental_date = $_POST['rental_date'];
	$inventory_id = $_POST['inventory_id'];
    $customer_id = $_POST['customer_id'];
    $return_date = $_POST['return_date'];
    $staff_id = $_POST['staff_id'];

	$sql = "INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id) VALUES ('$rental_id', 
    '$rental_date', '$inventory_id','$customer_id','$return_date','$staff_id');";
	if(mysqli_query($conn, $sql))	
    {
        echo '<script>alert("Add Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/rental.php"</script>';
    }else{
        echo '<script>alert("Add Fail")</script>'; 
    }

	
}
    
elseif(isset($_POST["delete"]))
{
    
	include_once 'connect.php';

	$rental_id = $_POST['rental_id'];
	$rental_date = $_POST['rental_date'];
	$inventory_Id = $_POST['inventory_id'];
    $customer_id = $_POST['customer_id'];
    $return_date = $_POST['return_date'];
    $staff_id = $_POST['staff_id'];

	$sql2 = "DELETE FROM rental WHERE rental_id='$rental_id';";	
	if(mysqli_query($conn, $sql2))	
    {
        echo '<script>alert("Dlt Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/rental.php"</script>';
    }else{
        echo '<script>alert("Dlt Fail")</script>'; 
    }

	
}
elseif(isset($_POST["update"]))
{

    include_once 'connect.php';

	$rental_id = $_POST['Rental_Id'];
	$rental_date = $_POST['Rental_Date'];
	$inventory_id = $_POST['Inventory_Id'];
    $customer_id = $_POST['Customer_Id'];
    $return_date = $_POST['Return_Date'];
    $staff_id = $_POST['Staff_Id'];
    
	$sql3 = "UPDATE rental SET rental_id='$rental_id', rental_date='$rental_date', inventory_id='$inventory_id', customer_id='$customer_id', return_date='$return_date', staff_id='$staff_id' WHERE rental_id='$rental_id';";	
	if(mysqli_query($conn, $sql3))	
    {
        echo '<script>alert("Update Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/rental.php"</script>';
    }else{
        echo '<script>alert("Update Fail")</script>'; 
    }

	 
}


?>


</html>
