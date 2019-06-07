<?php include "session.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit note</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
</head>
<?php include "databaseConnect.php";
  $query= 'SELECT note FROM lesnotes WHERE ID='.$_GET["id"].';';
  $result= mysqli_query($conn, $query);
  $row = $result->fetch_assoc();
?>
<body>
    <form action="" method="POST">
    <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"><?= $row["note"]?></textarea>
    <button 
      class="btn pmd-btn-fab pmd-ripple-effect btn-primary pmd-btn-raised"
      name="submit"
      type="submit"
    >
      edit note
    </button>
    <?php 
    if (isset($_POST["submit"])) {
      $note=$_POST["note"];
      $query ='UPDATE lesnotes SET note="'.$note.'" WHERE ID="'.$_GET["id"].'"';
      $result = mysqli_query($conn, $query);
      header("Location: ./index.php");
    }
      
    ?>
  </form>
</body>
</html>