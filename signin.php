<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Yeuda Witman: yeudaww@gmail.com">
    <title>Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="./assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="includes/signin.inc.php" method="POST">
      <?php
        // define('BOAT', 'valueOfDefin');
        // echo BOAT;
        if ( isset( $_GET['error'] ) ) {
          include_once 'includes/errors.php';
          $errorHandle = new Errors();
          $errorMsg = $errorHandle->getErrorMsg( $_GET['error'] );
          if ( $errorMsg != null ) {
            echo '<div class="alert alert-danger" role="alert">'.$errorMsg.'</div>';
          }          
        }
      ?>
      <img class="mb-4" src="assets/images/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
      <div>Not a member yet? <a href="./signup.php">Register now</a></div>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
  </body>
</html>
