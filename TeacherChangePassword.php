<?php
//get database connection
include 'DBConnection/DBConnection.php';

// Check connection
if (!$connection) {
    echo "Connection failed";
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    
    // Check if newPassword or confirmPassword is empty and currentPassword is not empty
    if (!empty($newPassword) || !empty($confirmPassword)) {
        if (empty($currentPassword)) {
            echo "<script>alert('Current Password is required.');</script>";
        } else {

            // Retrieve teacher ID from cookies
            if(isset($_COOKIE['teacherEmail'])){
                $teacherEmail = $_COOKIE['teacherEmail']; // Retrieving teacherEmail from cookie
            } else {
                // Student ID cookie is not set, handle unauthorized access
                echo "<script>alert('Your session has timed out. Please log in again.');</script>";
                header('Location: TeacherLogin.html');
                exit();
            }

            // Verify current password
            $sqlVerifyPassword = "SELECT TeacherPassword FROM teacher WHERE TeacherEmail='$teacherEmail'";
            $resultVerifyPassword = mysqli_query($connection, $sqlVerifyPassword);

            if (mysqli_num_rows($resultVerifyPassword) > 0) {
                $rowPassword = mysqli_fetch_assoc($resultVerifyPassword);
                $storedPassword = $rowPassword['TeacherPassword'];

                if ($currentPassword != $storedPassword) {
                    echo "<script>alert('Incorrect current password.');</script>";
                } else {
                    // Check if newPassword and confirmPassword match
                    if ($newPassword != $confirmPassword) {
                        echo "<script>alert('Password and Confirm Password do not match. Please enter again.');</script>";
                    } else {
                        // Update student table with new password
                        $sqlUpdatePassword = "UPDATE teacher SET TeacherPassword='$newPassword' WHERE TeacherEmail='$teacherEmail'";
                
                        $result = mysqli_query($connection, $sqlUpdatePassword);

                        if ($result) {
                            echo "<script>alert('Student password updated successfully');</script>";
                        } else {
                            echo "<script>alert('Error updating student password: " . mysqli_error($connection) . "');</script>";
                        }
                    }
                }
            } else {
                die("Student record not found.");
            }
        }
    } else {
        // No password update requested
        echo "<script>alert('No changes made to password.');</script>";
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Update | Student</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="CSS/Dashboard.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <!-- Bootstap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'Includes/DashSideNav.php'; ?>
            
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-header">
                        <h4 class="card-title">
                            Account
                        </h4>
                    </div>
                    <div class="card-body">
                        <form name="studentProUp" action="#" method="post">
                            <table class="cpTable">
                                <tr>
                                    <th colspan="2">Password</th>
                                </tr>
                                <tr>
                                    <td>
                                        Current Password :<br>
                                        <input type="password" name="currentPassword">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        New Password :<br>
                                        <input type="password" name="newPassword">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Confirm Password :<br>
                                        <input type="password" name="confirmPassword">
                                    </td>
                                </tr>
                                <tr>
                                    <td><button class="btnStyle1 mx-2" type="submit">Save</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/Dashboard.js"></script>
    <!-- link Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
