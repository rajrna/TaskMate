<?php
// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskmate";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update data in the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTaskName = $_POST['newTaskName'];
    $newDescription = $_POST['newDescription'];

    $update_task = "UPDATE tasks SET task_name='$newTaskName', description='$newDescription' WHERE task_name=$task_name";

    if ($conn->query($update_task) === true) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

// Retrieve data from the table
$sql = "SELECT  task_name, description FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate HTML structure to display data and update form
    echo '<div class="data-container">';
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="tasks">';
        echo 'Task Name: ' . $row["task_name"] . '<br>';
        echo 'Description: ' . $row["description"] . '<br>';
        
        // // Update form for each data item
        // echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
        // echo 'New Name: <input type="text" name="newTaskName" required><br>';
        // echo 'New Description: <input type="email" name="newEmail" required><br>';
        // echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        // echo '<input type="submit" value="Update">';
        // echo '</form>';
        
        // echo '</div>';
    }
    
    echo '</div>';
} else {
    echo "No data available.";
}

// Close the database connection
$conn->close();
?>
