<?php

// Your query to get the count
$sql = "SELECT COUNT(*) AS incomplete_tasks
    FROM tasks
    WHERE task_status = 0;";
$result = $conn->query($sql);

// Fetch the count
$row = $result->fetch_assoc();
$incompleteTasks = $row['incomplete_tasks'];

// Close the database connection

?>