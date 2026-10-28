<?php

$conn = mysqli_connect("localhost", "root", "", "r_app");

$id = $_GET['id'];

$sql = "SELECT * FROM student_data WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['update']))
{
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $last_education = $_POST['education'];
    $gname = $_POST['guardian_name'];
    $gno = $_POST['guardian_mobile'];
    $fees = $_POST['fee'];
    $birthdate = $_POST['dob'];
    $year = $_POST['academic_year'];
    $counselor = $_POST['counselor'];

    $sql = "UPDATE student_data 
            SET 
            `Full Name`='$name',
            `Email ID`='$email',
            `Branch`='$branch',
            `Mobile No`='$mobile',
            `Gender`='$gender',
            `City`='$city',
            `State`='$state',
            `Pincode`='$pincode',
            `Last Education`='$last_education',
            `Guardian Name`='$gname',
            `Guardian No`='$gno',
            `Total Course Fee`='$fees',
            `D.O.B`='$birthdate',
            `Academic Year`='$year',
            `Counselor Name`='$counselor'
            
            WHERE id='$id'";

    if (mysqli_query($conn, $sql))
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        echo "Update Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="R.app professional admin dashboard template">
  <title>Add User | R.app</title>

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">

        <a class="brand-mark" href="index.php" aria-label="R.app dashboard">
          <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
          <span class="brand-copy">
            <span class="brand-title">R.app</span>
            <span class="brand-subtitle">Admin Template</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link" href="./register-student.php" aria-current="page"
          style="background-color: #0355FB; color: white;">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Register Students +</span>
        </a>

        <a class="nav-link" href="index.php">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
      </nav>
    </aside>

    <div class="admin-main">

      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">

          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar"
            aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1" role="search">
            <input class="form-control search-input" type="search" placeholder="Search users, orders, reports"
              aria-label="Search">
          </form>

          <div class="navbar-actions ms-auto">

            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Switch color theme"
              title="Switch color theme">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>

            <div class="dropdown">
              <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false"
                aria-label="Notifications">
                <span class="notification-dot"></span>
                <i class="bi bi-bell" aria-hidden="true"></i>
              </button>

              <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header fw-bold text-body">Notifications</div>

                <a class="dropdown-item" href="users.php">
                  <span class="notification-title">New user registered</span>
                  <span class="notification-time">4 minutes ago</span>
                </a>

                <a class="dropdown-item" href="charts.php">
                  <span class="notification-title">Revenue target reached</span>
                  <span class="notification-time">32 minutes ago</span>
                </a>

                <a class="dropdown-item" href="settings.php">
                  <span class="notification-title">Security review completed</span>
                  <span class="notification-time">1 hour ago</span>
                </a>
              </div>
            </div>

            <div class="dropdown">

              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">

                <img class="avatar-img avatar-sm" src="../assets/images/avatar/avatar.jpg" alt="Admin Hasan">

                <span class="profile-name d-none d-sm-inline">Admin Hasan</span>

              </button>

              <ul class="dropdown-menu dropdown-menu-end">

                <li>
                  <a class="dropdown-item" href="profile.php">Profile</a>
                </li>

                <li>
                  <a class="dropdown-item" href="settings.php">Account settings</a>
                </li>

                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item" href="login.php">Sign out</a>
                </li>

              </ul>

            </div>

          </div>
        </div>
      </nav>

      <main class="dashboard-content">

        <div class="container-fluid px-3 px-lg-4 py-4">

          <section class="row g-3">

            <div class="col-12 col-xl-12">

              <form method="POST" action="">

                <h3>Edit Student Information</h3>

                <div class="row">

                  <div class="col-md-4">

                    <div class="mb-3">
                      <label>Full Name</label>
                      <input type="text" class="form-control"
                        value="<?php echo $row['Full Name']; ?>"
                        name="fullname">
                    </div>

                    <div class="mb-3">
                      <label>Mobile No</label>
                      <input type="tel" class="form-control"
                        value="<?php echo $row['Mobile No']; ?>"
                        name="mobile">
                    </div>

                    <div class="mb-3">
                      <label>City</label>
                      <input type="text" class="form-control"
                        value="<?php echo $row['City']; ?>"
                        name="city">
                    </div>

                    <div class="mb-3">
                      <label>Last Education</label>
                      <input type="text" class="form-control"
                        value="<?php echo $row['Last Education']; ?>"
                        name="education">
                    </div>

                    <div class="mb-3">
                      <label>Total Course Fee</label>
                      <input type="number" class="form-control"
                        value="<?php echo $row['Total Course Fee']; ?>"
                        name="fee">
                    </div>

                  </div>


                  <div class="col-md-4">

                    <div class="mb-3">
                      <label>Branch</label>

                      <select class="form-select" name="branch" required>

                        <option value="<?php echo $row['Branch']; ?>">
                          <?php echo $row['Branch']; ?>
                        </option>

                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                        <option value="MBA">MBA</option>
                        <option value="MCA">MCA</option>

                      </select>
                    </div>


                    <div class="mb-3">

                      <label>Gender</label>

                      <select class="form-select" name="gender" required>

                        <option value="<?php echo $row['Gender']; ?>">
                          <?php echo $row['Gender']; ?>
                        </option>

                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>

                      </select>

                    </div>


                    <div class="mb-3">
                      <label>State</label>

                      <input type="text" class="form-control"
                        value="<?php echo $row['State']; ?>"
                        name="state">
                    </div>


                    <div class="mb-3">
                      <label>Guardian Name</label>

                      <input type="text" class="form-control"
                        value="<?php echo $row['Guardian Name']; ?>"
                        name="guardian_name">
                    </div>


                    <div class="mb-3">
                      <label>D.O.B</label>

                      <input type="text" class="form-control"
                        value="<?php echo $row['D.O.B']; ?>"
                        name="dob"
                        placeholder="DD.MM.YYYY">
                    </div>

                  </div>


                  <div class="col-md-4">

                    <div class="mb-3">

                      <label>Email ID</label>

                      <input type="email" class="form-control"
                        value="<?php echo $row['Email ID']; ?>"
                        name="email">

                    </div>


                    <div class="mb-3">

                      <label>Academic Year</label>

                      <input type="text" class="form-control"
                        value="<?php echo $row['Academic Year']; ?>"
                        name="academic_year"
                        placeholder="2024-27">

                    </div>


                    <div class="mb-3">

                      <label>Pincode</label>

                      <input type="text" class="form-control"
                        value="<?php echo $row['Pincode']; ?>"
                        name="pincode">

                    </div>


                    <div class="mb-3">

                      <label>Guardian No.</label>

                      <input type="tel" class="form-control"
                        value="<?php echo $row['Guardian No']; ?>"
                        name="guardian_mobile">

                    </div>


                    <div class="mb-3">

                      <label>Counselor Name</label>

                      <input type="text" class="form-control"
                        value="<?php echo $row['Counselor Name']; ?>"
                        name="counselor">

                    </div>

                  </div>

                </div>


                <div class="text-center mt-4">

                  <button type="submit" name="update"
                    class="btn btn-primary px-5 rounded-pill">
                    UPDATE
                  </button>

                </div>

              </form>

            </div>

            <div class="col-12 col-xl-4">
            </div>

          </section>

        </div>

      </main>

    </div>
  </div>


  <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/js/main.js"></script>

</body>

</html>