<?php

// Your query to get the count
$sql = "SELECT COUNT(*) AS complete_tasks
    FROM todays_tasks
    WHERE task_status = 1;";
$result = $conn->query($sql);

// Fetch the count
$row = $result->fetch_assoc();
$completeTasks = $row['complete_tasks'];

// Close the database connection

?>