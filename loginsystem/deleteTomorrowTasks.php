<?php
// Connect to the MySQL database
header("Refresh: 0; url=admin_page.php");
$conn = mysqli_connect('localhost','root','','taskmate');

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the current date
$currentDate = date("Y-m-d");

// Delete overdue tasks
$sql = "DELETE FROM tomorrows_tasks WHERE due_date = '$currentDate'";
if (mysqli_query($conn, $sql)) {
    echo "Overdue tasks deleted successfully.";
} else {
    echo "Error deleting overdue tasks: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
