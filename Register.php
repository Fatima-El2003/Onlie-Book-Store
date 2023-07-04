<?php

include 'configuration.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <link rel="stylesheet" href="books.css"> 
</head>
<body class="login">


<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

    <div class="center">
        <h1>Sign Up</h1>
        <form action="" method="post">
            <div class="txt_field">
                <input type="text" name="name" requiered>
                <span></span>
                <label>UserName</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
            <input type="password" name="password" required>
                <span></span>
                <label>Password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="cpassword" required>
                <label>Password Confirmation</label>
            </div>
            <div class="select-pad">       
                <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
                </select>
            </div>

            
            <input type="submit" name="submit" value="Sign up">
            <div class="signup_link">
                Already a member? <a href="login.php">Login now</a>
            </div>
        </form>
    </div>
        
</body>
</html>