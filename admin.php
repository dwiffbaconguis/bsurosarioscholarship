<?php 
  session_start();
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
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='dropdown01' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Reports</a>
              <div class='dropdown-menu' aria-labelledby='dropdown01'>
                <a class='dropdown-item' href='admin.php?flag=1'>Approved Scholarships</a>
                <a class='dropdown-item' href='admin.php?flag=2'>Pending Scholarships</a>
                <a class='dropdown-item' href='admin.php?flag=3'>Announcement</a>
              </div>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="search.php" method="get">
            <input class="form-control mr-sm-2" name="key" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            <a class="nav-link" href="index.php"><span class="glyphicon glyphicon-cog"></span></a>
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

              $flag = $_GET['flag']; // 1 for approved scholarships

              if($flag == 1) {
                $report_title = "Student Records with Approved Scholarships";
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=0'>Overview <span class='sr-only'>(current)</span></a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link active' href='admin.php?flag=1'>Approved Scholarships</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=2'>Pending Scholarships</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=3'>Announcement</a>
                  </li>
                ";
              }
              else if($flag == 2) {
                $report_title = "Student Records with Pending Scholarships";
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=0'>Overview <span class='sr-only'>(current)</span></a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=1'>Approved Scholarships</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link active' href='admin.php?flag=2'>Pending Scholarships</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=3'>Announcement</a>
                  </li>
                ";
              }
              else if($flag == 3) {
                $report_title = "Announcement";
                echo "
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=0'>Overview <span class='sr-only'>(current)</span></a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=1'>Approved Scholarships</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link' href='admin.php?flag=2'>Pending Scholarships</a>
                  </li>
                  <li class='nav-item'>
                    <a class='nav-link active' href='admin.php?flag=3'>Announcement</a>
                  </li>
                ";
              }
              else {
                $report_title = "Student Records";
                echo "
                    <li class='nav-item'>
                      <a class='nav-link active' href='admin.php?flag=0'>Overview <span class='sr-only'>(current)</span></a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='admin.php?flag=1'>Approved Scholarships</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='admin.php?flag=2'>Pending Scholarships</a>
                    </li>
                    <li class='nav-item'>
                      <a class='nav-link' href='admin.php?flag=3'>Announcement</a>
                    </li>
                  ";
              }
            ?>
          </ul>
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <!--
          <h1>Dashboard</h1>

          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Approved scholarships</h4>
              <div class="text-muted">Something else</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Pending scholarships</h4>
              <span class="text-muted">Something else</span>
            </div>
          </section>
          -->

          <?php
            echo "<h2>".$report_title."</h2>";
          ?>

                <?php
                  require_once("db.php");

                  $conn = new mysqli($host, $username, $password, $db_name);
                  if($conn->connect_error) {
                    die("Connection failed: ".$conn->connect_error);
                  }

                  if($flag == 1) {  // active scholarships
                    $sql = "SELECT * FROM students INNER JOIN scholarship ON students.scholarshipCode = scholarship.scholarshipCode  WHERE students.scholarshipCode=1";
                  }
                  else if($flag == 2) {  //pending scholarships
                    $sql = "SELECT * FROM students INNER JOIN scholarship ON students.scholarshipCode = scholarship.scholarshipCode  WHERE students.scholarshipCode=2";
                  }
                  else if($flag == 3) {  // show announcement
                    $sql = "SELECT * FROM announcement";
                  }
                  else {  // show all
                    $sql = "SELECT * FROM students INNER JOIN scholarship ON students.scholarshipCode = scholarship.scholarshipCode";
                  }

                  $result = $conn->query($sql);

                  if($result->num_rows > 0) {

                    echo "<div class='table-responsive'>
                              <table class='table table-sm table-striped'>
                                <thead>
                                  <tr>";

                    if($flag == 3) {  // for announcement
                      echo "<th>Message</th>";
                    }
                    else {
                      echo "<th>Student No.</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Major</th>
                            <th>Campus</th>
                            <th>Year Level</th>
                            <th>GWA</th>
                            <th>Scholarship</th>
                            <th>Status</th>
                            <th>Email Address</th>
                            <th>Contact #</th>";
                    }

                    echo "</tr>
                        </thead>
                        <tbody>";

                    while($row = $result->fetch_assoc()) {
                      if($flag == 3) {
                        echo "
                          <tr>
                            <td>".$row['description']."</td>
                          </tr>";
                      }
                      else {
                        echo "
                          <tr>
                            <td>".$row["studentNum"]."</td>
                            <td>".$row["lastName"].", ".$row["firstName"]." ".$row["middleName"]."</td>
                            <td>".$row["course"]."</td>
                            <td>".$row["major"]."</td>
                            <td>".$row["campus"]."</td>
                            <td>".$row["year"]."</td>
                            <td>".$row["gwa"]."</td>
                            <td>".$row["description"]."</td>
                            <td>".$row["status"]."</td>
                            <td>".$row["email"]."</td>
                            <td>".$row["contactNum"]."</td>";

                            if(isset($flag)){
                                if($flag != 2) {
                                  //echo "<td><a href='#'>Pending</a></td>";
                                }
                                else {
                                  echo "<form action='send_sms.php?num=$row[contactNum]&id=$row[studentNum]' method='post'>
                                          <td><button class='btn btn-primary my-2 my-sm-0' type='submit'>Approve</button></td>
                                        </form>
                                  ";
                                }
                            }

                            echo "
                          </tr>
                        ";
                      }
                    }
                  }
                ?>
              </tbody>
            </table>

            <?php
              if($flag == 3) {  // Update Announcement
                echo "
                  <h2 class='form-signin-heading'>Update Message</h2>
                  <div class='row'>
                    <div class='col-md-4'>
                      <form action='update_announcement.php' method='post'>
                        <br />
                        Message: <textarea name='message' class='form-control'rows='4' cols='50'></textarea><br />
                        <button class='btn btn-lg btn-success btn-block' type='submit'>Save</button>
                        <button class='btn btn-lg btn-default btn-block' type='reset'>Reset</button>
                        <br /></form>";
                        if(isset($_GET['status'])) {
                          $status = $_GET['status'];
                          if($status == 0) {
                            echo "<br /><p><strong>Your record has been successfully updated.</strong></p>";
                          }
                          else {
                            echo "<br /><p><strong>Your record has not been updated.</strong></p>";
                          }
                        }
                    echo "</div>
                  </div>
                ";
              }

              $conn->close();
            ?>

          </div>
        </main>

        <footer class="container">
        </footer>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
