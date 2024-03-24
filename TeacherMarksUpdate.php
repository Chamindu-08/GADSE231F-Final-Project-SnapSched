<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marks | Teacher</title>

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
                                        <h4>Student marks</h4>
                                        <form method="post" action="#">
                                            <table>
                                                <?php
                                                // Database connection
                                                include 'DBConnection/DBConnection.php';

                                                if (!$connection) {
                                                    echo "Connection failed";
                                                }

                                                // Grade Select Dropdown
                                                $sql = "SELECT * FROM grade";
                                                $result = mysqli_query($connection, $sql);

                                                if ($result) {
                                                    echo '<tr><td>Grade :</td><td>';
                                                    echo '<select id="gradeSelect" class="grade-select-dropdown" name="gradeSelect">';
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $row['Grade'] . '">' . $row['Grade'] . '</option>';
                                                    }
                                                    echo '</select></td></tr>';
                                                    mysqli_free_result($result);
                                                } else {
                                                    echo "Error: " . mysqli_error($connection);
                                                }

                                                // Subject Select Dropdown
                                                $sql = "SELECT * FROM subjects";
                                                $result = mysqli_query($connection, $sql);

                                                if ($result) {
                                                    echo '<tr><td>Subject :</td><td>';
                                                    echo '<select id="subjectSelect" class="subject-select-dropdown" name="subjectSelect">';
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="' . $row['SubjectName'] . '">' . $row['SubjectName'] . '</option>';
                                                    }
                                                    echo '</select></td></tr>';
                                                    mysqli_free_result($result);
                                                } else {
                                                    echo "Error: " . mysqli_error($connection);
                                                }
                                                ?>

                                                <tr>
                                                    <td>Term :</td>
                                                    <td>
                                                        <select id="termSelect" class="term-select-dropdown" name="termSelect">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">
                                                        <button class="btnStyle1 mx-2" type="submit">Search</button>
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
                        <form method="post" action="#">
                            <?php
                            // Handle form submission
                            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['gradeSelect']) && isset($_POST['subjectSelect']) && isset($_POST['termSelect'])) {
                                // Retrieve selected values from the form
                                $selectedGrade = $_POST['gradeSelect'];
                                $selectedSubjectName = $_POST['subjectSelect'];
                                $selectedTerm = $_POST['termSelect'];

                                // Database connection
                                include 'DBConnection/DBConnection.php';

                                if (!$connection) {
                                    echo "Connection failed";
                                }

                                // Display student details
                                echo '<table class="tableHead">';
                                echo '<tr><th colspan="2"><img src="Images/Logo.jpg"></th></tr>';
                                echo '<tr><th colspan="2">Sri Indasara Vidyalaya</th></tr>';
                                echo '<tr><td>Grade : ' . $selectedGrade . '</td><td colspan="2">Subject : ' . $selectedSubjectName . '</td></tr>';
                                echo '<tr><td>School year : ' . date("Y") . '</td><td>Term : ' . $selectedTerm . '</td></tr>';
                                echo '</table>';

                                // Fetch student data based on selected criteria
                                $sql = "SELECT student.*, marks.Mark 
                                        FROM student 
                                        LEFT JOIN marks ON student.StudentId = marks.StudentId
                                        LEFT JOIN subjects ON marks.SubjectId = subjects.SubjectId
                                        WHERE student.Grade = '$selectedGrade' AND 
                                            subjects.SubjectName = '$selectedSubjectName' AND 
                                            marks.Term = '$selectedTerm'";
                                $result = mysqli_query($connection, $sql);

                                // Display student data
                                if ($result) {
                                    echo '<table class="table">';
                                    echo '<thead class="table-dark">';
                                    echo '<tr>';
                                    echo '<th style="width: 20%;">Student ID</th>';
                                    echo '<th style="width: 40%;">Student Name</th>';
                                    echo '<th style="width: 10%;">Term</th>';
                                    echo '<th style="width: 30%;">Mark</th>';
                                    echo '</tr>';
                                    echo '</thead>';
                                    echo '<tbody>';

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<input type="hidden" name="studentIds[]" value="' . $row['StudentId'] . '">';
                                        echo '<td>' . $row['StudentId'] . '</td>';
                                        echo '<td>' . $row['FirstName'] . ' ' . $row['LastName'] . '</td>';
                                        echo '<td>' . $selectedTerm . '</td>';
                                        echo '<td><input type="text" name="marks[]" value="' . ($row['Mark'] ?? '') . '"></td>';
                                        echo '</tr>';
                                    }

                                    echo '<tr>';
                                    echo '<td colspan="2"><button type="submit" class="btnStyle1 mx-2">Save</button></td>';
                                    echo '</tr>';
                                    echo '</tbody>';
                                    echo '</table>';
                                    mysqli_free_result($result);
                                } else {
                                    echo "Error: " . mysqli_error($connection);
                                }

                                // Close the database connection
                                mysqli_close($connection);
                            }
                            ?>
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
