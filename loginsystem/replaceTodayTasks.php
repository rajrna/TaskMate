<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "taskmate";
// Create connection
$connection = mysqli_connect($hostname, $username, $password,$databasename);
// Check connection
// header("Refresh: 0; url=admin_page.php");
if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}

// Source table name
$sourceTable = "tomorrows_tasks";

// Destination table name
$destinationTable = "todays_tasks";

// SQL query to copy data from source table to destination table
$sql = "INSERT INTO $destinationTable SELECT * FROM $sourceTable";

if ($connection->query($sql) === TRUE) {
    echo "Data copied successfully.";
} else {
    echo "Error copying data: " . $conn->error;
}

// Close the connection
$connection->close();
?>
