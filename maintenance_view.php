<?php 

session_start();
require_once 'config/db.php';
if (!isset($_SESSION['admin_login']) and !isset($_SESSION['leader_login']) and !isset($_SESSION['technician_login']) and !isset($_SESSION['user_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: login.php');
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">

    <!-- cdn feather icons   -->
    <script src="https://unpkg.com/feather-icons"></script>
    <style>
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 90px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
        z-index: 99;
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 11.5rem;
            padding: 0;
        }
    }

    .navbar {
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
    }

    @media (min-width: 767.98px) {
        .navbar {
            top: 0;
            position: sticky;
            z-index: 999;
        }
    }

    .sidebar .nav-link {
        color: #333;
    }

    .sidebar .nav-link.active {
        color: #0d6efd;
    }
    </style>
</head>

<body>
    <?php 
        if (isset($_SESSION['admin_login'])) {
            $admin_id = $_SESSION['admin_login'];
            $stmt = $conn->query("SELECT * FROM tbl_users WHERE id = $admin_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else  if  (isset($_SESSION['leader_login'])) {
            $leader_id = $_SESSION['leader_login'];
            $stmt = $conn->query("SELECT * FROM tbl_users WHERE id = $leader_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else  if  (isset($_SESSION['technician_login'])) {
            $technician_id = $_SESSION['technician_login'];
            $stmt = $conn->query("SELECT * FROM tbl_users WHERE id = $technician_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else  if  (isset($_SESSION['user_login'])) {
            $user_id = $_SESSION['user_login'];
            $stmt = $conn->query("SELECT * FROM tbl_users WHERE id = $user_id");
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    ?>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="admin.php">
                <?php echo $row['urole'] ?>
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <h3> Dashboard</h3>
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false">
                    Hello, <?php echo $row['firstname'] . ' ' . $row['lastname'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="signout.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        <?php if (isset($_SESSION['admin_login'])) { ?>
                            <a class="nav-link active" aria-current="page" href=admin.php>
                                <i data-feather="rewind"></i>
                                <span class="ml-2">BACK</span>
                            </a>
                            <?php } ?>

                            <?php if (isset($_SESSION['leader_login'])) { ?>
                            <a class="nav-link active" aria-current="page" href=leader.php>
                                <i data-feather="rewind"></i>
                                <span class="ml-2">BACK</span>
                            </a>
                            <?php } ?>

                            <?php if (isset($_SESSION['technician_login'])) { ?>
                            <a class="nav-link active" aria-current="page" href=technician.php>
                                <i data-feather="rewind"></i>
                                <span class="ml-2">BACK</span>
                            </a>
                            <?php } ?>

                            <?php if (isset($_SESSION['user_login'])) { ?>
                            <a class="nav-link active" aria-current="page" href=users.php>
                                <i data-feather="rewind"></i>
                                <span class="ml-2">BACK</span>
                            </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-12 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title text-center">ข้อมูลแจ้งซ่อม</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <button type="button" class="btn btn-dark">ALL</button>
                                <button type="button" class="btn btn-secondary">pending approval</button>
                                <button type="button" class="btn btn-info">pending</button>
                                <button type="button" class="btn btn-warning">in progress</button>
                                
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">no.</th>
                                                <th scope="col">วันที่แจ้งซ่อม</th>
                                                <th scope="col">หมายเลขเครื่อง</th>
                                                <th scope="col">ชื่อเครื่อง</th>
                                                <th scope="col">อาการ</th>
                                                <th scope="col">สถานที่</th>
                                                <th scope="col">วันที่ต้องการใช้</th>
                                                <th scope="col">คนแจ้งซ่อม</th>

                                                <th scope="col">สถานะ</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                    $select_stmt = $conn->prepare("SELECT * FROM tbl_case 
                                                                                INNER JOIN tbl_users ON user_id = id 
                                                                                INNER JOIN tbl_status ON status_id = sid 
                                                                                INNER JOIN tbl_department ON department = department_id ");
                                                    $select_stmt->execute();
                                                    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>
                                                <td><?php echo $row["case_id"]; ?></td>
                                                <td><?php echo $row["date_start"]; ?></td>
                                                <td><?php echo $row["machine_no"]; ?></td>
                                                <td><?php echo $row["machine_name"]; ?></td>
                                                <td><?php echo $row["problem_case"]; ?></td>
                                                <td><?php echo $row["place_name"]; ?></td>
                                                <td><?php echo $row["date_end"]; ?></td>
                                                <td><?php echo $row["username"]; ?></td>
                                                <?php
                                                    if ($row["status_name"] == "already done"){  ?>
                                                <td><a class="btn btn-success"><?php echo $row["status_name"]; ?></a>
                                                </td>
                                                <?php } ?>
                                                <?php
                                                    if ($row["status_name"] == "cancel"){ ?>
                                                <td><a class="btn btn-danger"><?php echo $row["status_name"]; ?></a>
                                                </td>
                                                <?php } ?>
                                                <?php
                                                    if ($row["status_name"] == "pending approval"){ ?>
                                                <td><a class="btn btn-secondary"><?php echo $row["status_name"]; ?></a>
                                                </td>
                                                <?php } ?>
                                                <?php
                                                    if ($row["status_name"] == "pending"){ ?>
                                                <td><a class="btn btn-info"><?php echo $row["status_name"]; ?></a></td>
                                                <?php } ?>
                                                <?php
                                                    if ($row["status_name"] == "in progress"){ ?>
                                                <td><a class="btn btn-warning"><?php echo $row["status_name"]; ?></a>
                                                </td>
                                                <?php } ?>

                                            </tr>


                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                                <a href="#" class="btn btn-block btn-light">View all</a>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- cdn bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script>
    feather.replace()
    </script>
</body>

</html>