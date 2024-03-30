<!DOCTYPE html>
<html lang="en">
<head>
  <title>INDASARA MAHA VIDYALAYA | HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstap link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lightbox CSS -->
  <link rel="stylesheet" href="lightbox2-dev/dist/css/lightbox.min.css" />
  <!-- stylesheet -->
  <link rel="stylesheet" href="CSS/style.css" />
  
</head>

<body>

  <script>
    function studentLogin(){
      window.location.href = "StudentLogin.html";
    }
    function teacherLogin(){
      window.location.href = "TeacherLogin.html";
    }
  </script>

    <!-- nav bar -->
  <nav class="subNavBar navbar navbar-expand-sm fixed-top justify-content-center">
    <div class="container">
        <p class="title1">Proudly Celebrating It's 78th Anniversary...</p>
        <div class="ml-auto">
          <button onclick="studentLogin()" class="btnStyle mx-2" type="button">Student</button>
          <button onclick="teacherLogin()" class="btnStyle mx-2" type="button">Teacher</button>
        </div>
    </div>
  </nav>

  <nav class="navBar navbar navbar-expand-sm fixed-top justify-content-center">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="Images/SnapSchetLogo.png" alt="Logo" style="width:170px; height: auto;">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="homeNavBar">
            <ul class="navLink">
                <li class="nav-item">
                    <a class="nav-link" href="HomePage.php"><p class="fontWhite" style="font-size: 13px; font-weight: bold;">Home</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="HomeAboutSchool.php"><p class="fontWhite" style="font-size: 13px; font-weight: bold;">About school</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="HomeAdministration.php"><p class="fontWhite" style="font-size: 13px; font-weight: bold;">Administration</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="HomeGallery.php"><p class="fontWhite" style="font-size: 13px; font-weight: bold;">Gallery</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="HomeContactUS.php"><p class="fontWhite" style="font-size: 13px; font-weight: bold;">Contact US</p></a>
                </li>
            </ul>
        </div>
        <form class="d-flex">
            <input class="form-control me-2" id="searchBar" type="text" style="border-color: rgb(0,35,135);;" placeholder="Search">
            <a class="navbar-brand" href="#">
                <img id="btnsearch" src="Images/search-icon.png" alt="Search" style="width:15px;">
            </a>
        </form>
    </div>
   </nav>

    <!-- carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="Images/School16.jpg" alt="Los Angeles" class="d-block" style="width:100%; height: 700px;">
          <div class="carousel-caption">
            <h1 class="fontMontserratHead">තල්අරඹ ශ්‍රී ඉන්දසාර මහ විදුහල.</h1>
            <p class="fontMontserrat">නැණ ගුණ වඩා ඉදිරියටම යව්!</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="Images/School2.jpg" alt="Chicago" class="d-block" style="width:100%; height: 700px">
          <div class="carousel-caption">
            <h1 class="fontMontserratHead">තල්අරඹ ශ්‍රී ඉන්දසාර මහ විදුහල.</h1>
            <p class="fontMontserrat">නැණ ගුණ වඩා ඉදිරියටම යව්!</p>
          </div> 
        </div>
        <div class="carousel-item active">
          <img src="Images/OATH1.jpg" alt="Los Angeles" class="d-block" style="width:100%; height: 700px">
          <div class="carousel-caption">
            <h1 class="fontMontserratHead">තල්අරඹ ශ්‍රී ඉන්දසාර මහ විදුහල.</h1>
            <p class="fontMontserrat">නැණ ගුණ වඩා ඉදිරියටම යව්!</p>
          </div>
        </div>
        <div class="carousel-item active">
          <img src="Images/OATH6.jpg" alt="Los Angeles" class="d-block" style="width:100%; height: 700px">
          <div class="carousel-caption">
            <h1 class="fontMontserratHead">තල්අරඹ ශ්‍රී ඉන්දසාර මහ විදුහල.</h1>
            <p class="fontMontserrat">නැණ ගුණ වඩා ඉදිරියටම යව්!</p>
          </div>
        </div>
      </div>
      
      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  
    <!-- about school -->
    <div class="mt-5 container detailsBox">
      <div class="row">
        <div class="col-3">
          <div class="row">
            <div class="col-3">
              <img src="Images/icon-1.png" style="width: 50px;">
            </div>
            <div class="col-9">
              <h5>School Life</h5>
              <h6>Overall in here</h6>
            </div>
          </div> 
        </div>
        <div class="col-3">
          <div class="row">
            <div class="col-3">
              <img src="Images/icon-2.png" style="width: 50px;">
            </div>
            <div class="col-9">
              <h5>Graduation</h5>
              <h6>Getting Diploma</h6>
            </div>
          </div> 
        </div>
        <div class="col-3">
          <div class="row">
            <div class="col-3">
              <img src="Images/icon-3.png" style="width: 50px;">
            </div>
            <div class="col-9">
              <h5>Athletics</h5>
              <h6>Sport Clubs</h6>
            </div>
          </div> 
        </div>
        <div class="col-3">
          <div class="row">
            <div class="col-3">
              <img src="Images/icon-4.png" style="width: 50px;">
            </div>
            <div class="col-9">
              <h5>Social</h5>
              <h6>Overall in here</h6>
            </div>
          </div> 
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-6">
          <h6 class="fontMontserrat">A Big Family</h6>
          <h3 class="fontMontserratHead1">Thalaraba Sri Indasara Vidyalaya</h3>
          <p class="paraFont">Sujatha Vidyalaya Matara which was established in 1928 in southern Sri Lanka has largely contributed in creating useful citizens to the nation. Even though it started with only thirty six students and a staff of four teachers, at present it stands as one of the well-recognized schools, both nationally and internationally.<br><br>Sujatha Vidyalaya was built in its current location in 1949. It was initiated with the intention of providing English education for Buddhist girls in Sri Lanka and now with a history of nine decades, the school has become one of the highly regarded schools in Sri Lanka.</p>
        </div>
        <div class="col-6">
          <img src="images/banner1.png" width="100%">
        </div>
      </div>
    </div>

    <!-- HISTORY -->
    <div class="mt-5 container detailsBox">
        <div class="row">
            <h1 style="text-align: center;">History</h1>
        </div>
        <div class="mt-3 row">
            <div class="col">
                <div class="card" style="width: auto;">
                    <img class="card-img-top" src="images/history_01.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title h4style">Our Beginning</h4>
                      <p class="card-text paraFont">Before shifting to the present site the school was located in a piece of flat coconut plantation at the junctions bordered by the Hakmana Road leading to Veragampita..</p>
                      <a href="#"><button>Read More</button></a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card" style="width: auto;">
                    <img class="card-img-top" src="images/history_02.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title h4style">Sujatha Dhamma School</h4>
                      <p class="card-text paraFont">Sujatha dhamma School was started in 1995 according to an idea of our early principal Mrs. R.Gunawikcrema. Her main purpose was to give an opportunity of gaining Dhamma School..</p>
                      <a href="#"><button>Read More</button></a>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card" style="width: auto;">
                    <img class="card-img-top" src="images/history_03.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title h4style">Sujatha Primary</h4>
                      <p class="card-text paraFont">Sujatha Primary is located in Welegoda. It was established in 1991, at the place where the 'Sudharshana Adarsha Vidyalaya' was. There are classes from grade 1 to grade 5 and..</p>
                      <a href="#"><button>Read More</button></a>
                    </div>
                  </div>
            </div>
        </div>
    </div>

    <!-- ABOUNT PRINCIPLE -->
    <div class="container mt-5">
      <div class="card" style="width:100%; padding-top: 50px; padding-bottom: 50px;">
          <div class="row no-gutters">
              <div class="col-md-4">
                  <img src="Images/Principle.jpg" class="card-img" alt="Card image" style="width:100%">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h4 class="card-title fontMontserrat">The Principal – Mrs M.H. Wanigasinghe</h4>
                      <p class="card-text paraFont">It is with great pleasure I send my wishes at this moment of launching the new website of the vidyalaya.<br><br>Established with the noble objective of providing Buddhist cultural education to the girls in the southern , it is explicit that Sujatha Vidyalaya, Matara has now reached the helm of recognition and reputation as one of the leading and much sought after girls’ national school in the island.<br><br>Initially, I must tribute the founder Dr. V. D. Gooneratne for his worthy and timely gesture of establishing the vidyalaya way back in 1928 to revive the Buddhist culture and education in the southern. I make this occasion an opportunity to bring into my memory with respect the yeoman service rendered by the past principals and the teachers since the inception of the vidyalaya to raise it to its present acclaimed state.<br></p>
                      <a href="#" class="btn btn-primary">See Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <div class="container">
    <div class="project-title pb-5">
      <h1 class="header01">Our Sports</h1>
    </div>
  </div>

  <!-- sport phpto gallery-->
  <div class="grid-gallery">
    <div class="grid-item">
      <a href="images/sports_01.jpg" data-lightbox="gridImage">
        <img src="images/sports_01.jpg">
      </a>
    </div>
    <div class="grid-item">
      <a href="images/sports_02.jpg" data-lightbox="gridImage">
        <img src="images/sports_02.jpg">
      </a>
    </div>
    <div class="grid-item">
      <a href="images/sports_03.jpg" data-lightbox="gridImage">
        <img src="images/sports_03.jpg">
      </a>
    </div>
    <div class="grid-item">
      <a href="images/sports_04.jpg" data-lightbox="gridImage">
        <img src="images/sports_04.jpg">
      </a>
    </div>
    <div class="grid-item">
      <a href="images/sports_05.jpg" data-lightbox="gridImage">
        <img src="images/sports_05.jpg">
      </a>
    </div>
    <div class="grid-item">
      <a href="images/sports_06.jpg" data-lightbox="gridImage">
        <img src="images/sports_06.jpg">
      </a>
    </div>
    <div class="grid-item">
      <a href="images/sports_07.jpg" data-lightbox="gridImage">
        <img src="images/sports_07.jpg">
      </a>
    </div>
  </div>

  <!-- footer -->
  <?php include 'Includes/Footer.php'; ?>

  
    <!-- link Bootstap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- link Jquery -->
    <script src="JQuery/jquery-3.7.1.js"></script>
    <!-- jQuery CDN Link -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- Lightbox JS -->
    <script src="lightbox2-dev/dist/js/lightbox.min.js"></script>
    <!-- Custom js -->
    <script src="js/main.js"></script>

    </body>
</html>
