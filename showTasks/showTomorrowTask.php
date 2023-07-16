<?php
// Assuming you have a database connection established
$conn = mysqli_connect('localhost','root','','taskmate');

// Fetch rows from the table
$query = "SELECT * FROM tomorrows_tasks";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output each row within a div
        echo '<div class="task">';
        echo '<div>';
            echo '<input type="checkbox" id="taskComplete">';
        echo '</div>';
        echo '<h2>' . $row['task_name'] . '</h2>';
        echo '<br><br>';
        echo '<h2>' . $row['task_description'] . '</h2>';
        echo '<br>';
        echo '<h2>' . $row['due_date'] . '</h2>';
        echo '<br><br>';
        echo '<h2>' . $row['priority'] . '</h2>';
        echo '<br><br>';
        // Add more columns as needed
        echo '</div>';
    }
} else {
    echo 'No rows found.';
}

?>
