<?php

if (isset($_SESSION['user_id'])) {
  $current_user_id = $_SESSION['user_id'];
  // Now you have the $current_user_id, and you can use it to interact with the database or perform other actions specific to the current user.
} else {
  // If the user is not logged in, you can redirect them to the login page or handle it in any way appropriate for your application.
  header('Location: login_form.php');
  exit;
}
// Assuming you have a database connection established
$conn = mysqli_connect('localhost', 'root', '', 'taskmate');

// Fetch rows from the table
$query = "SELECT * FROM todays_tasks WHERE user_id='{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  
    // Use the <label> element to associate the checkbox with the task name
        echo '<label class="display_inline" for="taskComplete_' . $row['task_id'] . '">' . $row['task_name'] . '</label>';
      // echo '<span>' . $row['task_name'] . '</span>';
        // echo '<h5>' . $row['task_description'] . '</h5>';   
    }
}