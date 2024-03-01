<aside id="sidebar" class="js-sidebar">
    <!-- Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">Sri Indasara Vidyalaya</a>
            <img src="Images/flags.png" alt="">
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a href="StudentDashboard.php" class="sidebar-link">
                    <img src="Images/menu-burger.png" style="width:15px;">
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="StudentTimetable.php" class="sidebar-link" data-bs-target="#pages" aria-expanded="false">
                    <img src="Images/table-calendar.png" style="width:15px;">
                    Time Table
                </a>
            </li>
            <li class="sidebar-item">
                <a href="StudentProgressReport.php" class="sidebar-link" data-bs-target="#posts" aria-expanded="false">
                    <img src="Images/progress-report.png" style="width:15px;">
                    Progress Report
                </a>
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                    aria-expanded="false"><img src="Images/user1.png" style="width:15px;">
                    Profile
                </a>
                <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="StudentProfile.php" class="sidebar-link">View Profile</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="StudentProfileUpdate.php" class="sidebar-link">Update Profile</a>
                    </li>
                    <li class="sidebar-item">
                        <a href="StudentChangePassword.php" class="sidebar-link">Change Password</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="StudentLogout.php" class="sidebar-link" data-bs-target="#multi" aria-expanded="false">
                    <img src="Images/logout.png" style="width:15px;">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</aside>


<div class="main">
    <!-- Nav bar -->
    <nav class="navbar navbar-expand px-3 border-bottom">
        <div class="col">
        <button class="btn" id="sidebar-toggle" type="button">
            <span><img class="menu-burger" src="Images/menu-burger.png"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="Images/logo.jpg" alt="Logo" style="width:50px; height: auto;">
        </a>
        </div>
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
                <form class="d-flex">
                    <input class="form-control me-2" id="searchBar" type="text" style="border-color: rgb(0,35,135);;" placeholder="Search">
                    <a class="navbar-brand" href="#">
                        <img id="btnsearch" src="Images/search.png" alt="Search" style="width:15px;">
                    </a>
                </form>
                <label style="margin-left: 10px; margin-right: 10px;">Induwara D C I</label>
                <li class="nav-item dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                        <img src="Images/user-icon.png" class="avatar" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="StudentProfile.php" class="dropdown-item"><img src="Images/user2.png" style="width:15px;">Profile</a>
                        <a href="StudentProfileUpdate.php" class="dropdown-item"><img src="Images/settings.png" style="width:15px;">Setting</a>
                        <a href="StudentLogout.php" class="dropdown-item"><img src="Images/sign-out-alt.png" style="width:15px;">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>