<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/table.css">
    <title>UMS</title>
  </head>
  <body>
<div class="container">
  <nav class="navbar navbar-dark bg-dark">
    <div class="navbar-brand"><span class="alert alert-light">Last Update: <span id="timer" class="badge badge-light"></span></span>
      <!-- <button type="button" class="btn btn-secondary" title="Update Now">
      <i class="fas fa-sync-alt"></i>
      </button> -->
      Welcome <?php echo $_SESSION['user']; ?>
    </div>
    <form action="logout.php" method="POST">
      <button type="submit" name="logout" class="btn btn-secondary">Log out</button>
    </form>
  </nav>
  <div id="tableContainer">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Connected</th>
          <th scope="col">User Name</th>
          <th scope="col">Connection time</th>
          <th scope="col">IP Address</th>
        </tr>
      </thead>
      <tbody id="connectedTable"></tbody>
      <thead class="table-danger">
        <tr>
          <th scope="col">Offline</th>
          <th scope="col">User Name</th>
          <th scope="col">Connection time</th>
          <th scope="col">IP Address</th>
        </tr>
      </thead>
      <tbody id="disconnectedTable"></tbody>
    </table>
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>
  </body>
</html>