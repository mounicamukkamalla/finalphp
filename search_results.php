<?php

$search_query = $_POST['search_query'];

include 'connect.php';

$sql = "SELECT 
  author_name, book_id, title, year
FROM
  authors JOIN books
ON
  authors.author_id = books.author_id
WHERE
books.title LIKE '$search_query'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Library System | Search Results</title>

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

      <h1>Search Results</h1>
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