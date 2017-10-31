<?php 
	$url = $_SERVER['HTTP_REFERER'];

	$servername = "localhost";
	$username = "root";
	$password = "";

	$qNum = $_POST['qNum'];
	$fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$email = $_POST['email'];
	$score = $_POST['ans1'] + $_POST['ans2'] + $_POST['ans3'] + $_POST['ans4'] + $_POST['ans5'];
	
	try {
	  $conn = new PDO("mysql:host=$servername;dbname=open_house", $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  // echo "Connected successfully";
	  $sql = "INSERT INTO `contestants` (`qNumber`, `first`, `last`, `email`, `score`) VALUES (LOWER('$qNum'), LOWER('$fName'), LOWER('$lName'), LOWER('$email'), $score)";
	  $conn->exec($sql); 
  } catch(PDOException $e) {
  		echo "Connection failed: " . $e->getMessage();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Good Luck <?php echo $fName; ?></title>
	<link rel="stylesheet" href="css/w3.css">
	<style>
		body {
			background-image: url("images/background.jpg");
			background-size: cover;
		}
	</style>
</head>
<body>
	<div class="w3-container w3-blue">
		<h1>Good Luck <?php echo $fName; ?>!</h1>
		<?php header("refresh:5;url=$url"); ?>
		<p class="w3-blue">You'll be redirected in about 5 seconds. If not click <a href="<?php echo $url; ?>">here</a>.</p>
	</div>
</body>
</html>
	

