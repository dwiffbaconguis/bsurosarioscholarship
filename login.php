<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="check_login.php" method="post">
        <h2 class="form-signin-heading">Log in</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="pwd" class="form-control" placeholder="Password" required>
        <!--<div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
        <br />
        <p>
          <?php // To display error messages
            if(isset($_GET['err'])) {
              if ($_GET['err']==1) {
                echo "<span class='glyphicon glyphicon-exclamation-sign'></span><strong> Invalid credentials. Please check your username or password.</strong>";
              }
              else if ($_GET['err']==5) {
                echo "<strong>Successfully logged out.</strong>";
              }
              else {
                echo "<strong>You're trying to access unauthorized page. Please login first.</strong>";
              }
            }
          ?>
        </p>
      </form>
    </div> <!-- /container -->
  </body>
</html>
