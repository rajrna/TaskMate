<?php
if (isset($_SESSION['user_id'])) {
    $current_user_id = $_SESSION['user_id'];
    // Now you have the $current_user_id, and you can use it to interact with the database or perform other actions specific to the current user.
  } else {
    // If the user is not logged in, you can redirect them to the login page or handle it in any way appropriate for your application.
    header('Location: login_form.php');
    exit;
  }
  $conn = mysqli_connect('localhost', 'root', '', 'taskmate');
// Your query to get the count
$sql = "SELECT COUNT(*) AS incomplete_tasks
    FROM todays_tasks
    WHERE user_id = '{$_SESSION['user_id']}' AND task_status = 0 ;";
$result = $conn->query($sql);

// Fetch the count
$row = $result->fetch_assoc();
$incompleteTasks = $row['incomplete_tasks'];

// Close the database connection

?>