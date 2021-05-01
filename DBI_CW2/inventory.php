<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

$inventory_id="";
$film_id="";
$store_id="";


if(isset($_POST["find"]))
{
    $data = getPosts();
    
    $search_Result = mysqli_query($link,"SELECT * FROM inventory WHERE inventory_id = $data[0]");
    if(mysqli_num_rows($search_Result))
	{
		while($row = mysqli_fetch_array($search_Result))
		{
			$inventoryid = $row['inventory_id'];
			$film_id = $row['film_id'];
			$store_id= $row['store_id'];
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
  <title>inventory Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>inventory Form</h2>
  <form action="" name="inventory Table" method="post">
    <div class="form-group">
      <label for="inventory_id">inventory ID:</label>
      <input type="number" class="form-control" id="inventory_id" placeholder="Enter inventory ID" name="inventory_id" value="<?php echo $inventory_id; ?>">
    </div>
    <div class="form-group">
      <label for="film_id">film_id:</label>
      <input type="number" class="form-control" id="film_id" placeholder="Enter film id" name="film_id" value="<?php echo $film_id; ?>">
    </div>
	<div class="form-group">
      <label for="store_id">store_id:</label>
      <input type="number" class="form-control" id="store_id" placeholder="Enter store_id" name="store_id" value="<?php echo $store_id; ?>">
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
    $posts[0] = $_POST['inventory_id'];
    $posts[1] = $_POST['film_id'];
	$posts[2] = $_POST['store_id'];
    $posts[3] = $_POST['last_update'];
    return $posts;
}

if(isset($_POST["insert"]))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `inventory`(`inventory_id`,`store_id`,`store_id`, `last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]')";
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
    $delete_Query = "DELETE FROM `inventory` WHERE `inventory_id` = $data[0]";
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
    mysqli_query($link, "UPDATE `inventory` SET `film_id`='$data[1]',`store_id`='$data[2]',`last_update`='$data[3]', WHERE `inventory_id` = $data[0]");
    if(mysqli_affected_rows($link) > 0)
    {
        echo 'Data Updated';
    }else{
            echo 'Data Not Updated';
        }
}

?>


</html>