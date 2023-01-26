<?php 
    session_start();
    require_once 'config/db.php';

    if (isset($_POST['insert_department'])) {
        $department_name = $_POST['department_name'];

        if (empty($department_name)) {
            $_SESSION['error'] = 'กรุณากรอกแผนกงาน ';
            header("location: manage_department.php");
        } else {
            $check_department = $conn->prepare("SELECT department_name FROM tbl_department WHERE department_name = :department_name");
            $check_department->bindParam(":department_name", $department_name);
            $check_department->execute();
            $row = $check_department->fetch(PDO::FETCH_ASSOC);
            if ($row['department_name'] == $department_name) {
                $_SESSION['warning'] = "มีข้อมูลนี้อยู่ในระบบแล้ว";
                header("location:  manage_department.php");
            } else if (!isset($_SESSION['error'])) {
                   
                    $stmt = $conn->prepare("INSERT INTO tbl_department(department_name) 
                                            VALUES(:department_name)");
                    
                    $stmt->bindParam(":department_name", $department_name);
                    $stmt->execute();
                    $_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อยแล้ว!";
                    header("location: manage_department.php");
                } 
            } 
    } else if (isset($_POST['insert_status'])) {
        $status_name = $_POST['status_name'];
        if (empty($status_name)) {
            $_SESSION['error'] = 'กรุณากรอกสถานะ';
            header("location: manage_status.php");
        } else {
            $check_status = $conn->prepare("SELECT status_name FROM tbl_status WHERE status_name = :status_name");
            $check_status->bindParam(":status_name", $status_name);
            $check_status->execute();
            $row = $check_status->fetch(PDO::FETCH_ASSOC);
            if ($row['status_name'] == $status_name) {
                $_SESSION['warning'] = "มีข้อมูลนี้อยู่ในระบบแล้ว";
                header("location:  manage_status.php");
            } else if (!isset($_SESSION['error'])) {
                   
                    $stmt = $conn->prepare("INSERT INTO tbl_status(status_name) 
                                            VALUES(:status_name)");
                    
                    $stmt->bindParam(":status_name", $status_name);
                    $stmt->execute();
                    $_SESSION['success'] = "เพิ่มข้อมูลเรียบร้อยแล้ว!";
                    header("location: manage_status.php");
                } 
            } 
    }

?>