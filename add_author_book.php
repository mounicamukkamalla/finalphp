<?php

include 'connect.php';

//print_r($conn);
$title = $_POST['title'];
$year = $_POST['year'];

$sql2 = "SELECT author_id FROM authors";
$result = $conn->query($sql2);
$author_id = mysqli_num_rows($result);

$sql3 = "INSERT INTO books (author_id, title, year)
VALUES ('$author_id', '$title', '$year')";
if ($conn->query($sql3) === TRUE) { 
    //echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mounica";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql2 = "SELECT book_id from books WHERE title='$title'";
$result2 = $conn->query($sql2);

$book_row=$result2->fetch_assoc();

$book_id=$book_row['book_id'];

$query = "SELECT 
  author_name, title, year
FROM
  authors JOIN books
ON
  authors.author_id = books.author_id
  
 WHERE
  books.book_id='$book_id'";
  
$result = $conn->query($query);
$row=$result->fetch_assoc();

$author_name=$row["author_name"];
$book=$row["title"];
$year=$row["year"];

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>form</title>
<link type='text/css' rel='stylesheet' href='style.css'/>
<title>PHP!</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="index.php">MY LIBRARY</a>
    </div>
    <nav>
    <ul>
      <li><a href="author.php">Add a Book</a></li>
    </ul>
    <form id="search" action="search_results.php" method="post">
      <input type="text" name="search_query" placeholder="Search for book">
      <button type="submit">Go</button>
    </form>
    </nav>
    </header>

<div id="content_box">
  <div  id="rectangle">
	<h2>Entered Book Details</h2>
	<p>Author:<?php echo $author_name ?></p>
	<p>Book Title:<?php echo $book ?></p>
	<p>Year of publishing:<?php echo $year ?></p>
</div>
</div>

<br><br><a href="author.php"><button class="button" id="link-btn">Add another book </button></a>
</body>
</body>
</html>