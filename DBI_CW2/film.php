<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"entertainment") or die(mysqli_error($link));

$filmID="";
$titletext="";
$description="";
$releaseyear="";
$languageID="";
$rentalduration="";
$rentalrate="";
$lenght="";
$replacementcost="";
$rating="";
$specialfeatures="";
$last_update="";

if(isset($_POST["find"]))
{
    $data = getPosts();
    
    $search_Result = mysqli_query($link,"SELECT * FROM film WHERE film_id = $data[0]");
    if(mysqli_num_rows($search_Result))
    {
    
      while($row = mysqli_fetch_array($search_Result))
        {
            $filmID = $row['film_id'];
            $titletext = $row['title'];
            $description = $row['description'];
            $releaseyear = $row['release_year'];
            $languageID = $row['language_id'];
            $rentalduration = $row['rental_duration'];
            $rentalrate = $row['rental_rate'];
            $lenght = $row['lenght'];
            $replacementcost = $row['replacement_cost'];
            $rating = $row['rating'];
            $specialfeatures = $row['special_features'];
            $last_update = $row['last_update'];
   
        }
    }else{
        echo 'No data exists for this ID.';}
}
?>

<html lang="en">
<head>
  <title>Film Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="col-lg-4">
  <h2>Film Form</h2>
  <form action="" name="Film Table" method="post">
    <div class="form-group">
      <label for="filmID">Film ID:</label>
      <input type="number" class="form-control" id="filmID" placeholder="Enter film ID" name="filmID" value="<?php echo $filmID; ?>">
    </div>
    <div class="form-group">
      <label for="titletext">Title:</label>
      <input type="text" class="form-control" id="titletext" placeholder="Enter title" name="titletext" value="<?php echo $titletext; ?>">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <input type="text" class="form-control" id="description" placeholder="Enter description" name="description" value="<?php echo $description; ?>">
    </div>
    <div class="form-group">
      <label for="releaseyear">Release year:</label>
      <input type="text" class="form-control" id="releaseyear" placeholder="YYYY" name="releaseyear" value="<?php echo $releaseyear; ?>">
    </div>
    <div class="form-group">
      <label for="languageID">Language ID:</label>
      <input type="number" class="form-control" id="languageID" placeholder="Enter language ID" name="languageID" value="<?php echo $languageID; ?>">
    </div>
    <div class="form-group">
      <label for="rentalduration">Rental duration:</label>
      <input type="number" class="form-control" id="rentalduration" placeholder="Enter rental duration" name="rentalduration" value="<?php echo $rentalduration; ?>">
    </div>
    <div class="form-group">
      <label for="rentalrate">Rental rate:</label>
      <input type="number" class="form-control" id="rentalrate" placeholder="Enter rental rate" name="rentalrate" value="<?php echo $rentalrate; ?>">
    </div>
    <div class="form-group">
      <label for="lenght">Length of film:</label>
      <input type="number" class="form-control" id="lenght" placeholder="Enter length" name="lenght" value="<?php echo $lenght; ?>">
    </div>
    <div class="form-group">
      <label for="replacementcost">Replacement Cost:</label>
      <input type="number" class="form-control" id="replacementcost" placeholder="Enter replacement cost" name="replacementcost" value="<?php echo $replacementcost; ?>">
    </div>
    <div class="form-group">
      <label for="rating">Rating:</label>
      <input type="text" class="form-control" id="rating" placeholder="Enter rating" name="rating" value="<?php echo $rating; ?>">
    </div>
    <div class="form-group">
      <label for="specialfeatures">Special Features:</label>
      <input type="text" class="form-control" id="specialfeatures" placeholder="Enter special features" name="specialfeatures" value="<?php echo $specialfeatures; ?>">
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
    $posts[0] = $_POST['filmID'];
    $posts[1] = $_POST['titletext'];
    $posts[2] = $_POST['description'];
    $posts[3] = $_POST['releaseyear'];
    $posts[4] = $_POST['languageID'];
    $posts[5] = $_POST['rentalduration'];
    $posts[6] = $_POST['rentalrate'];
    $posts[7] = $_POST['lenght'];
    $posts[8] = $_POST['replacementcost'];
    $posts[9] = $_POST['rating'];
    $posts[10] = $_POST['specialfeatures'];
    $posts[11] = $_POST['last_update'];
    return $posts;
}

if(isset($_POST["insert"]))
{
    $data = getPosts();
    $insert_Query = "INSERT INTO `film`(`film_id`, `title`, `description`, `release_year`, `language_id`, `rental_duration`, `rental_rate`, `lenght`, `replacement_cost`, `rating`, `special_features`, `last_update`) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]')";
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
    $delete_Query = "DELETE FROM `film` WHERE `film_id` = $data[0]";
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
    mysqli_query($link, "UPDATE `film` SET `title`='$data[1]',`description`='$data[2]',`release_year`='$data[3]',`language_id`='$data[4]',`rental_duration`='$data[5]',`rental_rate`='$data[6]',`lenght`='$data[7]',`replacement_cost`='$data[8]',`rating`='$data[9]',`special_features`='$data[10]',`last_update`='$data[11]' WHERE `film_id` = $data[0]");
    if(mysqli_affected_rows($link) > 0)
    {
        echo 'Data Updated';
    }else{
            echo 'Data Not Updated';
        }
}

?>


</html>