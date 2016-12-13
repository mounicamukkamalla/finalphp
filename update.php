  <?php
include 'connect.php';

$author_id = $_POST['author'];
$title = $_POST['title'];
$year = $_POST['year'];
$book_id = $_POST['book_id'];

$sql =  "UPDATE books SET author_id='$author_id', title='$title', year = '$year'
  WHERE book_id = $book_id";

$result = $conn->query($sql);

 if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();


header("Location: index.php");
 ?>