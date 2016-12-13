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
<form id="form"action="add_author.php" method="post">
   <div id="rectangle">
    <h2> Add New Author and Book Details </h2>
    <div>
        <label id="author_label"for="author_name">Author Name:</label>
        <input type="name" id="author_name" name="author_name" required />
    </div>
       
    <div> <button type="submit" class="button">Next </button>
       
    </div>
    </div>
</form>
        <br><br><a href="books.php"><button class="button" id="link-btn">Add book for existing author </button></a>
</body>
</html>