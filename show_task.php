<?php
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
                    
    // Retrieve data from the table
    $show_tasks = "SELECT task_name,description  FROM tasks";
    $result = $conn->query($show_tasks);
                    
    if ($result->num_rows > 0) {
        // Generate HTML structure to display data
        echo '<div class="data-container">';
                        
    while ($row = $result->fetch_assoc()) {
        echo '<div class="task" onclick="openUpdateForm()">';
        echo 'Task: ' . $row["task_name"] . '<br>';
        echo 'Description: ' . $row["description"] . '<br>';
        echo '</div>';
        }
                        
        echo '</div>';
        } else {
            echo "No data available.";
        }

?>