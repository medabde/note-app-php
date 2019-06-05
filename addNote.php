
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add note</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
</head>
<body>
    <form action="" method="POST">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
    <button 
      class="btn pmd-btn-fab pmd-ripple-effect btn-primary pmd-btn-raised"
      name="submit"
      type="submit"
    >
      Add note
    </button>
    <?php 
    if (isset($_POST["submit"])) {
      include "databaseConnect.php";
      $note=$_POST["note"];
      $query ='INSERT INTO lesnotes(note) VALUES("'.$note.'");';
      $result = mysqli_query($conn, $query);
      header("Location: ./index.php");
    }
      
    ?>
  </form>
</body>
</html>

