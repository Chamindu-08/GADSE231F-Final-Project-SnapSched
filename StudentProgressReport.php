<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report | Student</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="CSS/Dashboard.css" />
    <link rel="stylesheet" href="CSS/style.css" />
    <!-- Bootstap link -->
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
                                                        <td><select id="gradeSelect" class="grade-select-dropdown">
                                                            <option value="2024">2024</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
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
                            <table class="tableHead">
                                <tr>
                                    <th colspan="2"><img src="Images/Logo.jpg"></th>
                                </tr>
                                <tr>
                                    <th colspan="2">Sri Indasara Vidyalaya</th>
                                </tr>
                                <tr>
                                    <td colspan="2">Name : </td>
                                </tr>
                                <tr>
                                    <td>Scholl year : </td>
                                    <td>Grade : </td>
                                </tr>
                            </table>
                            <table class="table">
                                
                                <thead class="table-dark">
                                  <tr>
                                    <th style="width: 55%;">Subject</th>
                                    <th style="width: 15%;">1st term<br>Mark</th>
                                    <th style="width: 15%;">2nd term<br>Mark</th>
                                    <th style="width: 15%;">3rd term<br>Mark</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                      <td>Subject 1</td>
                                      <td>75</td>
                                      <td>75</td>
                                      <td>75</td>
                                  </tr>
                                  <tr>
                                    <td>Total Marks</td>
                                    <td>750</td>
                                    <td>750</td>
                                    <td>750</td>
                                </tr>
                                <tr>
                                    <td>Avarage of Marks</td>
                                    <td>75</td>
                                    <td>75</td>
                                    <td>75</td>
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