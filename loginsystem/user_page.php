<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_id'])){
   header('location:login_form.php');
}

if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
   // The user_id session variable is set and contains the user's unique identifier
   $userId = $_SESSION['user_id'];

 
  // Check if the database connection is successful
   if (!$conn) {
       die("Database connection error: " . mysqli_connect_error());
   }

   // Fetch the user's name from the database based on the 'user_id'
   $query = "SELECT name FROM user_form WHERE id = $userId";
   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) === 1) {
       // If the user is found in the database, retrieve their name
       $row = mysqli_fetch_assoc($result);
       $currentUserName = $row['name'];
       echo "Welcome, $currentUserName!";
   } else {
       // If the user is not found in the database, handle the case accordingly
       echo "User not found!";
   }

   // Close the database connection
   mysqli_close($conn);
} else {
   // The user_id session variable is not set or empty, meaning the user is not logged in
   echo "Welcome, Guest!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/credentials.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>user</span></h3>
      <h1>welcome <span><?php echo $currentUserName ?></span></h1>
      <p>this is an user page</p>
      <a href="../index.php" class="btn">TaskMate</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>