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
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $surName = $_POST['sur_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $contact_no = $_POST['contact_no'];
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Check if the cookie is set
    if(isset($_COOKIE['teacherEmail'])){
            $teacherEmail = $_COOKIE['teacherEmail']; // Retrieving teacherEmail from cookie
    } else {
        // Teacher email cookie is not set, handle unauthorized access
        header('Location: TeacherLogin.html');
        exit();
    }

    // Check if newPassword or confirmPassword is empty and currentPassword is not empty
    if (!empty($newPassword) || !empty($confirmPassword)) {
        if (empty($currentPassword)) {
            echo "<script>alert('Current Password is required.');</script>";
        } else {
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
                        // Update teacher table
                        $sqlUpdatePassword = "UPDATE teacher SET TeacherPassword='$newPassword' WHERE TeacherEmail='$teacherEmail'";
                
                        $result = mysqli_query($connection, $sqlUpdatePassword);

                        if ($result) {
                            echo "<script>alert('Teacher record updated successfully');</script>";
                        } else {
                            echo "<script>alert('Error updating teacher record.');</script>";
                        }
                    }
                }
            } else {
                die("Teacher record not found.");
            }
        }
    } else {
        // Update teacher table without password change
        $sqlTeacher = "UPDATE teacher SET FirstName='$firstName', LastName='$lastName', SurName='$surName', TeacherAddress='$address', TeacherEmail='$email', TeacherContactNo='$contact_no' WHERE TeacherEmail='$teacherEmail'";
        
        if (mysqli_query($connection, $sqlTeacher)) {
            echo "<script>alert('Teacher record updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating teacher record: " . mysqli_error($connection) . "');</script>";
        }
    }
}

// Check if the cookie is set
if (isset($_COOKIE['teacherEmail'])) {  
    //teacherEmail is available, you can use it wherever needed
    $teacherEmail = $_COOKIE['teacherEmail'];
    // Proceed with your logic here
} else {
    //teacherEmail cookie is not set, handle unauthorized access
    header('Location: TeacherLogin.html');
    exit();
}

$sql = "SELECT * FROM teacher WHERE TeacherEmail='$teacherEmail'";

$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $first_name = $row['FirstName'];
    $last_name = $row['LastName'];
    $sur_name = $row['SurName'];
    $address = $row['TeacherAddress'];
    $email = $row['TeacherEmail'];
    $contact_no = $row['TeacherContactNo'];
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
    <title>Account Update | Teacher</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="CSS/Dashboard.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <!-- Bootstap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'Includes/TeacherSideNav.php'; ?>

            
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
                            <form name="teacherProUp" action="#" method="post">
                                <table class="puTable">
                                    <tr>
                                        <th colspan="2">Personal Details</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            First Name :<br>
                                            <input type="text" name="first_name" value="<?php echo $first_name; ?>">
                                        </td>
                                        <td>
                                            Last Name :<br>
                                            <input type="text" name="last_name" value="<?php echo $last_name; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sure Name :<br>
                                            <input type="text" name="sur_name" value="<?php echo $sur_name; ?>">
                                        </td>
                                        <td>
                                            Address :<br>
                                            <input type="text" name="address" value="<?php echo $address; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Contact no :<br>
                                            <input type="text" name="contact_no" value="<?php echo $contact_no; ?>">
                                        </td>
                                        <td>
                                            Email :<br>
                                            <input type="email" name="email" value="<?php echo $email; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Password</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            Current Password :<br>
                                            <input type="password" name="current_password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            New Password :<br>
                                            <input type="password" name="new_password">
                                        </td>
                                        <td>
                                            Confirm Password :<br>
                                            <input type="password" name="confirm_password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button type="submit" class="btnStyle1 mx-2">Save</button></td>
                                    </tr>
                                    
                                  </table>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="js/Dashboard.js"></script>
    <!-- link Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
