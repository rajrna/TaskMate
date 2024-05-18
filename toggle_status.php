<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get task_id and task_status from the POST request
    $task_id = $_POST["task_id"];
    $task_status = $_POST["task_status"];

    // Perform database update (replace with your database connection logic)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "taskmate";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL update statement
    $sql = "UPDATE todays_tasks SET task_status = ? WHERE task_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $task_status, $task_id);

    if ($stmt->execute()) {
        // Update was successful
        echo "success";
    } else {
        // Error occurred during the update
        echo "error";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // If it's not a POST request, return an error
    echo "Invalid request method";
}
?>
