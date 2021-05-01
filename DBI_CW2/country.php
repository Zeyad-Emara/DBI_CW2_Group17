<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

$country_id="";
$country ="";
$last_update="";

if(isset($_POST["find"]))
{
    $data = getPosts();
    
    $search_Result = mysqli_query($link,"SELECT * FROM country WHERE country_id = $data[0]");
    if(mysqli_num_rows($search_Result))
	{
		while($row = mysqli_fetch_array($search_Result))
		{
			$country_id = $row['country_id'];
			$country = $row['country'];
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
  <title>Country Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Country Form</h2>
  <form action="" name="country Table" method="post">
    <div class="form-group">
      <label for="country_id">country ID:</label>
      <input type="number" class="form-control" id="country_id" placeholder="Enter country ID" name="country_id" value="<?php echo $country_id; ?>">
    </div>
    <div class="form-group">
      <label for="country">country:</label>
      <input type="text" class="form-control" id="country" placeholder="Enter country name" name="country" value="<?php echo $country; ?>">
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
    $posts[0] = $_POST['country_id'];
    $posts[1] = $_POST['country'];
    $posts[2] = $_POST['last_update'];
    return $posts;
}

if(isset($_POST["insert"]))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `country`(`country_id`,`country`, `last_update`) VALUES ('$data[0]','$data[1]','$data[2]')";
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
    $delete_Query = "DELETE FROM `country` WHERE `country_id` = $data[0]";
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
    mysqli_query($link, "UPDATE `country` SET `country`='$data[1]',`last_update`='$data[2]', WHERE `country_id` = $data[0]");
    if(mysqli_affected_rows($link) > 0)
    {
        echo 'Data Updated';
    }else{
            echo 'Data Not Updated';
        }
}

?>


</html>