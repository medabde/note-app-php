<?php 
  include "databaseConnect.php";
  $emptyText='';
  $passwordText='';
  $emailtaken='';
  if (isset($_POST["submit"])) {
    $query = 'SELECT * FROM users WHERE email="'.$_POST["email"].'";';
    $result = mysqli_query($conn, $query);
    if (empty($_POST["email"])||empty($_POST["password"])) {
      $emptyText="username or password cant be empty";
    }
    elseif ($_POST["password_confirm"]!=$_POST["password"]) {
      $passwordText="please confirm your password correctly";
    }
    elseif (empty($result)==false) {
      $emailtaken="email already exists ";
    }
    else {
      
      $email=$_POST["email"];
      $password=$_POST["password"];
      $query ='INSERT INTO users(email,password) VALUES("'.$email.'","'.$password.'");';
      $result = mysqli_query($conn, $query);
      header("Location: ./log-in.php");  
    }    
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<form class="form-horizontal" action='' method="POST">
  <fieldset>
    <div id="legend">
      <legend class="">Register</legend>
    </div>
    <div class="control-group">
      <label class="control-label" for="email">E-mail</label>
      <div class="controls">
        <input type="text" id="email" name="email" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label" for="password">Password</label>
      <div class="controls">
        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
      </div>
    </div>
 
    <div class="control-group">
      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
      <div class="controls">
        <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="input-xlarge">
        <p class="help-block">Please confirm password</p>
      </div>
    </div>
 
    <div class="control-group">
      <div class="controls">
        <button class="btn btn-success" name="submit">Register</button>
      </div>
    </div>
  </fieldset>
</form>
<?php
    echo $passwordText;
    echo $emptyText;
    echo $emailtaken;?>
</body>
</html>