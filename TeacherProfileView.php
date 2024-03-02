<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account | Student</title>

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
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h4 class="card-title">
                                Account
                            </h4>
                        </div>
                        <div class="row" style="padding-top: 20px; background-color: lightgray;">
                        <div class="col-12 col-md-3 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100 center-content">
                                        <img src="Images/user1.png">
                                        <h4>First and Last Name</h4>
                                        <h6>Sure Name</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-9 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="row d-flex align-items-start">
                                        <table class="profileStyle">
                                            <tr>
                                                <td>
                                                    <h5>Admission No :</h5>
                                                    <label>6565</label>
                                                </td>
                                                <td>
                                                    <h5>Admission Date :</h5>
                                                    <label>02/03/2024</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Address :</h5>
                                                    <label>Galle, Sri Lanka</label>
                                                </td>
                                                <td>
                                                    <h5>Email :</h5>
                                                    <label>snapsched@gmail.com</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Date of birth :</h5>
                                                    <label>02/03/2024</label>
                                                </td>
                                                <td>
                                                    <h5>Contact No :</h5>
                                                    <label>077 12 34 567</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5>Password :</h5>
                                                    <label>XXXXXXXXXX</label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <button class="btnStyle1">UPDATE</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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