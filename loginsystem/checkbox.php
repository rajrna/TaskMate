<?php
// Receive the checkbox value from the frontend
$checkboxValue = $_POST['checkboxValue'];

// Perform necessary validation and sanitization of the value

// Connect to the database
$mysqli = new mysqli('localhost', 'root', '', 'taskmate');

// Prepare and execute the update query
$stmt = $mysqli->prepare('UPDATE tasks SET task_status = ?');
$stmt->bind_param('i', $checkboxValue); // Assuming the column is of boolean type
$stmt->execute();


// Close the database connection

?>
