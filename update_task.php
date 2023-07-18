<?php
// Assuming you have a database connection established already
$conn = mysqli_connect('localhost','root','','taskmate');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = mysqli_real_escape_string($conn, $_POST['task_id']); // Assuming you have an input field for the ID in your HTML form
    $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
    $description = mysqli_real_escape_string($conn, $_POST['task_description']);
    // SQL query to update data in the table
    $sql = "UPDATE todays_tasks SET task_name='$task_name', task_description='$description' WHERE task_id=$task_id";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the database connection
}
?>