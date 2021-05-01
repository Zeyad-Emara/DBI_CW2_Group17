<?php
$payment_id="";
$customer_id="";
$staff_id="";
$rental_id="";
$amount="";
$payment_date="";



if(isset($_POST["select"]))
{
    include_once 'connect.php';

    $payment_id = $_POST['Payment_Id'];
    
    $search_Result = mysqli_query($conn,"SELECT * FROM payment WHERE payment_id = $payment_id");
    
    while($row = mysqli_fetch_array($search_Result))
    {
        $payment_id = $row['payment_id'];
        $customer_id = $row['customer_id'];
        $staff_id = $row['staff_id'];
        $rental_id = $row['rental_id']; 
        $amount = $row['amount'];
        $payment_date = $row['payment_date'];
        
    
       
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
  <h2>Payment Info</h2>
  <form action="" name="form1" method="post">
    <div class="form-group">
      <label for="email">Payment_Id:</label>
      <input type="text" class="form-control" id="Payment_Id" placeholder="Enter Payment_Id" name="Payment_Id" value="<?php echo $payment_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Customer_Id:</label>
      <input type="text" class="form-control" id="Customer_Id" placeholder="Enter Customer_Id" name="Customer_Id" value="<?php echo $customer_id; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Staff_Id:</label>
      <input type="Text" class="form-control" id="Staff_id" placeholder="Enter Staff_id" name="Staff_Id" value="<?php echo $staff_id; ?>">
    <div class="form-group">
      <label for="pwd">Rental_Id:</label>
      <input type="text" class="form-control" id="Rental_Id" placeholder="Enter Rental_Id" name="Rental_Id" value="<?php echo $rental_id; ?>">
    </div>
    <div class="form-group">
      <label for="email">Amount:</label>
      <input type="text" class="form-control" id="Amount" placeholder="Enter Amount" name="Amount" value="<?php echo $amount; ?>">
    </div>
    <div class="form-group">
      <label for="pwd">Payment_Date:</label>
      <input type="text" class="form-control" id="Payment_Date" placeholder="Enter Payment_Date" name="Payment_Date" value="<?php echo $payment_date; ?>">
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

	$payment_id = $row['[payment_id'];
        $customer_id = $row['customer_id'];
        $staff_id = $row['staff_id'];
        $rental_id = $row['rental_id']; 
        $amount = $row['amount'];
        $payment_date = $row['payment_date'];

	$sql = "INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date) VALUES ('$payment_id', 
		'$customer_id', '$staff_id','$rental_id','$amount','$payment_date');";
	if(mysqli_query($conn, $sql))	
    {
        echo '<script>alert("Add Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/payment.php"</script>';
    }else{
        echo '<script>alert("Add Fail")</script>'; 
    }

	
}
    
elseif(isset($_POST["delete"]))
{
    
	include_once 'connect.php';

    $payment_id = $row['[payment_id'];
    $customer_id = $row['customer_id'];
    $staff_id = $row['staff_id'];
    $rental_id = $row['rental_id']; 
    $amount = $row['amount'];
    $payment_date = $row['payment_date'];

	$sql2 = "DELETE FROM payment WHERE payment_id='$payment_id';";	
	if(mysqli_query($conn, $sql2))	
    {
        echo '<script>alert("Dlt Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/payment.php"</script>';
    }else{
        echo '<script>alert("Dlt Fail")</script>'; 
    }

	
}
elseif(isset($_POST["update"]))
{

    include_once 'connect.php';

	    $payment_id = $_POST['[payment_id'];
        $customer_id = $_POST['customer_id'];
        $staff_id = $_POST['staff_id'];
        $rental_id = $_POST['rental_id']; 
        $amount = $_POST['amount'];
        $payment_date = $_POST['payment_date'];
	
	$sql3 = "UPDATE payment SET payment_id='$payment_id', customer_id='$customer_id', staff_id='$staff_id', rental_id='$rental_id', amount='$amount', payment_date='$payment_date' WHERE payment_id='$payment_id';";	
	if(mysqli_query($conn, $sql3))	
    {
        echo '<script>alert("Update Success")</script>';
       
        echo '<script>window.location.href = "http://localhost/DBI_CW/payment.php"</script>';
    }else{
        echo '<script>alert("Update Fail")</script>'; 
    }

	 
}

?>


</html>