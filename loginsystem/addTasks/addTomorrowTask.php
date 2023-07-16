<?php
  $conn = mysqli_connect('localhost','root','','taskmate');
 // Retrieve form data

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = mysqli_real_escape_string($conn, $_POST['task_id']);
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
    $priority = mysqli_real_escape_string($conn, $_POST['task_priority']);

  
    $add_task = "INSERT INTO tomorrows_tasks (task_id,task_name,task_description,due_date,priority)VALUES ('$task_id','$task_name','$task_description','$due_date','$priority')";
    if ($conn->query($add_task) === true) {
      echo "Data stored successfully!";
  } else {
      echo "Error storing data: " . $conn->error;
  }
  
  };
  

?>