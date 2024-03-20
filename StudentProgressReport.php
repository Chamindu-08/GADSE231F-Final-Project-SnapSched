<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report | Student</title>

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
                <div class="row">
                    <div class="card flex-fill border-0 illustration">
                        <div class="card-body p-0 d-flex flex-fill">
                            <div class="row g-0 w-100">
                                <div class="col">
                                    <div class="p-3 m-1">
                                        <h4>School Progress Report</h4>
                                        <form name="formYearSearch" method="post" action="#">
                                            <table>
                                                <tr>
                                                    <td>Year</td>
                                                    <td>
                                                        <?php
                                                        // Database connection
                                                        include 'DBConnection/DBConnection.php';

                                                        if (!$connection) {
                                                            echo "Connection failed";
                                                        }

                                                        $sql = "SELECT DISTINCT MarkOfYear FROM marks ORDER BY MarkOfYear DESC";
                                                        $result = mysqli_query($connection, $sql);

                                                        if ($result) {
                                                            echo '<select id="gradeSelect" class="grade-select-dropdown" name="year">';
                                                            
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['MarkOfYear'] . '">' . $row['MarkOfYear'] . '</option>';
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
                    <div class="card-body">
                        <?php
                        // Check if form is submitted
                        if (isset($_POST['submit'])) {
                            // Initialize variables
                            $fullName = "";
                            $selectedYear = "";
                            $grade = "";

                            // Retrieve selected year from form
                            $selectedYear = $_POST['year'];

                            // Re-establish database connection
                            include 'DBConnection/DBConnection.php';

                            // Check if the cookie is set
                            if (isset($_COOKIE['studentId'])) {
                                // Student ID is available, you can use it wherever needed
                                $studentId = $_COOKIE['studentId'];
                                // Proceed with your logic here
                            } else {
                                // Student ID cookie is not set, handle unauthorized access
                                echo "<script>alert('Your session has timed out. Please log in again.');</script>";
                                header('Location: StudentLogin.html');
                                exit();
                            }

                            // Fetch student information
                            $studentSql = "SELECT CONCAT(FirstName, ' ', LastName) AS FullName, Grade 
                                           FROM student 
                                           WHERE StudentId = '$studentId'";
                            $studentResult = mysqli_query($connection, $studentSql);

                            if ($studentResult) {
                                $studentRow = mysqli_fetch_assoc($studentResult);
                                $fullName = $studentRow['FullName'];
                                $grade = $studentRow['Grade'];

                                // Display student details
                                echo '<table class="tableHead">';
                                echo '<tr><th colspan="2"><img src="Images/Logo.jpg"></th></tr>';
                                echo '<tr><th colspan="2">Sri Indasara Vidyalaya</th></tr>';
                                echo '<tr><td colspan="2">Name : ' . $fullName . '</td></tr>';
                                echo '<tr><td>School year : ' . $selectedYear . '</td><td>Grade : ' . $grade . '</td></tr>';
                                echo '</table>';

                                // Query to retrieve subject marks based on the selected year
                                $marksSql = "SELECT s.SubjectName, m.Term, m.Mark
                                             FROM marks m
                                             JOIN subjects s ON m.SubjectId = s.SubjectId
                                             WHERE m.MarkOfYear = '$selectedYear' AND m.StudentId = '$studentId'
                                             ORDER BY s.SubjectName, m.Term";

                                $result = mysqli_query($connection, $marksSql);

                                // Display progress report table
                                if ($result) {
                                    echo '<table class="table" id="progressTable">';
                                    echo '<thead class="table-dark">';
                                    echo '<tr>';
                                    echo '<th style="width: 25%;">Subject Name</th>';
                                    echo '<th style="width: 15%;">1st term Mark</th>';
                                    echo '<th style="width: 15%;">2nd term Mark</th>';
                                    echo '<th style="width: 15%;">3rd term Mark</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    $currentSubject = null;
                                    $marks = ['1st term Mark' => '', '2nd term Mark' => '', '3rd term Mark' => ''];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if ($row['SubjectName'] !== $currentSubject) {
                                            if (!is_null($currentSubject)) {
                                                // Print marks for the previous subject from the 4th column onwards
                                                echo '<tr>';
                                                $i = 0;
                                                foreach ($marks as $key => $mark) {
                                                    $i++;
                                                    if ($i > 2) {
                                                        echo '<td style="width: 15%;">' . ($mark === '' ? '' : $mark) . '</td>';
                                                    }
                                                }
                                                echo '</tr>';
                                            }
                                            // Reset marks array for the new subject
                                            $currentSubject = $row['SubjectName'];
                                            $marks = ['1st term Mark' => '', '2nd term Mark' => '', '3rd term Mark' => ''];
                                            echo '<tr><td>' . $currentSubject . '</td>';
                                        }
                                        // Store mark in corresponding term slot
                                        $marks[$row['Term']] = $row['Mark'];
                                    }
                                    // Print marks for the last subject from the 4th column onwards
                                    echo '<tr>';
                                    $i = 0;
                                    foreach ($marks as $key => $mark) {
                                        $i++;
                                       
                                        if ($i > 2) {
                                            echo '<td style="width: 15%;">' . ($mark === '' ? '' : $mark) . '</td>';
                                        }
                                    }
                                    echo '</tr>';
                                    echo '</tbody>';
                                    echo '</table>';
                                } else {
                                    echo 'Error fetching subject marks: ' . mysqli_error($connection);
                                }
                            } else {
                                echo 'Error fetching student information: ' . mysqli_error($connection);
                            }

                            // Close the database connection
                            mysqli_close($connection);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="js/Dashboard.js"></script>
    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>