<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

$customer_id="";
$store_id="";
$first_name="";
$last_name="";
$email="";
$address_id="";
$active="";
$create_date="";
$last_update="";

if(isset($_POST["find"]))
{
    $data = getPosts();
    
    $search_Result = mysqli_query($link,"SELECT * FROM customer WHERE customer_id = $data[0]");
    if(mysqli_num_rows($search_Result))
	{
		while($row = mysqli_fetch_array($search_Result))
		{
			$customerid = $row['customer_id'];
			$store_id = $row['store_id'];
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
			$address_id = $row['address_id'];
			$active = $row['active'];
			$create_date = $row['create_date'];
			$last_update = $row['last_update'];
		}
	}
	else
	{
		echo 'Data Not Found';
	}
}
?>

<html lang="en">
<head>
  <title>customer Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>customer Form</h2>
  <form action="" name="customer Table" method="post">
    <div class="form-group">
      <label for="customer_id">customer ID:</label>
      <input type="number" class="form-control" id="customer_id" placeholder="Enter customer ID" name="customer_id" value="<?php echo $customer_id; ?>">
    </div>
    <div class="form-group">
      <label for="store_id">store_id:</label>
      <input type="number" class="form-control" id="store_id" placeholder="store_id" name="store_id" value="<?php echo $store_id; ?>">
    </div>
	<div class="form-group">
      <label for="first_name">first_name:</label>
      <input type="text" class="form-control" id="first_name" placeholder="Enter first_name" name="first_name" value="<?php echo $first_name; ?>">
    </div>
	<div class="form-group">
      <label for="last_name">last_name:</label>
      <input type="text" class="form-control" id="last_name" placeholder="Enter last_name" name="last_name" value="<?php echo $last_name; ?>">
    </div>
	<div class="form-group">
      <label for="email">email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email; ?>">
    </div>
	<div class="form-group">
      <label for="address_id">address_id:</label>
      <input type="number" class="form-control" id="address_id" placeholder="Enter address_id" name="address_id" value="<?php echo $address_id; ?>">
    </div>
	<div class="form-group">
      <label for="active">active:</label>
      <input type="number" class="form-control" id="active" placeholder="Enter active" name="active" value="<?php echo $active; ?>">
    </div>
	<div class="form-group">
      <label for="create_date">create_date:</label>
      <input type="datetime-local" class="form-control" id="create_date" placeholder="Enter date and time" name="create_date" value="<?php echo $create_date; ?>">
    </div>
    <div class="form-group">
      <label for="last_update">Last Update:</label>
      <input type="datetime-local" class="form-control" id="last_update" placeholder="Enter date and time" name="last_update" value="<?php echo $last_update; ?>">
    </div>
    <button type="submit" name="insert" class="btn btn-default">Insert</button>
    <button type="submit" name="delete" class="btn btn-default">Delete</button>
    <button type="submit" name="update" class="btn btn-default">Update</button>
    <button type="submit" name="find" class="btn btn-default">Find</button>
  </form>
</div>
</div>



</body>

<?php


function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['customer_id'];
    $posts[1] = $_POST['store_id'];
	$posts[2] = $_POST['first_name'];
	$posts[3] = $_POST['last_name'];
	$posts[4] = $_POST['email'];
	$posts[5] = $_POST['address_id'];
	$posts[6] = $_POST['active'];
	$posts[7] = $_POST['create_date'];
	$posts[8] = $_POST['last_update'];
	
    return $posts;
}

if(isset($_POST["insert"]))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `customer`(`customer_id`,`first_name`,`last_name`, `email`, `address_id`, `active`,`create_date`,`last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
    try{
        $insert_Result = mysqli_query($link, $insert_Query);
        
        if($insert_Result)
        {
            if(mysqli_affected_rows($link) > 0)
            {
                echo 'Data Inserted';
            }else{
                echo 'Data Not Inserted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Insert '.$ex->getMessage();
    }
}

if(isset($_POST["delete"]))
{
    $data = getPosts();
    $delete_Query = "DELETE FROM `customer` WHERE `customer_id` = $data[0]";
    try{
        $delete_Result = mysqli_query($link, $delete_Query);
        
        if($delete_Result)
        {
            if(mysqli_affected_rows($link) > 0)
            {
                echo 'Data Deleted';
            }else{
                echo 'Data Not Deleted';
            }
        }
    } catch (Exception $ex) {
        echo 'Error Delete '.$ex->getMessage();
    }
}


if(isset($_POST["update"]))
{
    $data = getPosts();
    mysqli_query($link, "UPDATE `customer` SET `first_name`='$data[2],`last_name`='$data[3], `email`='$data[4], `address_id`='$data[5], `active`='$data[6],`create_date`='$data[7],`last_update`='$data[8]', WHERE `customer_id` = $data[0]");
    if(mysqli_affected_rows($link) > 0)
    {
        echo 'Data Updated';
    }else{
            echo 'Data Not Updated';
        }
}

?>


</html>