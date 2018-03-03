<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>BatStateU-Rosario Scholarship</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">Logo</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <?php
            if(isset($_GET['status'])) {
              $status = $_GET['status'];
              if($status == 0) {
                echo "
                  <form class='form-inline my-2 my-lg-0' action='check_login.php' method='post'>
                    <input class='form-control mr-sm-2' name='username' type='text' placeholder='Username' aria-label='Username' required>
                    <input class='form-control mr-sm-2' name='pwd' type='password' placeholder='Password' aria-label='Password' required>
                    <button class='btn btn-primary my-2 my-sm-0' type='submit'>Log In</button>
                  </form>
                ";
              }
            }
          ?>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Create an Account</h1>

          <?php
            require_once("check_input.php");
            
            echo "
              <div class='row'>
                <div class='col-md-4'>
                  <form action='new_account.php' method='post'>
                    <br />
                    First Name: <input type='text' name='fName' class='form-control' placeholder='First Name' required>
                    Middle Name: <input type='text' name='mName' class='form-control' placeholder='Middle Name'>
                    Last Name: <input type='text' name='lName' class='form-control' placeholder='Last Name' required>
                    Username: <input type='text' name='id' class='form-control' placeholder='Username' required>
                    Password: <input type='password' name='pwd' class='form-control' placeholder='Password' required>
                    Confirm Password: <input type='password' name='pwdx' class='form-control' placeholder='Confirm Password' required>
                    Email Address: <input type='email' name='email' class='form-control' placeholder='Email address'>
                </div>
                <div class='col-md-4'>
                    <br />
                    Contact #: <input type='text' name='contactNum' class='form-control' placeholder='09298001234' required>
                    GWA: <input type='text' name='gwa' class='form-control' placeholder='GWA' required>
                    Campus: <input type='text' name='campus' class='form-control' placeholder='Campus'>
                    <label for='sel1'>Year:</label>
          					<select name='year' class='form-control' id='sel1' required>
          						<option>1st</option>
          						<option>2nd</option>
          						<option>3rd</option>
          						<option>4th</option>
          						<option>5th</option>
          					</select>
                    Course: <input type='text' name='course' class='form-control' placeholder='Course' required>
                    Major: <input type='text' name='major' class='form-control' placeholder='Major'>
                </div>
                <div class='col-md-4'>
                    <br /><br />
                    <button class='btn btn-lg btn-success btn-block' type='submit'>Save</button>
                    <button class='btn btn-lg btn-default btn-block' type='reset'>Reset</button>
                  </form>";
                  if(isset($_GET['status'])) {
                    $status = $_GET['status'];
                    if($status == 0) {
                      echo "<br /><p><strong>Your account has been successfully created. Please login.</strong></p>";
                    }
                    else if($status == 2) {
                      echo "<br /><p><strong>Your passwords do not match. Please confirm.</strong></p>";
                    }
                    else if($status == 3) {
                      echo "<br /><p><strong>Your contact number must be numeric only.</strong></p>";
                    }
                    else if($status == 4) {
                      echo "<br /><p><strong>Your contact number must be consisted of 11 digits only.</strong></p>";
                    }
                    else {
                      echo "<br /><p><strong>Your account has not been created.</strong></p>";
                    }
                  }
                  echo "
                </div>
              </div>
            ";
          ?>
        </main>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>