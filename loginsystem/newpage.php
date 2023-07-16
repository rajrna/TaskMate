<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
include './addTasks/add_task.php' ; 
include 'update_task.php' ;

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
                    <div class="day_select display_inline" >
                      <button id="btn1">My Day</button>
                    </div>
                    <div class="day_select display_inline">
                      <button id="btn2">Tomorrow</button>
                    </div>
                    <div class="day_select display_inline">
                      <button id="btn3">This Week</button>
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
                        <div class="task_form" id='taskForm'>
                            <span onclick="closeForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                            <h2>Task</h2>
                            <form action="./addTasks/add_task.php" method="post">
                                <input type="number" name="task_no" id="task_no" required placeholder="Task No."><br><br>
                                <input type="text" id="task_name" name="task_name" required placeholder="Task Name"><br><br>
                                <input type="textarea" id="description" name="description" placeholder="Description"><br><br>
                                <div>
                                    <label for="date" class="form_label"></label>
                                    <input type="date" name="Due date" id="date">
                                </div>
                                <input type="submit" value="Add Task" class="add_task_submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="task_container">
                    <div id="myDayContainer">
                        <?php include './showTasks/show_task.php' ; ?>

                        <div id="updateForm" class="modal">
                            <div class="task_form">
                                <span onclick="closeUpdateForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                                <h2>Task</h2>
                                <form action="update_task.php" method="post">
                                    <input type="text" id="task_name" name="task_name"  required ><br><br>
                                    <input type="textarea" id="description" name="description"><br><br>
                                    <input type="submit" value="Update" class="add_task_submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="tomorrowContainer">
                        <h1>Tomorrow</h1>
                    </div>
                    <div id="thisWeekContainer">
                        <h1>This week</h1>
                    </div>
                </div>
            </div>
            
            <div class="right_container section">
                <div class="task_status_container">
                    <div class="task_status">Tasks :<?php include './taskStatus/NoOfTask.php'; echo $totalTasks; ?></div>
                    <div class="task_status">Incomplete :<?php include './taskStatus/NotCompletedTask.php'; echo $incompleteTasks; ?></div>
                    <div class="task_status">Complete :<?php include './taskStatus/CompletedTask.php'; echo $completeTasks; ?></div>
                </div>
                <div class="productivity">
                    <h3>Your productivity</h3>
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