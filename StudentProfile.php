<?php
// Establish connection to your database
include 'DBConnection/DBConnection.php';

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM student LIMIT 1"; // Assuming you want to fetch only one row
$result = mysqli_query($connection, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Fetch the first row
    $row = mysqli_fetch_assoc($result);
    
    // Close the database connection
    mysqli_close($connection);

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($row);
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
    <title>Account | Student</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="CSS/Dashboard.css">
    <link rel="stylesheet" href="CSS/style.css">
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
                            Account
                        </h4>
                    </div>
                    <div class="row" style="padding-top: 20px; background-color: lightgray;">
                        <div class="col-12 col-md-3 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100 center-content">
                                        <img src="Images/user1.png">
                                        <!-- Placeholder for first and last name -->
                                        <h4></h4>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="row d-flex align-items-start">
                                        <table class="profileStyle">
                                            <tr>
                                                <td>
                                                    <h5>Admission No :</h5>
                                                    <label for="admissionNo"></label>
                                                </td>
                                                <td>
                                                    <h5>Admission Date :</h5>
                                                    <label for="admissionDate"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Address :</h5>
                                                    <label for="address"></label>
                                                </td>
                                                <td>
                                                    <h5>Email :</h5>
                                                    <label for="email"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Date of birth :</h5>
                                                    <label for="dob"></label>
                                                </td>
                                                <td>
                                                    <h5>Guardian Name :</h5>
                                                    <label for="guardianName"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Contact No :</h5>
                                                    <label for="contactNo"></label>
                                                </td>
                                                <td>
                                                    <h5>Emergency Contact No :</h5>
                                                    <label for="emergencyContactNo"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Password :</h5>
                                                    <label for="password"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <button class="btnStyle1">UPDATE</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                </div>
            </div>
        </main>
    </div>

    <!-- JavaScript -->
    <script src="fetch_data.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
