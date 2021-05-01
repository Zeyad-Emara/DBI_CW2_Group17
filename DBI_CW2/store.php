<?php

$store_id="";
$manager_id="";
$address_id="";

if(isset($_POST["select"]))
{
    include_once 'connect.php';

    $store_id = $_POST['Store_Id'];
    
    $search_Result = mysqli_query($conn,"SELECT * FROM store WHERE store_id = $store_id");
    
    while($row = mysqli_fetch_array($search_Result))
    {
        $store_id = $row['store_id'];
        $manager_id = $row['manager_staff_id'];
        $address_id = $row['address_id'];
       
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
  <h2>Store Info</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="email">Store_Id:</label>
      <input type="text" class="form-control" id="Store_Id" placeholder="Enter Store_id" name="Store_Id" value="<?php echo $store_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Manager_Id:</label>
      <input type="text" class="form-control" id="Manager_Id" placeholder="Enter manager_Id" name="Manager_Id" value="<?php echo $manager_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Address_Id:</label>
      <input type="Text" class="form-control" id="Address_Id" placeholder="Eneter Address_Id" name="Address_Id" value="<?php echo $address_id; ?>">
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

	$store_id = $_POST['Store_Id'];
	$manager_id = $_POST['Manager_Id'];
	$address_id = $_POST['Address_Id'];

	$sql = "INSERT INTO store (store_id, manager_staff_id, address_id) VALUES ('$store_id', 
		'$manager_id', '$address_id');";
	if(mysqli_query($conn, $sql))	
    {
        echo '<script>alert("Add Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/DBI.php"</script>';
    }else{
        echo '<script>alert("Add Fail")</script>'; 
    }

	
}
    
elseif(isset($_POST["delete"]))
{
    
	include_once 'connect.php';

	$store_id = $_POST['Store_Id'];
	$manager_id = $_POST['Manager_Id'];
	$address_id = $_POST['Address_Id'];

	$sql2 = "DELETE FROM store WHERE store_id='$store_id';";	
	if(mysqli_query($conn, $sql2))	
    {
        echo '<script>alert("Dlt Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/DBI.php"</script>';
    }else{
        echo '<script>alert("Dlt Fail")</script>'; 
    }

	
}
elseif(isset($_POST["update"]))
{

    include_once 'connect.php';

	$store_id = $_POST['Store_Id'];
	$manager_id = $_POST['Manager_Id'];
	$address_id = $_POST['Address_Id'];
	
	$sql3 = "UPDATE store SET store_id='$store_id', manager_staff_id='$manager_id', address_id='$address_id' WHERE store_id='$store_id';";	
	if(mysqli_query($conn, $sql3))	
    {
        echo '<script>alert("Update Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/DBI.php"</script>';
    }else{
        echo '<script>alert("Update Fail")</script>'; 
    }

	 
}

?>


</html>
