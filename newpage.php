<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
include 'add_task.php' ; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TaskMate</title>
    <link rel="stylesheet" href="style2.css">
    <script src="script.js"></script> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">
    <script src="script.js"></script> 
</head>
<body>
    <header>
        <h2><a href="index.html">TaskMate</a></h2> 
        <div class="settings">
            <a href=""><img class="settings header_buttons" src="svgs/settings-svgrepo-com.svg" alt=""></a>
            <a href=""><img class="notifications header_buttons" src="svgs/notification-svgrepo-com.svg" alt=""></a>
        </div>  
    </header>
    <main>
        <div class="main_content">

            <div class="left_container section">
                <div class="profile">
                    <a href=""><img src="T.png" alt=""></a>
                    <h2>EK</h2>
                </div>
                <div class="days">
                    <div class="my_day day_select display_inline" onfocus="changeColor()">
                      <a href="">My Day</a>
                    </div>
                    <div class="tomorrow day_select display_inline">
                      <a href="">Tomorrow</a>
                    </div>
                    <div class="this_week day_select display_inline">
                      <a href="">This Week</a>
                    </div>
                    <div class="dropdown">
                      <button onclick="dropDown()" class="dropbtn">Lists</button>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="#">Personal</a>
                          <a href="#">College</a>
                          <a href="#">Work</a>
                        </div>
                    </div>
                    <div class="my_lists day_select">
                        My Lists
                    </div>
                </div>
            </div>
            <div class="center_container section">
                <div class="welcome_text">
                    <h1>Welcome, User</h1>
                    <h1 class="period">.</h1>
                </div>
                <div>
                    <button class="add_task_button" onclick="openForm()">Add Task</button>
                    <div id="myModal" class="modal">
                        <div class="task_form">
                            <span onclick="closeForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                            <h2>Task</h2>
                            <form action="" method="post">
                                <label for="task_name" class="form_label">Task Name:</label>
                                <input type="text" id="task_name" name="task_name" required><br><br>
                                <label for="description" class="form_label">Description</label>
                                <input type="textarea" id="description" name="description"><br><br>
                                <label for="time" class="form_label"></label>
                                <input type="time" id="time" name="time"><br><br>
                                <input type="submit" value="Add Task" class="add_task_submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="task_container">
                    <?php include 'show_task.php' ; ?>

                    <div id="updateForm" class="modal">
                        <div class="task_form">
                            <span onclick="closeUpdateForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                            <h2>Task</h2>
                            <form action="update_task.php" method="post">
                                <label for="task_name" class="form_label">Task Name:</label>
                                <input type="text" id="task_name" name="task_name" required><br><br>
                                <label for="description" class="form_label">Description</label>
                                <input type="textarea" id="description" name="description"><br><br>
                                <input type="submit" value="Update" class="add_task_submit">
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="right_container section">
                <div class="task_status_container">
                    <div class="task_status">Tasks :0</div>
                    <div class="task_status">Incomplete :0</div>
                    <div class="task_status">Complete :0</div>
                </div>

                <div class="footer">
                    <a href="">Blog</a>
                    <a href="">Privacy</a>
                    <a href="">Contact us</a>
                </div>
            </div>

            

        </div>
    </main>
</body>
</html>