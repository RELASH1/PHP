<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="espet.css" />
  <title>Document</title>
</head>

<body>
  <div class="container bootdey flex-grow-1 container-p-y">

    <div class="media align-items-center py-3 mb-3">
      <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="d-block ui-w-100 rounded-circle">
      <div class="media-body ml-4">
        <h4 class="font-weight-bold mb-0"><?php echo strtoupper("" . $_SESSION["SESSION_email"] . ""); ?>

          <span><a href="profilet.php" class="btn btn-primary rounded-pill">Edit</a></span>


      </div>
    </div>

    <div class="card mb-4">
      <div class="card-body">
        <table class="table user-view-table m-0">
          <tbody>
            <tr>
              <td>Nom:</td>
              <td><?php echo strtoupper("" . $_SESSION["nom"] . ""); ?></td>
            </tr>
            <tr>
              <td>Prenom:</td>
              <td><?php echo strtoupper("" . $_SESSION["prenom"] . ""); ?></td>
            </tr>
            <tr>
              <td>Tel:</td>
              <td><?php echo strtoupper("" . $_SESSION["tel"] . ""); ?></td>
            </tr>
            <tr>
              <td>Branche:</td>
              <td><?php echo strtoupper("" . $_SESSION["branche"] . ""); ?></td>
            </tr>
            <tr>
              <td>classe:</td>
              <td><?php echo strtoupper("" . $_SESSION["classe"] . ""); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <hr class="border-light m-0">
      <div class="table-responsive">
        <table class="table card-table m-0">
          <tbody>
            <tr>
              <th>Module Permission</th>
              <th>Read</th>
              <th>Write</th>
              <th>Create</th>
              <th>Delete</th>
            </tr>
            <tr>
              <td>Users</td>
              <td><span class="fa fa-check text-primary"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
            </tr>
            <tr>
              <td>Articles</td>
              <td><span class="fa fa-check text-primary"></span></td>
              <td><span class="fa fa-check text-primary"></span></td>
              <td><span class="fa fa-check text-primary"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
            </tr>
            <tr>
              <td>Staff</td>
              <td><span class="fa fa-times text-light"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
              <td><span class="fa fa-times text-light"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


  </div>
</body>

</html>