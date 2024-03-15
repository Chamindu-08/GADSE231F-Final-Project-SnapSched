<?php
    // Start session
    session_start();

    // Include database connection
    include 'DBConnection/DBConnection.php';

    // Check if the connection to the database failed
    if (!$connection) {
        echo "Database connection failed. Please try again later.";
    }

    // Check if username and password are provided via POST request
    if (isset($_POST['textUserName']) && isset($_POST['textPassword'])) {

        // Function to validate input data
        function Validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Validate username and password
        $userName = Validate($_POST['textUserName']);
        $password = Validate($_POST['textPassword']);

        // Check if username or password is empty
        if (empty($userName) || empty($password)) {
            echo "Username and password are required fields.";
        } else {
            // Construct SQL query to fetch user details
            $sql = "SELECT * FROM student WHERE (StudentId='$userName' OR StudentEmail='$userName') AND StudentPassword='$password'";

            // Execute the query
            $result = mysqli_query($connection, $sql);

            // Check if exactly one row is returned
            if (mysqli_num_rows($result) == 1) {
                // Fetch the row
                $row = mysqli_fetch_assoc($result);
                
                // Store user details in session variables
                $_SESSION['userName'] = $row['StudentEmail'];
                $_SESSION['password'] = $password;

                // Fetch the student ID from the row
                $studentId = $row['StudentId'];

                // Set cookie for StudentId (expire in 30 minutes)
                setcookie('studentId', $studentId, time() + (30 * 60), "/"); 

                // Redirect to student dashboard
                header("Location: StudentDashboard.php");
                exit();
            } else {
                // If no or more than one row is returned, display error
                echo "Invalid username or password.";
            }
        }
    } else {
        // If username or password is not provided via POST request, display error
        echo "Username and password are required fields.";
    }

    // Close the database connection
    mysqli_close($connection);
?>
