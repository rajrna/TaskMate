<?php
if (isset($_SESSION['user_id'])) {
    $current_user_id = $_SESSION['user_id'];
    // Now you have the $current_user_id, and you can use it to interact with the database or perform other actions specific to the current user.
  } else {
    // If the user is not logged in, you can redirect them to the login page or handle it in any way appropriate for your application.
    header('Location: login_form.php');
    exit;
  }
// Check if the delete button is clicked and handle the delete
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_query = "DELETE FROM tomorrows_tasks WHERE task_id = $delete_id";

    if (mysqli_query($conn, $delete_query)) {
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
}
// Check if the update button is clicked and handle the update
if (isset($_GET['update_id']) && isset($_GET['task_status'])) {
    $update_id = mysqli_real_escape_string($conn, $_GET['update_id']);
    $completed = ($_GET['task_status'] == 1) ? 0 : 1; // Toggle the boolean value

    $update_query = "UPDATE tomorrows_tasks SET task_status = $completed WHERE task_id = $update_id";

    if (mysqli_query($conn, $update_query)) {
        echo "Row updated successfully!";
    } else {
        echo "Error updating row: " . mysqli_error($conn);
    }
}
// Assuming you have a database connection established
$conn = mysqli_connect('localhost','root','','taskmate');

// Fetch rows from the table
$query = "SELECT * FROM tomorrows_tasks WHERE user_id='{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output each row within a div
        echo '<div class="task">';
        echo '<div>';
        // Use task ID as part of the checkbox ID for uniqueness
        echo '<input type="checkbox" id="taskComplete_' . $row['task_id'] . '" onclick="updateStatus(' . $row['task_id'] . ', ' . $row['task_status'] . ')">';
        // Use the <label> element to associate the checkbox with the task name
        echo '<label for="taskComplete_' . $row['task_id'] . '">' . $row['task_name'] . '</label>';
        echo '</div>';
        echo '<div onclick="openUpdateForm()" class="task_desc_short">';
        echo '<h5>' . $row['task_id'] . '</h5>';
        echo '<h5>' . $row['task_name'] . '</h5>';
        // echo '<h5>' . $row['task_description'] . '</h5>';
        // Add the delete button with the corresponding row ID
        echo '<a href="?delete_id=' . $row['task_id'] . '">Delete</a>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo 'No rows found.';
}
?>
