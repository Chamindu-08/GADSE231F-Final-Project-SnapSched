<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Update | Student</title>

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
                        <div class="card-body">
                            <form name="studentProUp" action="#" method="post">
                                <table class="puTable">
                                    <tr>
                                        <th colspan="2">Presonal Details</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            First Name :<br>
                                            <input type="text">
                                        </td>
                                        <td>
                                            Last Name :<br>
                                            <input type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Sur Name :<br>
                                            <input type="text">
                                        </td>
                                        <td>
                                            DOB :<br>
                                            <input type="date">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Address :<br>
                                            <input type="text">
                                        </td>
                                        <td>
                                            Email :<br>
                                            <input type="email">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Contact no :<br>
                                            <input type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">Password</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            Current Password :<br>
                                            <input type="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            New Password :<br>
                                            <input type="password">
                                        </td>
                                        <td>
                                            Confirm Password :<br>
                                            <input type="password">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button class="btnStyle1 mx-2">Save</button></td>
                                    </tr>
                                    
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