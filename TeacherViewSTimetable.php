<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table | Teacher</title>

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
                <div class="row">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col">
                                    <div class="p-3 m-1">
                                        <h4>Student Time Table</h4>
                                        <form name="formYearSearch" method="post" action="#">
                                            <table>
                                                <tr>
                                                    <td>Grade</td>
                                                    <td>
                                                        <?php
                                                        // Database connection
                                                        include 'DBConnection/DBConnection.php';

                                                        if (!$connection) {
                                                            echo "Connection failed";
                                                        }

                                                        $sql = "SELECT * FROM grade";
                                                        $result = mysqli_query($connection, $sql);

                                                        if ($result) {
                                                            echo '<select id="gradeSelect" class="grade-select-dropdown" name="grade">';
                                                            
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['Grade'] . '">' . $row['Grade'] . '</option>';
                                                            }
                                                            
                                                            echo '</select>';
                                                            
                                                            mysqli_free_result($result);
                                                        } else {
                                                            echo "Error: " . mysqli_error($connection);
                                                        }

                                                        // Close the database connection
                                                        mysqli_close($connection);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <button class="btnStyle1 mx-2" type="submit" name="submit">Search</button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
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
                        if(isset($_COOKIE['teacherEmail'])){
                            $teacherEmail = $_COOKIE['teacherEmail']; // Retrieving teacherEmail from cookie
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

                        // Get the selected grade from the form submission
                        if(isset($_POST['grade'])) {
                            $grade = $_POST['grade'];
                        } else {
                            // Default value if no grade is selected
                            $grade = "6"; // Or any default value you prefer
                        }


                        // SQL query
                        $sql = "SELECT subjects.SubjectName, teaching.DayOfWeek
                                FROM subjects 
                                INNER JOIN teaching ON subjects.SubjectId = teaching.SubjectId 
                                WHERE teaching.Grade = $grade AND teaching.TeachingYear = YEAR(CURDATE())";

                        $result = mysqli_query($connection,$sql);

                        // Output data
                        if (mysqli_num_rows($result) > 0) {
                            // Initialize array to store subjects by day of week
                            $subjectsByDay = array(
                                'Monday' => array(),
                                'Tuesday' => array(),
                                'Wednesday' => array(),
                                'Thursday' => array(),
                                'Friday' => array()
                            );

                            // Store subjects in the array by day of week
                            while ($row = mysqli_fetch_assoc($result)) {
                                $subjectsByDay[$row['DayOfWeek']][] = $row['SubjectName'];
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

                            // Determine the maximum number of subjects for any day
                            $maxSubjects = max(array_map('count', $subjectsByDay));
                            $rowCount = 0; // Initialize row count

                            // Output data for each row
                            for ($i = 0; $i < $maxSubjects; $i++) {
                                echo "<tr>";

                                // Output subjects for each day
                                foreach ($subjectsByDay as $day => $subjects) {
                                    echo "<td>";
                                    if (isset($subjects[$i])) {
                                        echo $subjects[$i];
                                    }
                                    echo "</td>";
                                }

                                echo "</tr>";

                                // Increment row count
                                $rowCount++;

                                // Add an interval row after every 4 rows filled
                                if ($rowCount % 4 == 0 && $i < $maxSubjects - 1) {
                                    echo "<tr><th colspan='5' class='table-success interval'>INTERVAL</th></tr>";
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


    <script src="js/Dashboard.js"></script>
    <!-- link Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
