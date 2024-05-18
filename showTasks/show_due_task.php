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

// Check if the delete button is clicked and handle the delete
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_query = "DELETE FROM due_tasks WHERE task_id = $delete_id";

    if (mysqli_query($conn, $delete_query)) {
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
}
// Check if the update button is clicked and handle the update
if (isset($_GET['update_id']) && isset($_GET['task_status'])) {
    $update_id = mysqli_real_escape_string($conn, $_GET['update_id']);
    $completed = ($_GET['task_status'] == 1) ? 0 : 1; // Toggle the boolean value

    $update_query = "UPDATE due_tasks SET task_status = $completed WHERE task_id = $update_id";

    if (mysqli_query($conn, $update_query)) {
        echo "Row updated successfully!";
    } else {
        echo "Error updating row: " . mysqli_error($conn);
    }
}

// Fetch rows from the table
$query = "SELECT * FROM due_tasks WHERE user_id='{$_SESSION['user_id']}'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output each row within a div
        echo '<div class="task">';
        echo '<div class="checkbox_Holder display_inline">';
        // Use task ID as part of the checkbox ID for uniqueness
        echo '<input class="display_inline checkboxes" type="checkbox" id="taskComplete_' . $row['task_id'] . '"';
        if ($row['task_status'] == 1) {
        echo ' checked';
        }
        echo ' onclick="updateStatus(' . $row['task_id'] . ', ' . $row['task_status'] . ')">';
        // Use the <label> element to associate the checkbox with the task name
        echo '<label class="display_inline" for="taskComplete_' . $row['task_id'] . '">' . $row['task_name'] . '</label>';
        echo '<br>';

        echo '<a class="display_inline delete_button" href="?delete_id=' . $row['task_id'] . '"><img src="svgs\trash.png"></a>';
        echo '<span class="display_inline task_id">' . $row['task_id'] . '</span>';
        echo '<h5 class="display_inline task_d">' . $row['task_description'] . '</h5>';
        echo '</div>';
        echo '<div " class="task_desc_short display_inline">';
        
        echo '<span class="display_inline">' . $row['task_id'] . '</span>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<br> <br> All tasks have been completed.';
}
?>
