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
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
    
</head>
<body>
    <!-- <div class="pattern"></div> -->
    <header class="dark-mode-div">
        <h2><a href="index.html">TaskMate</a></h2> 
        <div class="settings">
            <div id="dark-mode-toggle">
                <!-- SVG code for the dark mode icon -->
                <img  class="settings dark_mode header_buttons" src="svgs/sunshine.png" alt="">
            </div>
            <a href="./loginsystem/logout.php"><img class="logout header_buttons" src="svgs/logout.png" alt=""></a>    
        </div> 
    </header>
    <main>
        <div class="main_content ">
            <div class="left_container section comic_border ">
                <div class="profile">
                    <a href=""><img src="svgs/user.png" alt=""></a>
                    <a href="profile.php" id="userName"><?php include 'user_details.php';?></a>
                </div>
                <div class="days">
                    <div class="day_select day_select_today  display_inline" >
                        <button id="btn1" class="day_selection_button">My Day</button>
                      </div>
                      <div class="day_select day_select_tomorrow display_inline">
                        <button id="btn2" class="day_selection_button">Tomorrow</button>
                      </div>
                      <div class="day_select day_select_week display_inline">
                        <button id="btn3" class="day_selection_button">Overdue</button>
                      </div>
                </div>
            </div>

            <div class="center_container section comic_border2">
                <div class="welcome_text">
                    <p class="display_inline j_welcome">Welcome , <?php include 'user_details.php';?></p>   
                    <p class="period display_inline">!</p>
                    <div>
                    <p class="display_inline welcome">What will you accomplish today?</p>
                    </div>
                    
                    
                </div>
                
                
                <div id="myDayContainer" class="taskDisplayContainer">
                    <div class="addTaskButtonContainer">
                        <button class="add_task_button comic_border" onclick="openForm()">Add Task</button>
                        <div id="myModal" class="modal">
                         <div class="task_form comic_border" id='taskForm'>
                            <span onclick="closeForm()" style="float: right; cursor: pointer; color: #001233; left: -23 ;font-size: 30px;">&times;</span>
                            <h2>Task</h2>
                            <form id="addTaskForm" action="index.php">
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
                    <p class="day_define">TODAY,</p>
                    <p id="currentDate"></p>
                    <div class="overflows comic_border">
                        <?php include './showTasks/show_task.php' ; ?>
                    </div>
                    

                    <div id="updateForm" class="modal">
                        <div class="task_form comic_border">
                        <span onclick="closeUpdateForm()" style="float: right; cursor: pointer; color: #001233; font-size: 30px;">×</span>
                            <h2>Task</h2>
                            <form action="update_task.php" method="post">
                                <input type="number" name="task_id" id="task_id" value="<?php include 'task_id.php';?>">
                                <input type="text" id="task_name" name="task_name" required value="" ><br><br>
                                <input type="textarea" id="task_description" name="task_description" value=""><br><br>
                                <input type="submit" value="Update" class="add_task_submit">
                            </form>
                        </div>
                    </div>
                </div>
                <div id="tomorrowContainer" class="taskDisplayContainer">
                    <div class="addTaskButtonContainer">
                        <button class="add_task_button comic_border" onclick="openTomorrowForm()">Add Task</button>
                        <div id="myModalTomorrow" class="modal">
                            <div class="task_form comi_border" id='taskFormTomorrow'>
                                <span onclick="closeTomorrowForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                                <h2>Task</h2>
                                <form id="addTaskFormTomorrow">
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
                    <p class="day_define">Tomorrow</p>
                    <div class="overflows comic_border">
                        <?php include './showTasks/showTomorrowTask.php' ; ?>
                    </div>
                    
                </div>
                <div id="updateFormTomorrow" class="modal">
                    <div class="task_form comic_border">
                    <span onclick="closeUpdateFormTom()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                    <h2>Task</h2>
                    <form action="update_task_tom.php" method="post">
                        <input type="number" name="task_id" id="task_id" value="" placeholder="Task id">
                        <input type="text" id="task_name" name="task_name" placeholder="Task name" required value="" ><br><br>
                        <input type="textarea" id="task_description" name="task_description" placeholder="Description" value=""><br><br>
                        <input type="submit" value="Update" class="add_task_submit">
                    </form>
                    </div>
                </div>

                <div id="thisWeekContainer" class="taskDisplayContainer">
                     
                <p class="day_define due_task">Overdue Tasks</p>
                    <div class="overflows comic_border">
                        <?php include './showTasks/show_due_task.php' ; ?>
                    </div>
                    
                </div>
            </div>
            <div class="right_container section comic_border3 dark-mode-div-alt">
                <div class="task_status_container">
                    <div class="task_status">Tasks :<?php include './taskStatus/NoOfTask.php'; echo $totalTasks; ?></div>
                    <div class="task_status">Incomplete :<?php include './taskStatus/NotCompletedTask.php'; echo $incompleteTasks; ?></div>
                    <div class="task_status">Complete :<?php include './taskStatus/CompletedTask.php'; echo $completeTasks; ?></div>
                </div>
                <div class="productivity">
                    <h3>Your productivity</h3>
                    <!-- <h4>Login Streak:</h4> -->
                    <h4>Tasks overdue: <?php include './taskStatus/NoOfDueTask.php'; echo $totalTasks; ?></h4>
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
<script src="statusUpdate.js"></script>
</html>