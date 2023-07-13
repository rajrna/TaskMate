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

// Retrieve data from the table
$sql = "SELECT task_name,description  FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate HTML structure to display data
    echo '<div class="data-container">';
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="task">';
        echo 'Name: ' . $row["task_name"] . '<br>';
        echo 'Email: ' . $row["description"] . '<br>';
        echo '</div>';
    }
    
    echo '</div>';
} else {
    echo "No data available.";
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>




<!--  -->
// Update data in the table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $newName = $_POST['newName'];
    $newEmail = $_POST['newEmail'];

    $sql = "UPDATE users SET name='$newName', email='$newEmail' WHERE id=$id";

    if ($conn->query($sql) === true) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data: " . $conn->error;
    }
}

// Retrieve data from the table
$sql = "SELECT id, name, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate HTML structure to display data and update form
    echo '<div class="data-container">';
    
    while ($row = $result->fetch_assoc()) {
        echo '<div class="data-item">';
        echo 'ID: ' . $row["id"] . '<br>';
        echo 'Name: ' . $row["name"] . '<br>';
        echo 'Email: ' . $row["email"] . '<br>';
        
        // Update form for each data item
        echo '<form method="post" action="' . $_SERVER["PHP_SELF"] . '">';
        echo 'New Name: <input type="text" name="newName" required><br>';
        echo 'New Email: <input type="email" name="newEmail" required><br>';
        echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
        echo '<input type="submit" value="Update">';
        echo '</form>';
        
        echo '</div>';
    }
    
    echo '</div>';
} else {
    echo "No data available.";
}
</html>