<?php

// Your query to get the count
$sql = "SELECT COUNT(*) AS total_tasks FROM todays_tasks";
$result = $conn->query($sql);

// Fetch the count
$row = $result->fetch_assoc();
$totalTasks = $row['total_tasks'];

// Close the database connection

?>