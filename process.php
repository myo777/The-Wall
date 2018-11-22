<?php 
require('server.php');
    session_start();


if (isset($_POST['addmyquote'])) {
	
	$check=0;
		
    if (empty($_POST['quote'])) {						
		$_SESSION['message']= "Your Quotes is required.......!";
		$check=$check+1;
		header('location: index.php');
		}
	
		


	if (isset($_POST['addmyquote']) && ($check==0)) { 		
		
		$quote = $_POST['quote' ];
        $created_at = $_POST['created_at'];

		mysqli_query($connection, "INSERT INTO quotes ( quote, created_at ) VALUES ('$quote','$created_at')"); 
		$_SESSION['message'] = "quote is Added"; 
		header('location: index.php');
	}


}




	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($connection, "DELETE FROM quotes WHERE id=$id");
		$_SESSION['message'] = "quote is deleted!"; 
		header('location: index.php');
	}
?>
