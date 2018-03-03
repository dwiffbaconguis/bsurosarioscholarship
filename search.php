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
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php?flag=0">Dashboard</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" action="search.php" method="get">
            <input class="form-control mr-sm-2" name="key" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <div class="container-fluid">
      <div class="row">

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">

          <?php
            require_once("check_input.php");
            
            if(isset($_GET['key'])) {
              $flag = $_GET['key'];
            }

            require_once("db.php");

            $sql = "SELECT * FROM students INNER JOIN scholarship ON students.scholarshipCode = scholarship.scholarshipCode  
              WHERE students.studentNum LIKE '%$flag%' OR
              students.lastName LIKE '%$flag%' OR
              students.firstName LIKE '%$flag%' OR
              students.middleName LIKE '%$flag%' OR
              students.course LIKE '%$flag%' OR
              students.major LIKE '%$flag%' OR
              students.year LIKE '%$flag%' OR
              scholarship.description LIKE '%$flag%'
              ORDER BY students.studentNum";

            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              echo "
                <h2>Student Records matching or containing <strong>'".$flag."'</strong></h2>
                <div class='table-responsive'>
                  <table class='table table-sm table-striped'>
                    <thead>
                      <tr>
                        <th>Student No.</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Major</th>
                        <th>Campus</th>
                        <th>Year Level</th>
                        <th>GWA</th>
                        <th>Scholarship</th>
                        <th>Status</th>
                        <th>Email Address</th>
                        <th>Contact #</th>
                      </tr>
                    </thead>
                    <tbody>
              ";
              while($row = $result->fetch_assoc()) {
                echo "
                  <tr>
                    <td><strong>".$row["studentNum"]."</strong></td>
                    <td><strong>".$row["lastName"].", ".$row["firstName"]." ".$row["middleName"]."</strong></td>
                    <td><strong>".$row["course"]."</strong></td>
                    <td><strong>".$row["major"]."</strong></td>
                    <td><strong>".$row["campus"]."</strong></td>
                    <td><strong>".$row["year"]."</strong></td>
                    <td>".$row["gwa"]."</td>
                    <td><strong>".$row["description"]."</strong></td>
                    <td>".$row["status"]."</td>
                    <td>".$row["email"]."</td>
                    <td>".$row["contactNum"]."</td>
                  </tr>
                ";
              }
              echo "
                    </tbody>
                  </table>
                </div>
              ";
            }
            else {
              echo "<h2>No record matches or contains <strong>".$flag."</strong>.</h2>";
            }
            $conn->close();
          ?>
        </main>

        <?php include("footer.html"); ?>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
