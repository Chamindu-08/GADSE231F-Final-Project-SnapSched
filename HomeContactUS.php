<!DOCTYPE html>
<html lang="en">
<head>
  <title>ContactUS | INDASARA MAHA VIDYALAYA</title>
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

<?php include 'Includes/NavBar.php'; ?>

<div class="container bannerImg">
        <div class="row">
            <div class="col">
                <div class="center-content">
                    <div class="center-content-inner">
                        <h1 class="heading">Contact Us</h1>
                    </div>
                    <div class="row">
                        <h6 class="fontMontserrat">Get In Touch</h6>
                        <p>We are here to help you. If you have any questions or need any information, feel free to contact us.</p>
                    </div>
                    <!-- --responsive form-- -->
                    <div class="row">
                        <div class="col-md-6">
                            <form class="form" name="formMessage" method="post" action="#">
                                <table style="width:100%">
                                    <tr>
                                        <td>
                                            <h6 class="fontMontserrat">Send Us A Message</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="textUserName" placeholder="Your Name" required>
                                        </td>
                                        <td rowspan="4">
                                            <textarea id="multilineInput" name="multilineInput" placeholder="Your Message" rows="6" cols="25"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="textUserName" placeholder="Designation" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="textUserName" placeholder="Address" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="textUserName" placeholder="E-mail" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button class="btnStyle1">SEND</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <h6 class="fontMontserrat">Contact Information</h6>
                                <p>Feel free to contact us for any information.</p>
                                <img src="Images/contact.jpg" style="width: 100%;">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><img src="Images/phone.png" style="width: 20px;"> +94 11 234 5678</p>
                                    <p><img src="Images/email.png" style="width: 20px;">indasara@gmail.com </p>
                                    <p><img src="Images/location.png" style="width: 20px;"> No. 123, Colombo, Sri Lanka</p>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe width="100%" height="300" id="gmap_canvas"
                                        src="https://maps.google.com/maps?q=colombo&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'Includes/Footer.php'; ?>