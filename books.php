<?php

include 'connect.php';

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
<form id="form"action="add_book.php" method="post">
    <div  id="rectangle">
    <h2> Add Book for existing author</h2>
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
        <input type="title" id="title" name="title" required />
    </div>

    <div>
        <label for="year">Book Year:</label>
        <input type="number" id="year" name="year" required />
    </div>
    
          
    <div>
        <button type="submit" class="button">Submit </button>
    </div>
    </div>
</form>
</body>
</html>