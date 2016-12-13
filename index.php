<?php
include 'connect.php';

$sql = "SELECT 
  author_name, book_id, title, year
FROM
  authors JOIN books
ON
  authors.author_id = books.author_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Library System</title>

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

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

      <h1>Library System</h1>
      Filter by author name:<form  class="filter" action="filter_results.php" method="post">
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

      <button type="submit">Go</button>
      </form>

     
      <div class="sort">Sort:</div>
      <form  action="sorted_results.php" method="post">
        <select name="sort_type">
          <option value="new">Newest first</option>
          <option value="old">Oldest first</option>
        </select>
        <button type="submit">Go</button>
      </form>


      <div>
      <table>
      <?php

      if ($result->num_rows > 0) {
        echo "<tr><th>Author Name</th><th>Book Title</th><th>Year of Publishing</th></tr>";
          // output data of each row
          while($row = $result->fetch_assoc()) {
              echo "<tr><td>" . $row['author_name'] . "</td><td>" . $row['title'] . "</td><td>" . $row['year'] .
               "</td><td><a href=delete_book.php?book_id=" . $row['book_id']  ."> Delete</a>" .
               "</td><td><a href=update_book.php?book_id=" . $row['book_id']  ."> Update</a>" . "</td></tr>";
          }
      }
      ?>
    </table>
    </div>
  </body>
</html>