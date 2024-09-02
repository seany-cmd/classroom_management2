<?php
// 1. collect database info
$host = "127.0.0.1";
$database_name = "todoapp"; 
$database_user = "root";
$database_password = "";


$database = new PDO(
  "mysql:host=$host;dbname=$database_name",
  $database_user,
  $database_password 
);
$id = $_POST["student_id"];

// delete the selected student from the table using student ID
    // sql command (recipe)
    $sql = "DELETE FROM students where id = :id";
    // prepare 
    $query = $database->prepare( $sql );
    // execute
    $query->execute([
        'id' => $id
    ]);

   // redirect back to index.php
   header("Location: index.php");
   exit;