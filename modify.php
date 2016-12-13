<?php

if (isset($_POST['update']) || isset($_POST['delete'])) {
    // handle textarea

    if (isset($_POST['update'])) {
        header("Location: update_book.php");
        exit();
    }

    header("Location: delete_book.php");
    exit();
}

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
      <li><a href="modify.php">Update/Delete a Book </a></li>
    </ul>
    </nav>
    </header>
<form>
   <div id="rectangle">
    <h2> Search for a book to delete/update </h2>
    <div>
        <label id="author_label"for="author_name">Book Title:</label>
        <input type="name" id="author_name" name="author_name" required />
    </div>
       
    <div> <button type="submit" name="update" class="button">Update </button>
        <button type="submit" name="delete" class="button">Delete </button>
       
    </div>
    </div>
</form>
        
</body>
</html>