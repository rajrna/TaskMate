<?php

 // Retrieve form data

 if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
  
  
    $add_task = "INSERT INTO tasks (task_name,description)VALUES ('$task_name','$description')";
    if ($conn->query($add_task) === true) {
      echo "Data stored successfully!";
  } else {
      echo "Error storing data: " . $conn->error;
  }
  
  };
  

?>