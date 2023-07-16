<?php
// Assuming you have a database connection established
$conn = mysqli_connect('localhost','root','','taskmate');
// Check if the delete button is clicked and handle the delete
if (isset($_GET['delete_id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $delete_query = "DELETE FROM todays_tasks WHERE task_id = $delete_id";

    if (mysqli_query($conn, $delete_query)) {
        echo "Row deleted successfully!";
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }
}

// Fetch rows from the table
$query = "SELECT * FROM todays_tasks";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
         // Output each row within a div
         echo '<div class="task">';
         echo '<div>';
             echo '<input type="checkbox" id="taskComplete">';
         echo '</div>';
         echo '<div onclick="openUpdateForm()">';
         echo '<h5>' . $row['task_id'] . '</h5>';
         echo '<h5>' . $row['task_name'] . '</h5>';
         echo '<br><br>';
         echo '<h5>' . $row['task_description'] . '</h5>';
         echo '<br>';
         // Add the delete button with the corresponding row ID
         echo '<a href="?delete_id=' . $row['task_id'] . '">Delete</a>';
         echo '</div>';
         // Add more columns as needed
         echo '</div>';
    }
} else {
    echo 'No rows found.';
}

?>
