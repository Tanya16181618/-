<?php
	session_start();

	require_once "./functions/database_functions.php";
	// print out header here
	$title = "Покупка";
	require "./template/header.php";
	// connect database
	$conn = db_connect();


	// find customer
	$customerid = $_SESSION['id'];


	$date = date("Y-m-d H:i:s");



	foreach($_SESSION['cart'] as $id => $qty){
		insertIntoOrder($conn,  $customerid, $id, $date, $qty);
	}


    unset($_SESSION['cart']);

	header("Location: checkout.php?&success=true");
?>

<?php
	if(isset($conn)){
		mysqli_close($conn);
	}
	require_once "./template/footer.php";
?>