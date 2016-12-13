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
<form id="form" action="add_author_book.php" method="post">
    <div  id="rectangle">
    <h2> Add Book Details</h2>
    
    <div>
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" required />
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