<?php
// Check if the cookie is set
if(isset($_COOKIE['teacherId'])){
    $TeacherId = $_COOKIE['teacherId']; // Retrieving teacherEmail from cookie
} else {
    // Redirect to login page after displaying a message
    echo '<script>
            var confirmMsg = confirm("Your session has timed out. Please log in again.");
            if (confirmMsg) {
                window.location.href = "TeacherLogin.html";
            }
          </script>';
    exit();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Teacher</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="CSS/Dashboard.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <!-- Bootstrap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'Includes/TeacherSideNav.php'; ?>
            
        <main class="content px-3 py-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col">
                                    <div class="p-3 m-1">
                                        <h4>Upcoming Events</h4>
                                        <p class="mb-0">There are no upcoming events</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Table Element -->
                <div class="card border-0">
                    <div class="card-header">
                        <h4 class="card-title">
                            Time Table
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                            //get database connection
                            include 'DBConnection/DBConnection.php';

                            // Check connection
                            if (!$connection) {
                                echo "Connection failed";
                            }

                            // Check if the cookie is set
                            if(isset($_COOKIE['teacherId'])){
                                $TeacherId = $_COOKIE['teacherId']; // Retrieving teacherEmail from cookie
                            } else {
                                // Redirect to login page after displaying a message
                                echo '<script>
                                        var confirmMsg = confirm("Your session has timed out. Please log in again.");
                                        if (confirmMsg) {
                                            window.location.href = "TeacherLogin.html";
                                        }
                                      </script>';
                                exit();
                            }

                            // SQL query
                            $sql = "SELECT Grade, DayOfWeek, Period
                                    FROM teaching
                                    WHERE TeacherId = '$TeacherId' AND TeachingYear = YEAR(CURDATE())";

                            $result = mysqli_query($connection,$sql);

                            // Check for errors in the query
                            if (!$result) {
                                // Print error message and exit
                                echo "Error: " . mysqli_error($connection);
                                exit();
                            }
                        
                            // Output data
                            if (mysqli_num_rows($result) > 0) {
                                // Initialize array to store subjects by day of week and period
                                $classByDayPeriod = array(
                                    'Monday' => array_fill(1, 8, ''), // Assuming 8 periods in a day
                                    'Tuesday' => array_fill(1, 8, ''),
                                    'Wednesday' => array_fill(1, 8, ''),
                                    'Thursday' => array_fill(1, 8, ''),
                                    'Friday' => array_fill(1, 8, '')
                                );

                                // Store subjects in the array by day of week and period
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $classByDayPeriod[$row['DayOfWeek']][$row['Period']] = $row['Grade'];
                                }

                                // Start the table
                                echo "<table class='table'>";
                                echo "<thead class='table-dark'>";
                                echo "<tr>";
                                echo "<th>Monday</th>";
                                echo "<th>Tuesday</th>";
                                echo "<th>Wednesday</th>";
                                echo "<th>Thursday</th>";
                                echo "<th>Friday</th>";
                                echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                // Determine the maximum number of periods for any day
                                $maxPeriods = 8; // Assuming 8 periods in a day
                                $intervalAdded = false; // Initialize interval added flag
                                
                                // Output data for each period
                                for ($period = 1; $period <= $maxPeriods; $period++) {
                                    echo "<tr>";
                                    foreach ($classByDayPeriod as $day => $periods) {
                                        echo "<td>";
                                        if (isset($periods[$period]) && !empty($periods[$period])) {
                                            echo "Grade " . $periods[$period];
                                        } else {
                                            echo "Free";
                                        }
                                        echo "</td>";
                                    }
                                    echo "</tr>";

                                    // Add an interval row after every 4 rows filled and only once
                                    if ($period % 4 == 0 && !$intervalAdded && $period < $maxPeriods) {
                                        echo "<tr><th colspan='5' class='table-success interval'>INTERVAL</th></tr>";
                                        // Set interval added flag to true
                                        $intervalAdded = true;
                                    }
                                }
                            
                                // End the table
                                echo "</tbody>";
                                echo "</table>";
                            } else {
                                // If no results found
                                echo "No subjects found for this grade and year.";
                            }
                        
                            // Close the database connection
                            mysqli_close($connection);
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="JS/Dashboard.js"></script>
    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
