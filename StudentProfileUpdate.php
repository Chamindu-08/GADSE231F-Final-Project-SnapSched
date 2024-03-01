<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Update | Student</title>

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
                            <form name="studentProUp" action="#" method="post">
                                <table class="table">
                                    <tbody>
                                      <tr>
                                          <td>First Name :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Last Name :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Sur Name :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Adress :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>DOB :</td>
                                          <td><input type="date"></td>
                                      </tr>
                                      <tr>
                                          <td>Email :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Guardian Name :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Guardian contact no :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Emergency contact no :</td>
                                          <td><input type="text"></td>
                                      </tr>
                                      <tr>
                                          <td>Current Password :</td>
                                          <td><input type="password"></td>
                                      </tr>
                                      <tr>
                                          <td>New Password :</td>
                                          <td><input type="password"></td>
                                      </tr>
                                      <tr>
                                          <td>Confirm Password :</td>
                                          <td><input type="password"></td>
                                      </tr>
                                      <tr>
                                          <td><button class="btnStyle1 mx-2">Save</button></td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </form>
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