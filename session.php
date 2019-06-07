<?php

session_start();
$user_check=$_SESSION['login_user'];

if (empty($user_check)) {
    header('Location: log-in.php');
}
else {
    $conn = new mysqli("localhost", "root", "", "notes");
    $query = 'SELECT * FROM users WHERE email="'.$user_check.'";';
    $result = mysqli_query($conn, $query);
    
    
    if($result->num_rows==0){
    header('Location: log-in.php');
    }
       
}?>