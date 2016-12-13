<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mounica";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$title = $_POST['title'];
$names = $_POST['names'];


$sql = "INSERT INTO books (title, names) 
VALUES ('$title, $names')";

if ($conn->query($sql) ===TRUE) {
	echo "New record created successfully <br>";
} else {
	echo "Error:" . $sql . "<br>" . $conn->error;
}

?>


<html>
<body>

Welcome <?php echo $title; ?><br>
Your name is: <?php echo $names; ?><br>

</body>
</html>