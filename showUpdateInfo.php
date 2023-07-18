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

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Generate the link to the update form with the ID as a parameter
        echo '<a href="#" onclick="openUpdateForm(' . $row['task_id'] . ', \'' . $row['task_name'] . '\', \'' . $row['task_description'] . '\')">' .  '</a><br>';
    }
} else {
    echo 'No rows found.';
}


?>