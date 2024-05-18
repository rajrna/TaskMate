<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   // $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   // $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
  
      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      } elseif ($row['user_type'] == 'user') {
          $_SESSION['user_type'] = 'user';
          $_SESSION['user_id'] = $row['id']; // 'id' is the unique identifier for the user in the database.
          header('location: ../index.php');
      }
  } else {
      $error[] = 'incorrect email or password!';
  }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>
   <link rel="icon" type="image/x-icon" href="T.png">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/credentials.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Coming+Soon&display=swap" rel="stylesheet">
</head>
<body>
  
<div class="form-container pattern">

   <form action="" method="post">
      <h3>TaskMate</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Enter your email">
      <input type="password" name="password" required placeholder="Enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>Don't have an account? <a href="register_form.php">Register now</a></p>
   </form>

</div>

</body>
</html>