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
$conn = mysqli_connect('localhost','root','','taskmate');

// Fetch rows from the table
$search_value = $current_user_id;

$query = "SELECT * FROM todays_tasks WHERE task_id = '" . mysqli_real_escape_string($conn, $search_value) . "'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
         // Output each row within a div
         echo '<h5>Due:' . $row['due_date'] . '</h5>';
         echo '<h5>Priority: ' . $row['priority'] . '</h5>';
         echo '<h5>Notes' . $row['task_description'] . '</h5>';
         // Add more columns as needed
    }
} else {
    echo 'No rows found.';
}

?>