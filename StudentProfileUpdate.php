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
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $surName = $_POST['surName'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $guardianName = $_POST['guardianName'];
    $guardianContact = $_POST['guardianContact'];
    $emergencyContact = $_POST['emergencyContact'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    
    // Check if the cookie is set
    /* if (isset($_COOKIE['studentId'])) {  
        // Student ID is available, you can use it wherever needed
        $studentId = $_COOKIE['studentId'];
        // Proceed with your logic here
    } else {
        // Student ID cookie is not set, handle unauthorized access
        header('Location: StudentLogin.html');
        exit();
    } */

    $studentId = "DSE231F-57";
    // Check if newPassword or confirmPassword is empty and currentPassword is not empty
    if (!empty($newPassword) || !empty($confirmPassword)) {
        if (empty($currentPassword)) {
            echo "<script>alert('Current Password is required.');</script>";
        } else {
            // Verify current password
            $sqlVerifyPassword = "SELECT StudentPassword FROM student WHERE StudentId='$studentId'";
            $resultVerifyPassword = mysqli_query($connection, $sqlVerifyPassword);

            if (mysqli_num_rows($resultVerifyPassword) > 0) {
                $rowPassword = mysqli_fetch_assoc($resultVerifyPassword);
                $storedPassword = $rowPassword['StudentPassword'];

                if ($currentPassword != $storedPassword) {
                    echo "<script>alert('Incorrect current password.');</script>";
                } else {
                    // Check if newPassword and confirmPassword match
                    if ($newPassword != $confirmPassword) {
                        echo "<script>alert('Password and Confirm Password do not match. Please enter again.');</script>";
                    } else {
                        // Update student table
                        $sqlUpdatePassword = "UPDATE student SET StudentPassword='$newPassword' WHERE StudentId='$studentId'";
                
                        $result = mysqli_query($connection, $sqlUpdatePassword);

                        if ($result) {
                            echo "<script>alert('Student record updated successfully');</script>";
                        } else {
                            echo "<script>alert('Error updating student record.');</script>";
                        }
                    }
                }
            } else {
                die("Student record not found.");
            }
        }
    } else {
        // Update student table without password change
        $sqlStudent = "UPDATE student SET FirstName='$firstName', LastName='$lastName', SurName='$surName', DOB='$dob', StudentAddress='$address', StudentEmail='$email' WHERE StudentId='$studentId'";
        
        if (mysqli_query($connection, $sqlStudent)) {
            echo "<script>alert('Student record updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating student record: " . mysqli_error($connection) . "');</script>";
        }
        
        // Update currentStudent table
        $sqlCurrentStudent = "UPDATE currentStudent SET GuardianName='$guardianName', GuardianContactNo='$guardianContact', EmergencyContactNo='$emergencyContact' WHERE StudentId='$studentId'";
        
        if (mysqli_query($connection, $sqlCurrentStudent)) {
            echo "<script>alert('Current student record updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating current student record: " . mysqli_error($connection) . "');</script>";
        }
    }
}

// Check if the cookie is set
/*  if (isset($_COOKIE['studentId'])) {  
        // Student ID is available, you can use it wherever needed
        $studentId = $_COOKIE['studentId'];
        // Proceed with your logic here
    } else {
        // Student ID cookie is not set, handle unauthorized access
        header('Location: StudentLogin.html');
        exit();
    } */

$sql = "SELECT * FROM student INNER JOIN currentStudent ON student.StudentId = currentStudent.StudentId WHERE student.StudentId='$studentId'";

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "0 results";
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
    <!-- Bootstrap link -->
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
                            Account Update
                        </h4>
                    </div>
                    <div class="card-body">
                        <form name="studentProUp" action="#" method="post">
                            <table class="puTable">
                                <tr>
                                    <th colspan="2">Personal Details</th>
                                </tr>
                                <tr>
                                    <td>
                                        First Name :<br>
                                        <input type="text" name="firstName" value="<?php echo $row['FirstName']; ?>">
                                    </td>
                                    <td>
                                        Last Name :<br>
                                        <input type="text" name="lastName" value="<?php echo $row['LastName']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Sur Name :<br>
                                        <input type="text" name="surName" value="<?php echo $row['SurName']; ?>">
                                    </td>
                                    <td>
                                        DOB :<br>
                                        <input type="date" name="dob" value="<?php echo $row['DOB']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Address :<br>
                                        <input type="text" name="address" value="<?php echo $row['StudentAddress']; ?>">
                                    </td>
                                    <td>
                                        Email :<br>
                                        <input type="email" name="email" value="<?php echo $row['StudentEmail']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Guardian Details</th>
                                </tr>
                                <tr>
                                    <td>
                                        Guardian Name :<br>
                                        <input type="text" name="guardianName" value="<?php echo $row['GuardianName']; ?>">
                                    </td>
                                    <td>
                                        Guardian contact no :<br>
                                        <input type="text" name="guardianContact" value="<?php echo $row['GuardianContactNo']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Emergency contact no :<br>
                                        <input type="text" name="emergencyContact" value="<?php echo $row['EmergencyContactNo']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2">Password</th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Current Password :<br>
                                        <input type="password" name="currentPassword">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        New Password :<br>
                                        <input type="password" name="newPassword">
                                    </td>
                                    <td>
                                        Confirm Password :<br>
                                        <input type="password" name="confirmPassword">
                                    </td>
                                </tr>
                                <tr>
                                    <td><button class="btnStyle1 mx-2">Save</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <script src="js/Dashboard.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
