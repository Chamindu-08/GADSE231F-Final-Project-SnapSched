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
                        <table class="tableHead">
                            <tr>
                                <th colspan="2"><img src="Images/Logo.jpg"></th>
                            </tr>
                            <tr>
                                <th colspan="2">Sri Indasara Vidyalaya</th>
                            </tr>
                            <tr>
                                <td colspan="2">Name : <?php echo isset($fullName) ? $fullName : ""; ?></td>
                            </tr>
                            <tr>
                                <td>School year : <?php echo isset($selectedYear) ? $selectedYear : ""; ?></td>
                                <td>Grade : <?php echo isset($grade) ? $grade : ""; ?></td>
                            </tr>

                        </table>
                        <table class="table" id="progressTable">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 25%;">Subject Name</th>
                                    <th style="width: 15%;">1st term Mark</th>
                                    <th style="width: 15%;">2nd term Mark</th>
                                    <th style="width: 15%;">3rd term Mark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Initialize variables
                                $fullName = "";
                                $selectedYear = "";
                                $grade = "";

                                if (isset($_POST['submit'])) {
                                    $selectedYear = $_POST['year'];

                                    // Re-establish database connection
                                    include 'DBConnection/DBConnection.php';

                                    // Fetch student information
                                    $studentID = "DSE231F-57";
                                    $studentSql = "SELECT CONCAT(FirstName, ' ', LastName) AS FullName, Grade 
                                                   FROM student 
                                                   WHERE StudentId = 'DSE231F-57'"; // Replace 'DSE231F-57' with the appropriate student ID
                                    $studentResult = mysqli_query($connection, $studentSql);

                                    if ($studentResult) {
                                        $studentRow = mysqli_fetch_assoc($studentResult);
                                        $fullName = $studentRow['FullName'];
                                        $grade = $studentRow['Grade'];
                                    } else {
                                        echo "Error fetching student information: " . mysqli_error($connection);
                                    }

                                    // Query to retrieve subject marks based on the selected year
                                    $marksSql = "SELECT s.SubjectName, m.Term, m.Mark
                                                 FROM marks m
                                                 JOIN subjects s ON m.SubjectId = s.SubjectId
                                                 WHERE m.MarkOfYear = $selectedYear
                                                 ORDER BY s.SubjectName, m.Term";

                                    $result = mysqli_query($connection, $marksSql);

                                    if ($result) {
                                        $currentSubject = null;
                                        $marks = ['1st term Mark' => '', '2nd term Mark' => '', '3rd term Mark' => ''];
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            if ($row['SubjectName'] !== $currentSubject) {
                                                if (!is_null($currentSubject)) {
                                                    echo "<tr>";
                                                    foreach ($marks as $mark) {
                                                        echo "<td>" . $mark . "</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                $currentSubject = $row['SubjectName'];
                                                $marks = ['1st term Mark' => '', '2nd term Mark' => '', '3rd term Mark' => ''];
                                                echo "<tr><td>" . $currentSubject . "</td>";
                                            }
                                            $marks[$row['Term']] = $row['Mark'];
                                        }
                                        echo "<tr>";
                                        foreach ($marks as $mark) {
                                            echo "<td>" . $mark . "</td>";
                                        }
                                        echo "</tr>";
                                    } else {
                                        echo "Error fetching subject marks: " . mysqli_error($connection);
                                    }

                                    // Close the database connection
                                    mysqli_close($connection);
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="js/Dashboard.js"></script>
<!-- Bootstrap script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
