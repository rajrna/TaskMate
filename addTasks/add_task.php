<?php
  session_start();
  // require_once 'config.php';

  if (isset($_SESSION['user_id'])) {
    $current_user_id = $_SESSION['user_id'];
    // Now you have the $current_user_id, and you can use it to interact with the database or perform other actions specific to the current user.
} else {
    // If the user is not logged in, you can redirect them to the login page or handle it in any way appropriate for your application.
    header('Location: login_form.php');
    exit;
}

  $conn = mysqli_connect('localhost','root','','taskmate');
 // Retrieve form data
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $task_id = mysqli_real_escape_string($conn, $_POST['task_id']);
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $task_description = mysqli_real_escape_string($conn, $_POST['task_description']);
    $due_date = mysqli_real_escape_string($conn, $_POST['due_date']);
    $priority = mysqli_real_escape_string($conn, $_POST['task_priority']);

  
    $add_task = "INSERT INTO todays_tasks (task_name,task_description,due_date,priority,user_id)VALUES ('$task_name','$task_description','$due_date','$priority','{$_SESSION['user_id']}')";
    if ($conn->query($add_task) === true) {
      echo "Data stored successfully!";
  } else {
      echo "Error storing data: " . $conn->error;
  }
  
  };
  

?>