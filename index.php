<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Note app</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>


<table class="table table-bordered">
  <thead>
    <tr>
      <th >#</th>
      <th scope="col" class="col-1">NOTES</th>
      <th scope="col" class="col-2">edit</th>
      <th scope="col" class="col-3">delete</th>
    </tr>
  </thead>
  <tbody>
  <?php include "databaseConnect.php"?>
  <?php
    $query= "SELECT ID, note FROM lesnotes";
    $result=mysqli_query($conn,$query);
    while($row = $result->fetch_assoc()) {?>
    <tr>
      <th scope="row"><?= $row["ID"]?></th>
      <td><?= $row["note"]?></td>
      <td><img class="icons" src="./edit.png"  alt=""></td>
      <td><img class="icons" src="./delete.png" alt=""></td>
    </tr>
    <?php
    }
    ?>
    
  </tbody>
</table>


      
      
    
</body>
</html>