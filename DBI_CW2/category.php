<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

$categoryID="";
$nametext="";
$last_update="";

if(isset($_POST["find"]))
{
    $data = getPosts();
    
    $search_Result = mysqli_query($link,"SELECT * FROM category WHERE category_id = $data[0]");
    if(mysqli_num_rows($search_Result))
    {
    
      while($row = mysqli_fetch_array($search_Result))
        {
            $categoryID = $row['category_id'];
            $nametext = $row['name'];
            $last_update = $row['last_update'];
   
        }
    }else{
        echo 'No data exists for this ID.';}
}
?>

<html lang="en">
<head>
  <title>Category Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Category Form</h2>
  <form action="" name="Category Table" method="post">
    <div class="form-group">
      <label for="categoryID">Category ID:</label>
      <input type="number" class="form-control" id="categoryID" placeholder="Enter category ID" name="categoryID" value="<?php echo $categoryID; ?>">
    </div>
    <div class="form-group">
      <label for="nametext">Name:</label>
      <input type="text" class="form-control" id="nametext" placeholder="Enter name" name="nametext" value="<?php echo $nametext; ?>">
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
    $posts[0] = $_POST['categoryID'];
    $posts[1] = $_POST['nametext'];
    $posts[2] = $_POST['last_update'];
    return $posts;
}

if(isset($_POST["insert"]))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `category`(`category_id`, `name`, `last_update`) VALUES ('$data[0]','$data[1]','$data[2]')";
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
    $delete_Query = "DELETE FROM `category` WHERE `category_id` = $data[0]";
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
    mysqli_query($link, "UPDATE `category` SET `name`='$data[1]',`last_update`='$data[2]' WHERE `category_id` = $data[0]");
    if(mysqli_affected_rows($link) > 0)
    {
        echo 'Data Updated';
    }else{
            echo 'Data Not Updated';
        }
}

?>


</html>