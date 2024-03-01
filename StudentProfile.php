<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Student</title>

    <!-- stylesheet -->
    <link rel="stylesheet" href="css/Dashboard.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstap link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <?php include 'Includes./DashSideNav.php'; ?>
            
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
                            <table class="table">
                                <tbody>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Name :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Adress :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Email :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Guardian Name :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Guardian Contact No :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Emergency Contact No :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td><img src=""></td>
                                      <td>Password :</td>
                                      <td><input type="text"></td>
                                  </tr>
                                  <tr>
                                      <td colspan="3"><button class="btnStyle1 mx-2" onclick="studentProfileUpdate()">UPDATE</button></td>
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