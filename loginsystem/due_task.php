<?php
$hostname     = "localhost";
$username     = "root";
$password     = "";
$databasename = "taskmate";
// Create connection
$connection = mysqli_connect($hostname, $username, $password,$databasename);
// Check connection
header("Refresh: 0; url=admin_page.php");
if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}

// Column name with boolean values
$columnName = 'task_status';

// SQL query to select rows with a boolean value of 0
$sql = "SELECT * FROM todays_tasks WHERE $columnName = 0";

// Execute the query
$result = mysqli_query($connection, $sql);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . mysqli_error($connection));
}

$sourceTable = "todays_tasks";
// Destination table name
$destinationTable = 'due_tasks';

// Check if the destination table already exists
// $tableExists = mysqli_query($connection, "SHOW TABLES LIKE '$newTableName'");


// Insert the selected data into the new table
while ($row = mysqli_fetch_assoc($result)) {
    // SQL query to copy data from source table to destination table
    $sql = "INSERT INTO $destinationTable SELECT * FROM $sourceTable WHERE $columnName = 0";

    if ($connection->query($sql) === TRUE) {
    echo "Data copied successfully.";
     } else {
    echo "Error copying data: " . $conn->error;
    }
}

// Close the database connection
mysqli_close($connection);

?>
