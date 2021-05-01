<?php

$language_id="";
$name="";

if(isset($_POST["select"]))
{
    include_once 'connect.php';

    $language_id = $_POST['Language_Id'];
    
    $search_Result = mysqli_query($conn,"SELECT * FROM language WHERE language_id = $language_id");
    
    while($row = mysqli_fetch_array($search_Result))
    {
        $language_id = $row['language_id'];
        $name = $row['name'];

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
  <h2>Language Info</h2>
  <form action="" name="form1" method="post">
  <div class="form-group">
      <label for="email">Language_Id:</label>
      <input type="number" class="form-control" id="Language_Id" placeholder="Enter Language_Id" name="Language_Id" value="<?php echo $language_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Name:</label>
      <input type="text" class="form-control" id="Name" placeholder="Enter Name" name="Name" value="<?php echo $name; ?>">
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

	$language_id = $_POST['language_id'];
	$name = $_POST['name'];
	
	$sql = "INSERT INTO language (language_id, name) VALUES ('$language_id', '$name');";
	if(mysqli_query($conn, $sql))	
    {
        echo '<script>alert("Add Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/language.php"</script>';
    }else{
        echo '<script>alert("Add Fail")</script>'; 
    }

	
}
    
elseif(isset($_POST["delete"]))
{
    
	include_once 'connect.php';

	$language_id = $_POST['language_id'];
	$name = $_POST['name'];

	$sql2 = "DELETE FROM language WHERE language_id='$language_id';";	
	if(mysqli_query($conn, $sql2))	
    {
        echo '<script>alert("Dlt Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/language.php"</script>';
    }else{
        echo '<script>alert("Dlt Fail")</script>'; 
    }

	
}
elseif(isset($_POST["update"]))
{

    include_once 'connect.php';

	$language_id = $_POST['Languagee_id'];
    $name = $_POST['Name'];
	
	$sql3 = "UPDATE language SET language_id='$language_id', name='$name'WHERE language_id='$language_id';";	
	if(mysqli_query($conn, $sql3))	
    {
        echo '<script>alert("Update Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/language.php"</script>';
    }else{
        echo '<script>alert("Update Fail")</script>'; 
    }

	 
}


?>


</html>
