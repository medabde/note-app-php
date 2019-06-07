<?php
session_start();
$error=''; 
if (isset($_POST['log-in'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{

$email=$_POST['email'];
$password=$_POST['password'];

$conn = new mysqli("localhost", "root", "", "notes");
$query = 'SELECT * FROM users WHERE email="'.$email.'" AND password="'.$password.'";';
$result = mysqli_query($conn, $query);

if ($result->num_rows>0) {
$_SESSION['login_user']=$email;
header("location: index.php");
} else {
$error = "Username or Password is invalid";
}
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>log in </title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
</head>
<body>
    

<form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input  class="form-control" name="email" aria-describedby="email" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
  </div>
  <button type="submit" name="log-in" class="btn btn-primary">sign-in</button>
</form>

<?php echo $error;?>


</body>
</html>