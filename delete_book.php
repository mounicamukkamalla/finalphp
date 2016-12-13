<?php
$book_id = $_GET['book_id'];


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

<body id="background">
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

<form action="delete.php" method="get">
   <div id="rectangle_delete">
    <h2> Are you sure you want to delete this book?</h2>
    <div>
    <p>Author:<?php echo $author_name ?></p>
    <p>Book Title:<?php echo $book ?></p>
    <p>Year of publishing:<?php echo $year ?></p>
</div>
    <div>
        <input type="hidden" name="book_id" value="<?php echo "$book_id"; ?>">
    </div>
       
    <div> <button type="submit" name="delete" class="button">Yes </button>
       
    </div>
    </div>
</form>

        <a href="index.php"><button name="delete_not" class="button">No </button></a>
        
</body>
</html>