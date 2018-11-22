<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome From Your Profile</title>

    <link rel="stylesheet" type="text/css" href=".css">

</head>
<body>
    
    

	<div class="header">
		<h1>Time line</h1>
        <div class=home>
	      <a href="facbookhome.php" class="home_btn">Log Out</a>   
        </div> 
    </div>

	<form method="post" action="index.php" >
		
		<div class="input-group">
			<label>Your quote</label>
			<textarea name="quote" rows="5" cols="20"></textarea>
		</div>
        
        <?php $results = mysqli_query($connection, "SELECT * FROM quotes ORDER BY created_at DESC"); ?>
        <div class = "return">
		<?php while ($row = mysqli_fetch_array($results) ) { ?>
			
                <p><?php echo $row['name']; ?></p>
				<p class = "secondrow"><?php echo $row['quote']; ?></p>
                <p class = "secondrow"><?php echo $row['created_at']; ?></p>
                <hr>
				<a href="process.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			
		<?php } ?>
            
        </div>
        
        
        <div class="input-group">
			<label>Your Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="addmyquote" style="background: #556B2F;" >Add my quote!</button>
			
		</div>
	</form>
    
<? php
    
	if (isset($_POST['addmyquote'])) {
    $quote = mysqli_real_escape_string($db, $_POST['quote']);
    $created_at = mysqli_real_escape_string($db, $_POST['created']);
	
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

	
	    
</body>
</html>