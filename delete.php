<?php
include 'connect.php'; /* connection of the intro for all files*/
$book_id = $_GET['book_id'];
$sql = "DELETE FROM books WHERE book_id=$book_id";
$result = $conn->query($sql);

 if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();


header("Location: index.php");
 ?>