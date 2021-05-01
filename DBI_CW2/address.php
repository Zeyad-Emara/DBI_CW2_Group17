<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

$addressID="";
$addresstext="";
$district="";
$cityID="";
$postalcode="";
$phone="";
$last_update="";

if(isset($_POST["find"]))
{
    $data = getPosts();
    
    $search_Result = mysqli_query($link,"SELECT * FROM address WHERE address_id = $data[0]");
    if(mysqli_num_rows($search_Result))
    {
    
      while($row = mysqli_fetch_array($search_Result))
        {
            $addressID = $row['address_id'];
            $addresstext = $row['address'];
            $district = $row['district'];
            $cityID = $row['city_id'];
            $postalcode = $row['postal_code'];
            $phone = $row['phone'];
            $last_update = $row['last_update'];
   
        }
    }else{
        echo 'No data exists for this ID.';}
}
?>

<html lang="en">
<head>
  <title>Address Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Address Form</h2>
  <form action="" name="Address Table" method="post">
    <div class="form-group">
      <label for="addressID">Address ID:</label>
      <input type="number" class="form-control" id="addressID" placeholder="Enter address ID" name="addressID" value="<?php echo $addressID; ?>">
    </div>
    <div class="form-group">
      <label for="addresstext">Address:</label>
      <input type="text" class="form-control" id="addresstext" placeholder="Enter address" name="addresstext" value="<?php echo $addresstext; ?>">
    </div>
    <div class="form-group">
      <label for="district">District:</label>
      <input type="text" class="form-control" id="district" placeholder="Enter district" name="district" value="<?php echo $district; ?>">
    </div>
    <div class="form-group">
      <label for="cityID">City ID:</label>
      <input type="number" class="form-control" id="cityID" placeholder="Enter city ID" name="cityID" value="<?php echo $cityID; ?>">
    </div>
    <div class="form-group">
      <label for="postalcode">Postal code:</label>
      <input type="text" class="form-control" id="postalcode" placeholder="Enter postal code" name="postalcode" value="<?php echo $postalcode; ?>">
    </div>
    <div class="form-group">
      <label for="phone">Phone:</label>
      <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="phone" value="<?php echo $phone; ?>">
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
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['addressID'];
    $posts[1] = $_POST['addresstext'];
    $posts[2] = $_POST['district'];
    $posts[3] = $_POST['cityID'];
    $posts[4] = $_POST['postalcode'];
    $posts[5] = $_POST['phone'];
    $posts[6] = $_POST['last_update'];
    return $posts;
}

if(isset($_POST["insert"]))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `address`(`address_id`, `address`, `district`, `city_id`, `postal_code`, `phone`, `last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
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
    $delete_Query = "DELETE FROM `address` WHERE `address_id` = $data[0]";
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
    mysqli_query($link, "UPDATE `address` SET `address`='$data[1]',`district`='$data[2]',`city_id`='$data[3]',`postal_code`='$data[4]',`phone`='$data[5]',`last_update`='$data[6]' WHERE `address_id` = $data[0]");
    if(mysqli_affected_rows($link) > 0)
    {
        echo 'Data Updated';
    }else{
            echo 'Data Not Updated';
        }
}

?>


</html>