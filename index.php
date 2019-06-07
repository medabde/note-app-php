<?php include "session.php"?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Note app</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th scope="col" class="col-1">NOTES</th>
          <th scope="col" class="col-2">edit</th>
          <th scope="col" class="col-3">delete</th>
        </tr>
      </thead>
      <tbody>
        <?php
    include "databaseConnect.php";
    $query= "SELECT ID, note FROM lesnotes";
    $i=1;
    $result=mysqli_query($conn,$query);
    while($row = $result->fetch_assoc()) {?>
        <tr>
          <th scope="row"><?= $i++?></th>
          <td><?= $row["note"]?></td>
          <td>
            <a href='edit.php?id=<?= $row["ID"]?>'
              ><img class="icons edit" src="./edit.png" alt=""
            /></a>
          </td>
          <td>
            <a href='delete.php?id=<?= $row["ID"]?>'
              ><img class="icons delete" src="./delete.png" alt=""
            /></a>
          </td>
        </tr>
        <?php
    }
    ?>
      </tbody>
    </table>
    <a href="./addNote.php" >
    <button
      class="btn pmd-btn-fab pmd-ripple-effect btn-primary pmd-btn-raised"
      type="button"
    >
      + Add a note
    </button>
  </a>

  <a href="./logout.php" >
    <button
      class="btn pmd-btn-fab pmd-ripple-effect btn-primary pmd-btn-raised"
      type="button"
    >
      Disconnect
    </button>
  </a>

  </body>
</html>
