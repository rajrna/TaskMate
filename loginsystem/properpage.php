<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
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
                    <div class="day_select display_inline" >
                        <button id="btn1">My Day</button>
                      </div>
                      <div class="day_select display_inline">
                        <button id="btn2">Tomorrow</button>
                      </div>
                      <div class="day_select display_inline">
                        <button id="btn3">This Week</button>
                      </div>
                </div>
            </div>

            <div class="center_container section">
                <div class="welcome_text">
                    <h1>Welcome, User</h1>
                    <h1 class="period">.</h1>
                </div>
                
                <div id="myDayContainer" class="taskDisplayContainer">
                    <div class="addTaskButtonContainer">
                        <button class="add_task_button" onclick="openForm()">Add Task</button>
                        <div id="myModal" class="modal">
                            <div class="task_form" id='taskForm'>
                                <span onclick="closeForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                                <h2>Task</h2>
                                <form action="./addTasks/add_task.php" method="post">
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
                    <h1>Today</h1>
                    <?php include './showTasks/show_task.php' ; ?>

                    <div id="updateForm" class="modal">
                        <div class="task_form">
                            <span onclick="closeUpdateForm()" style="float: right; cursor: pointer; color: #001233;">&times;</span>
                            <h2>Task</h2>
                            <?php include 'displayTaskDesc.php';?>
                            <form action="update_task.php" method="post">
                                <input type="number" name="task_id" id="task_id">
                                <input type="text" id="task_name" name="task_name"  required ><br><br>
                                <input type="textarea" id="task_description" name="task_description"><br><br>
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
                                <form action="addTasks/addTomorrowTask.php" method="post">
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