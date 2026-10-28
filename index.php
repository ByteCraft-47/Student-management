<?php
$conn = mysqli_connect("localhost", "root", "", "r_app");
$sql = "SELECT * FROM student_data";

$total_MBA_students_sql = "SELECT * FROM student_data WHERE Branch='MBA'";
$total_MCA_students_sql = "SELECT * FROM student_data WHERE Branch='MCA'";
$total_BCA_students_sql = "SELECT * FROM student_data WHERE Branch='BCA'";
$total_BBA_students_sql = "SELECT * FROM student_data WHERE Branch='BBA'";

$result = mysqli_query($conn, $sql);

$total_MBA_students_result = mysqli_query($conn, $total_MBA_students_sql);
$total_MCA_students_result = mysqli_query($conn, $total_MCA_students_sql);
$total_BBA_students_result = mysqli_query($conn, $total_BBA_students_sql);
$total_BCA_students_result = mysqli_query($conn, $total_BCA_students_sql);


$total_MBA_students = mysqli_num_rows($total_MBA_students_result);
$total_MCA_students = mysqli_num_rows($total_MCA_students_result);
$total_BBA_students = mysqli_num_rows($total_BBA_students_result);
$total_BCA_students = mysqli_num_rows($total_BCA_students_result);
?>
<!DOCTYPE html>
 <html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="adminHMD professional admin dashboard template">
  <title>R.App</title>

  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="index.php" aria-label="adminHMD dashboard">
          <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
          <span class="brand-copy">
            <span class="brand-title">R.App</span>
            <span class="brand-subtitle">Admin Template</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link active" href="./register-student.php" aria-current="page"style="background-color: #0355FB; color: white;">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Register Students  +</span>
        </a>

        <a class="nav-link active" href="index.php" aria-current="page" >
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
                <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="settings.php">Account settings</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="login.php">Sign out</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Overview</p>
                <h1 class="h3 mb-1">Dashboard</h1>
              </div>
            </div>
          </div>

          <section class="row g-3 mt-1" aria-label="Dashboard metrics">
            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-primary">
                <div class="metric-top">
                  <span class="metric-label">MBA</span>
                </div>
                <div class="metric-value"><?php echo "$total_MBA_students"?></div>
                <div class="metric-meta">
                  <span class="text-success"></span>
                </div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-success">
                <div class="metric-top">
                  <span class="metric-label">MCA</span>
                </div>
                <div class="metric-value"><?php echo "$total_MCA_students"?></div>
                <div class="metric-meta">
                  <span class="text-success"></span>
                </div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-warning">
                <div class="metric-top">
                  <span class="metric-label">BBA</span>
                </div>
                <div class="metric-value"><?php echo "$total_BBA_students"?></div>
                <div class="metric-meta">
                  <span class="text-success"></span>
                </div>
              </article>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
              <article class="metric-card metric-danger">
                <div class="metric-top">
                  <span class="metric-label">BCA</span>
                </div>
                <div class="metric-value"><?php echo "$total_BCA_students"?></div>
                <div class="metric-meta">
                  <span class="text-danger"></span>
                </div>
              </article>
            </div>
          </section>

          <section class="panel mt-4">
            <h2 class="text-primary fw-bold mb-3">All Students</h2>

            <div class="table-responsive">
              <table class="table student-table align-middle">
                <thead>
                  <tr>
                    <th>Reg. No.</th>
                    <th>Student Name</th>
                    <th>Branch</th>
                    <th>Email ID</th>
                    <th>Mobile No.</th>
                    <th>Gender</th>
                    <th>Pass Year</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  while ($row = mysqli_fetch_assoc($result)) {             
                  ?>
                   
                  <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['Full Name']?></td>
                    <td><?php echo $row['Branch']?></td>
                    <td><?php echo $row['Email ID']?></td>
                    <td><?php echo $row['Mobile No']?></td>
                    <td><?php echo $row['Gender']?></td>
                    <td><?php echo $row['Academic Year']?></td>
                    <td class="text-center">
                      <a href="./edit-student.php?id=<?php echo $row['id']?>" class="edit-btn" style="color: green;">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="./delete-student.php?id=<?php echo $row['id']?>" class="delete-btn ms-3" style="color: red;">
                        <i class="bi bi-trash-fill"></i>
                      </a>
                    </td>
                  </tr>  
                  
                  <?php 
                   }
                  ?>
                 
                   
                </tbody>
              </table>
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