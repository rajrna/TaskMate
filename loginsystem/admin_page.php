<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/credentials.css">

</head>
<body>
   
<div class="container pattern">

   <div class="content ">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <a href="login_form.php" class="btn">login</a>
      <a href="due_task.php" class="btn">Due tasks</a>
      <a href="deleteEverydayTasks.php" class="btn">Clear Today</a>
      <a href="replaceTodayTasks.php" class="btn">Replace Tasks</a>
      <a href="deleteTomorrowTasks.php" class="btn">Clear Tomorrow</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>