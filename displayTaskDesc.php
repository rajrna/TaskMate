<?php
// Assuming you have a database connection established
$conn = mysqli_connect('localhost','root','','taskmate');

// Fetch rows from the table
$search_value = 'task_id';
$query = "SELECT * FROM todays_tasks";
$query = "SELECT * FROM todays_tasks WHERE task_id = '" . mysqli_real_escape_string($conn, $search_value) . "'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
         // Output each row within a div
         echo '<h5>Due:' . $row['due_date'] . '</h5>';
         echo '<h5>Priority' . $row['priority'] . '</h5>';
         // Add more columns as needed
    }
} else {
    echo 'No rows found.';
}

?>