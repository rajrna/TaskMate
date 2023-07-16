<?php

include('update-script.php');
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PHP CRUD Operations</title>
<style>
    
body{
    overflow-x: hidden;
}

* {
  box-sizing: border-box;}
.user-detail form {
    height: 100vh;
    border: 2px solid #f1f1f1;
    padding: 16px;
    background-color: white;
    }
    .user-detail{
      width: 30%;
    float: left;
    }

input{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;}
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;}
button[type=submit] {
    background-color: #434140;
    color: #ffffff;
    padding: 10px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    font-size: 20px;}
label{
  font-size: 18px;;}
button[type=submit]:hover {
  background-color:#3d3c3c;}
  .form-title a, .form-title h2{
   display: inline-block;
   
  }
  .form-title a{
      text-decoration: none;
      font-size: 20px;
      background-color: green;
      color: honeydew;
      padding: 2px 10px;
  }
 
</style>
</head>
<body>
<!--====form section start====-->

<div class="user-detail">

    <div class="form-title">
    <h2>Create Form</h2>
    
    
    </div>
 
    <p style="color:red">
    
<?php if(!empty($msg)){echo $msg; }?>
</p>
    <form method="post" action="">
          <label>Full Name</label>
        
<input type="text" placeholder="Enter Full Name" name="full_name" required value="<?php echo isset($editData) ? $editData['full_name'] : '' ?>">

          <label>Email Address</label>
        
<input type="email" placeholder="Enter Email Address" name="email_address" required value="<?php echo isset($editData) ? $editData['email_address'] : '' ?>">

          <label>City</label>
<input type="city" placeholder="Enter Full City" name="city" required value="<?php echo isset($editData) ? $editData['city'] : '' ?>">

          <label>Country</label>
        
<input type="text" placeholder="Enter Full Country" name="country" required value="<?php echo isset($editData) ? $editData['country'] : '' ?>">

          <button type="submit" name="update">Submit</button>
    </form>
        </div>
</div>
<!--====form section start====-->


</body>
</html>


<?php

include('database.php');


if(isset($_GET['edit'])){

    $id= $_GET['edit'];
  $editData= edit_data($connection, $id);
}

if(isset($_POST['update']) && isset($_GET['edit'])){

  $id= $_GET['edit'];
    update_data($connection,$id);
    
    
} 
function edit_data($connection, $id)
{
 $query= "SELECT * FROM user_details WHERE id= $id";
 $exec = mysqli_query($connection, $query);
 $row= mysqli_fecth_assoc($exec);
 return $row;
}

// update data query
function update_data($connection, $id){

    $full_name= legal_input($_POST['full_name']);
      $email_address= legal_input($_POST['email_address']);
      $city = legal_input($_POST['city']);
      $country = legal_input($_POST['country']);

      $query="UPDATE user_details 
            SET full_name='$full_name',
                email_address='$email_address',
                city= '$city',
                country='$country' WHERE id=$id";

      $exec= mysqli_query($connection,$query);
  
      if($exec){
         header('location:user-table.php');
      
      }else{
         $msg= "Error: " . $query . "<br>" . mysqli_error($connection);
         echo $msg;  
      }
}

// convert illegal input to legal input
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>






<?php
    @include 'database.php';
    $conn = mysqli_connect('localhost','root','','taskmate');

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
        echo '<div>';
            echo '<div class="task" >';
                echo '<div>';
                    echo '<input type="checkbox" id="taskComplete">';
                echo '</div>';
                echo '<div onclick="openUpdateForm()">';
                    echo 'Task: ' . $row["task_name"] . '<br>';
                    echo 'Description: ' . $row["description"] . '<br>';
            echo '</div>';
            
            echo '</div>';
        echo '</div';    
        }
                        
        echo '</div>';
        } else {
            echo "No data available.";
        }

?>