<?php

include 'connect.php';

$book_id = $_GET['book_id'];

$query = "SELECT 
  title, year
FROM
  books  
 WHERE
  books.book_id='$book_id'";
  
$result = $conn->query($query);
$row=$result->fetch_assoc();

$book=$row["title"];
$year=$row["year"];


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

<body id="background">
<form action="update.php" method="post">
    <div  id="rectangle_update">
    <h2> Update Book </h2>
    <div>
        Author:
<select name="author">
<?php 
$query1 = "SELECT author_name from authors";
$result1 = $conn->query($query1);
$m=1;
while ($authors = $result1->fetch_assoc()) {
$query2 = "SELECT author_name from authors WHERE author_id=$m";
$result2 = $conn->query($query2);
$row=$result2->fetch_assoc();
$author_name=$row["author_name"];
echo "<option value=\"".$m."\">".$author_name."</option>";
$m++;
}
?>
</select>
    </div>
    
    <div>
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" value="<?php echo $book; ?>" />
    </div>

    <div>
        <label for="year">Book Year:</label>
        <input type="text" id="year" name="year" value="<?php echo $year; ?>" />
    </div>

    <input type="hidden" id="book_id" name="book_id" value="<?php echo $book_id; ?>" />
          
    <div>
        <button type="submit" class="button">Update </button>
    </div>
    </div>
</form>
</body>
</html>