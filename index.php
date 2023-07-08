<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taskmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
  // Retrieve form data

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $task_name = mysqli_real_escape_string($conn, $_POST['task_name']);
  $description = mysqli_real_escape_string($conn, $_POST['description']);


  $add_task = "INSERT INTO tasks (task_name,description)VALUES ('$task_name','$description')";
  if ($conn->query($add_task) === true) {
    echo "Data stored successfully!";
} else {
    echo "Error storing data: " . $conn->error;
}

};
?>



<!DOCTYPE html>
<html>
<head>
  <title>TaskMate</title>
    <link rel="stylesheet" href="style.css">
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
    <div class="home_container section">
      <div class="sidebar">
        <div >
            <a href="profile.html"><img src="svgs/user-svgrepo-com.png" class="profile_pic" alt=""></a>
        </div>
        <div>
          <h1>EK</h1><br>
          <h2>Streak :5D</h2>
        </div>
        
        <div class="days">
          <div class="my_day day_select">
            <a href="">My Day</a>
          </div>
          <div class="tomorrow day_select">
            <a href="">Tomorrow</a>
          </div>
          <div class="this_week day_select">
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
        </div>
        <div class="my_lists day_select">
          My Lists
        </div>
      </div>
      
      <br><br>
      <div class="list_container section">
        <div class="welcome_text">
          <h1>Welcome, User</h1>
          <h1 class="period">.</h1>
          
        </div>
        
              <div class="tasks_container input-container">
                <div>

                </div>
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
                      <input type="submit" value="Add Task" class="add_task_submit">
                    </form>
                  </div>
                </div>
              

                  <!-- <ul id="taskList"></ul> -->
                  <!-- <div class="task">
                    <a href=""></a>
                    <div class="round_checkbox"></div>
                    <span class="task_name">Sleep</span>
                  </div>
                  <div class="task">
                    <div class="round_checkbox"></div>
                    <span class="task_name">Eat</span>
                  </div>
                  <div class="task">
                    <div class="round_checkbox"></div>
                    <span class="task_name">Gym</span>
                  </div>
                  <div class="task">
                    <div class="round_checkbox"></div>
                    <span class="task_name">Game</span>
                  </div>
                  <div class="task">
                    <div class="round_checkbox"></div>
                    <span class="task_name">Study</span>
                  </div> -->
                
        </div>
      </div>
      <div class="right_container section">
        <div class="task_status_container">
          <div class="task_status">Tasks :0</div>
          <div class="task_status">Incomplete :0</div>
          <div class="task_status">Complete :0</div>
        </div>
        <div class="task_description">

        </div>
        <div class="footer">
          <a href="">Blog</a>
          <a href="">Privacy</a>
          <a href="">Contact us</a>
        </div>
        
      </div>
    </div>
  </main>

  <!-- <footer class="background_color">
    <p>TaskMate development</p>
  </footer> -->
</body>
</html>
