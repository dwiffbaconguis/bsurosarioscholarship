<?php
  session_start();
  if(!isset($_SESSION['id'])) {
    header("Location: index.php");
  }
?>

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
        <a class="navbar-brand" href="#">My Profile</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class='nav-item'>
              <a class='nav-link active' href='user.php?flag=1'>Update Profile</a>
            </li>
          </ul>
          <form class='form-inline my-2 my-lg-0' action='logout.php'>
            <button class='btn btn-primary my-2 my-sm-0' type='submit'>Log Out</button>
          </form>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">

        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <?php
              require_once("check_input.php");

              if(isset($_GET['flag'])) {
                $flag = $_GET['flag']; // 1 for approved scholars

                if($flag == 1) {
                  $report_title = "Student Records with Active Scholarships";
                  echo "
                    <li class='nav-item'>
                      <a class='nav-link' href='user.php'>Overview <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link active' href='user.php?flag=1'>Update Profile</a>
                    </li>
                  ";
                }
              }
              else {
                echo "
                    <li class='nav-item'>
                      <a class='nav-link active' href='user.php'>Overview <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='user.php?flag=1'>Update Profile</a>
                    </li>
                  ";
              }
            ?>
          </ul>
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>My Profile</h1>

          <?php
            require_once("db.php");

            $sql = "SELECT * FROM students 
              INNER JOIN scholarship ON students.scholarshipCode = scholarship.scholarshipCode
              INNER JOIN login ON students.id = login.id
              WHERE students.id='$_SESSION[id]'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              $row = $result->fetch_assoc();

              $sql1 = "SELECT description FROM announcement";
              $result1 = $conn->query($sql1);
              $row1 = $result1->fetch_assoc();

              echo "
                  <div class='row'>
                    <div class='col-md-8'>
                      <div class='card border border-secondary _mb-3'>
                        <h5 class='card-header'>Personal</h5>
                        <div class='card-body'>

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Last Name</strong></label>
                                <p>".$row['lastName']."</p>
                              </div>
                            </div>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>First Name</strong></label>
                                <p>".$row['firstName']."</p>
                              </div>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Middle Name</strong></label>
                                <p>".$row['middleName']."</p>
                              </div>
                            </div>
                          </div>

                          <hr />

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Username</strong></label>
                                <p>".$row['id']."</p>
                              </div>
                            </div>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Email Address</strong></label>
                                <p>".$row['email']."</p>
                              </div>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Contact Number</strong></label>
                                <p>".$row['contactNum']."</p>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <div class='col-md-4'>
                      <div class='row'>
                        <div class='col-md-12'>
                          <div class='card border bg-info text-white _mb-3'>
                            <h5 class='card-header'>GWA</h5>
                            <div class='card-body'>
                              <h3 class='_gwa text-center'>".$row['gwa']."</h3>
                            </div>
                          </div>
                        </div>
                      </div>";

                      if($row['scholarshipCode'] == 1) {  // approved in the system
                        echo "
                          <br />
                          <div class='row'>
                            <div class='col-md-12'>
                              <div class='card border border-secondary _mb-3'>
                                <h5 class='card-header'>Announcements</h5>
                                <div class='card-body'>
                                  <p>".$row1['description']."</p>
                                </div>
                              </div>
                            </div>
                          </div>";
                      }

                      echo "
                    </div>
                  </div>

                  <br />
                  
                  <div class='row'>
                    <div class='col-md-8'>
                      <div class='card border border-secondary _mb-3'>
                        <h5 class='card-header'>Academe</h5>
                        <div class='card-body'>

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Year</strong></label>
                                <p>".$row['year']."</p>
                              </div>
                            </div>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Course</strong></label>
                                <p>".$row['course']."</p>
                              </div>
                            </div>
                          </div>

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Major</strong></label>
                                <p>".$row['major']."</p>
                              </div>
                            </div>
                          </div>

                          <hr />

                          <div class='row'>
                            <div class='col-md-6'>
                              <div class='hg-form-control'>
                                <label for=''><strong>Campus</strong></label>
                                <p>".$row['campus']."</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              ";
            }
          ?>

          <?php
            if(isset($_GET['flag'])) {
              if($flag == 1) {  // Update Profile
                echo "
                  <br />
                  <h2 class='form-signin-heading'>Update Profile</h2>
                  <div class='row'>
                    <div class='col-md-4'>
                      <form action='update_profile.php' method='post'>
                        <br />
                        First Name: <input type='text' name='fName' class='form-control' placeholder='First Name'>
                        Middle Name: <input type='text' name='mName' class='form-control' placeholder='Middle Name'>
                        Last Name: <input type='text' name='lName' class='form-control' placeholder='Last Name'>
                        Username: <input type='text' name='id' class='form-control' placeholder='Username'>
                        Email Address: <input type='email' name='email' class='form-control' placeholder='Email address'>
                        Contact #: <input type='text' name='contactNum' class='form-control' placeholder='0929-800-1234'>
                    </div>
                    <div class='col-md-4'>
                        <br />
                        GWA: <input type='text' name='gwa' class='form-control' placeholder='GWA'>
                        Campus: <input type='text' name='campus' class='form-control' placeholder='Campus'>
                        <label for='sel1'>Year:</label>
                        <select name='year' class='form-control' id='sel1' required>
                          <option>1st</option>
                          <option>2nd</option>
                          <option>3rd</option>
                          <option>4th</option>
                          <option>5th</option>
                        </select>
                        Course: <input type='text' name='course' class='form-control' placeholder='Course'>
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
                          echo "<br /><p><strong>Your record has been successfully updated.</strong></p>";
                        }
                        else {
                          echo "<br /><p><strong>Your record has not been updated.</strong></p>";
                        }
                      }
                      echo "
                    </div>
                  </div>
                ";
              }
            }
          ?>
        </main>

        <footer class="container">
          <p>&copy; 2017</p>
        </footer>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>