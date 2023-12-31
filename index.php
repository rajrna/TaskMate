<?php
    session_start();
    require_once 'config.php';
    
    if(!isset($_SESSION['user_id'])){
        header('location:login_form.php');
     }
    
    // Get user-specific data using $_SESSION['user_id']
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM user_form WHERE id = '$user_id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="0; url=loginsystem/login_form.php"> -->
    <title>Taskmate</title>
    <link rel="icon" type="image/x-icon" href="T.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="darkmoe.css">
    
</head>
<body>
    <header class="dark-mode-div">
        <h2><a href="index.html">TaskMate</a></h2> 
        <div class="settings">
            <button id="dark-mode-toggle">Toggle Dark Mode</button>
            <a href="./loginsystem/logout.php"><img class="settings header_buttons" src="svgs/settings-svgrepo-com.svg" alt=""></a>    
            <a href=""><img class="notifications header_buttons" src="svgs/notification-svgrepo-com.svg" alt=""></a>
        </div> 
    </header>
    <main>
        <div class="main_content ">
            <div class="left_container section dark-mode-div">
                <div class="profile">
                    <a href=""><img src="T.png" alt=""></a>
                    <a href="profile.html"><?php include 'user_details.php';?></a>
                </div>
                <div class="days">
                    <div class="day_select dark-mode-div display_inline" >
                        <button id="btn1">My Day</button>
                      </div>
                      <div class="day_select dark-mode-div display_inline">
                        <button id="btn2">Tomorrow</button>
                      </div>
                      <div class="day_select dark-mode-div display_inline">
                        <button id="btn3">This Week</button>
                      </div>
                </div>
            </div>

            <div class="center_container section dark-mode-div">
                <div class="welcome_text">
                    <h1>Welcome,<?php include 'user_details.php';?></h1>
                    <h1 class="period">.</h1>
                </div>
                
                <div id="myDayContainer" class="taskDisplayContainer">
                    <div class="addTaskButtonContainer">
                        <button class="add_task_button" onclick="openForm()">Add Task</button>
                        <div id="myModal" class="modal">
                         <div class="task_form" id='taskForm'>
                            <span onclick="closeForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                            <h2>Task</h2>
                            <form id="addTaskForm">
                                <!-- <input type="number" name="task_id" id="task_id" required placeholder="Task No."><br><br> -->
                                <input type="text" id="task_name" name="task_name" required placeholder="Task Name"><br><br>
                                <input type="textarea" id="task_description" name="task_description" placeholder="Description"><br><br>
                                <input type="date" name="due_date" id="due_date">
                                <label for="task_priority">Priority</label>
                                <select name="task_priority" id="task_priority">
                                    <option value="normal">Normal</option>
                                    <option value="low">Low</option>
                                    <option value="urgent">Urgent</option>
                                </select>
                                <input type="submit" value="Add Task" class="add_task_submit">
                            </form>
                         </div>
                        </div>
                    </div>
                    <h1>Today</h1>
                    <?php include './showTasks/show_task.php' ; ?>

                    <div id="updateForm" class="modal">
                        <div class="task_form">
                            <span onclick="closeUpdateForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                            <h2>Task</h2>
                            <?php include 'displayTaskDesc.php';?>
                            <form action="update_task.php" method="post">
                                <input type="number" name="task_id" id="task_id" value="">
                                <input type="text" id="task_name" name="task_name" required value="" ><br><br>
                                <input type="textarea" id="task_description" name="task_description" value=""><br><br>
                                <input type="submit" value="Update" class="add_task_submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div id="tomorrowContainer" class="taskDisplayContainer">
                    <div class="addTaskButtonContainer">
                        <button class="add_task_button" onclick="openTomorrowForm()">Add Task</button>
                        <div id="myModalTomorrow" class="modal">
                            <div class="task_form" id='taskFormTomorrow'>
                                <span onclick="closeTomorrowForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                                <h2>Task</h2>
                                <form id="addTaskFormTomorrow" method="post">
                                    <input type="number" name="task_id" id="task_id" required placeholder="Task No."><br><br>
                                    <input type="text" id="task_name" name="task_name" required placeholder="Task Name"><br><br>
                                    <input type="textarea" id="task_description" name="task_description" placeholder="Description"><br><br>
                                    <input type="date" name="due_date" id="due_date">
                                    <label for="task_priority">Priority</label>
                                    <select name="task_priority" id="task_priority">
                                        <option value="normal">Normal</option>
                                        <option value="low">Low</option>
                                        <option value="urgent">Urgent</option>
                                    </select>
                                    <input type="submit" value="Add Task" class="add_task_submit">
                                </form>
                            </div>
                        </div>
                    </div>
                    <h1>Tomorrow</h1>
                    <?php include './showTasks/showTomorrowTask.php' ; ?>
                </div>
                <div id="thisWeekContainer" class="taskDisplayContainer">
                    <div class="addTaskButtonContainer">
                        <button class="add_task_button" onclick="openForm()">Add Task</button>
                        <div id="myModal" class="modal">
                            <div class="task_form" id='taskForm'>
                                <span onclick="closeForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                                <h2>Task</h2>
                                <form action="add_task.php" method="post">
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
                    <h1>This week</h1>
                </div>
            </div>
            <div class="right_container section dark-mode-div-alt">
                <div class="task_status_container">
                    <div class="task_status">Tasks :<?php include './taskStatus/NoOfTask.php'; echo $totalTasks; ?></div>
                    <div class="task_status">Incomplete :<?php include './taskStatus/NotCompletedTask.php'; echo $incompleteTasks; ?></div>
                    <div class="task_status">Complete :<?php include './taskStatus/CompletedTask.php'; echo $completeTasks; ?></div>
                </div>
                <div class="productivity">
                    <h3>Your productivity</h3>
                    <h4>Login Streak:</h4>
                    <h4>Tasks overdue:</h4>
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
<script src="script.js"></script>
<script src="jquery-3.7.0.min.js"></script>
<script src="./showTasks/statusUpdate.js"></script>
</html>