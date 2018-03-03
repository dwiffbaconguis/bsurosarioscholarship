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
    <link href="css/styles.css" rel="stylesheet">
  </head>

  <body>

    <?php
      session_start();
    ?>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <!--<a class="navbar-brand" href="#">Logo</a>-->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
            if(isset($_SESSION['id'],$_SESSION['access_level'])) {
                if($_SESSION['access_level']==0) {
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='user.php'>My Profile</a>
                    </li>
                  ";
                }
                else {
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='admin.php?flag=0'>Dashboard</a>
                    </li>
                    <li class='nav-item dropdown'>
                      <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Reports</a>
                      <div class='dropdown-menu' aria-labelledby='dropdown01'>
                        <a class='dropdown-item' href='admin.php?flag=1'>Approved Scholarships</a>
                        <a class='dropdown-item' href='admin.php?flag=2'>Pending Scholarships</a>
                      </div>
                    </li>
                  ";
                }
            }
          ?>
        </ul>
        <?php
          if(!isset($_SESSION['id'])) {
            echo "
              <form class='form-inline my-2 my-lg-0' action='check_login.php' method='post'>
                <input class='form-control mr-sm-2' name='username' type='text' placeholder='Username' aria-label='Username' required>
                <input class='form-control mr-sm-2' name='pwd' type='password' placeholder='Password' aria-label='Password' required>
                <button class='btn btn-primary my-2 my-sm-0' type='submit'>Log In</button>
              </form>
            ";
          }
          else {
            echo "
              <form class='form-inline my-2 my-lg-0' action='logout.php'>
                <button class='btn btn-primary my-2 my-sm-0' type='submit'>Log Out</button>
              </form>
            ";
          }
        ?>
      </div>
    </nav>

    <main role="main">

      <div class="jumbotron">
        <div class="container">
          <h1 class="display-3">BatStateU-Rosario Scholarship</h1>
          <p>This website includes content about student's scholarship records. It stores relevant student information, 
          generates scholarship reports, and notifies status through SMS. It also provides access to all approved scholars.</p>

          <?php
            if(!isset($_SESSION['id'])) {
              echo "
            		<div class='row'>
            			<div class='col-md-4 order-md-2'>
      		          <form class='form-signin' action='create_account.php'>
        			        <button class='btn btn-lg btn-success btn-block' type='submit'>Not yet registered? Sign in</button>
        			      </form>
      			  	  </div>
            		</div>
              ";
            }
          ?>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>Stores student's information</h2>
            <p>Consists of student's personal records, scholarship status and scholastic records.</p>
          </div>
          <div class="col-md-4">
            <h2>Generates scholarship reports</h2>
            <p>Summarizes student's records based on scholarship status.</p>
          </div>
          <div class="col-md-4">
            <h2>Notifies status through SMS</h2>
            <p>Sends SMS to students upon approval of their online registration.</p>
          </div>
        </div>

        <hr>

      </div> <!-- /container -->

    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
