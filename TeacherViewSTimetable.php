<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table | Student</title>

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
                                            <h4>School Progress Report</h4>
                                            <form name="formYearSearch" method="post" action="#">
                                                <table>
                                                    <tr>
                                                        <td>Class</td>
                                                        <td><select id="gradeSelect" class="grade-select-dropdown">
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                          </select></td>
                                                          <td>
                                                            <button class="btnStyle1 mx-2" type="button">Search</button>
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
                            <table class="table">
                                <thead class="table-dark">
                                  <tr>
                                    <th>Monday</th>
                                    <th>Tuesday</th>
                                    <th>Wednesday</th>
                                    <th>Thursday</th>
                                    <th>Friday</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <thead class="table-dark">
                                      <tr>
                                        <th colspan="5" class="table-success interval">INTERVAL</th>
                                      </tr>
                                  </thead>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                  <tr>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                      <td>Subject</td>
                                  </tr>
                                </tbody>
                              </table>
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