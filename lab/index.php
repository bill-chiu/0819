<?php
require("connDB.php");
$sql = "select employeeId,firstName, lastName,e.cityId,cityName
from city c join employee e on e.cityId = c.cityId";
$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

  <div class="container">
    <h2>employee <a href="add.php" class="btn btn-primary btn-sm float:right">add</a></h2>
    <p></p>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>City</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td><?= $row["firstName"] ?></td>
            <td><?= $row["lastName"] ?></td>
            <td><?= $row["cityName"] ?></td>
            <td>
              <a href="edit.php?id=<?= $row["employeeId"] ?>" class="btn btn-success btn-sm">Edit</a>
              <a href="deleteEmployee.php?id=<?= $row["employeeId"] ?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
          </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>

</body>

</html>