<?php

include 'connect.php';

//print_r($conn);
$author_name = $_POST['author_name'];

$sql = "INSERT INTO authors (author_name)
VALUES ('$author_name')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully <br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: authorbook.php");
$conn->close();
?>