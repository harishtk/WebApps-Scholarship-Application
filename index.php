<?php
  include('session.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="dem1.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Welcome</title>
    <script type="text/javascript">

      function goTo(url) {
        window.location = url;
      }
    
    $(document).ready(function() {
      var username = <?= $_SESSION['login_stud']; ?>;
      
      var req = null;

      req = $.ajax({
        url: 'database/fetch_stud_info.php',
        method: 'post',
        data: {
          'username': username
        },
        dataType: 'json'
      });

      function updateStudInfo(response) {
        
        if ( response['err'] ) {
          alert(response['err']);
        } else {
          $("#reg_no").html(response['reg_no']);
          $("#name").html(response['name']);
          $("#dept").html(response['dept']);
          $("#dob").html(response['dob']);
          $("#course_dur").html(response['course_dur']);
          $("#blood_grp").html(response['blood_grp']);
        }
        

      }

      req.done(function(response, textStatus, jqXHr) {
        
        updateStudInfo(response);
      });

      req.error(function(response, error) {
        alert("Error: " + error);
      });
    });
    </script>
  </head>
  <body style="font-family: verdana;" class="parallax">
    <div class="jumbotron header text-center">
      <h1>This is Header.</h1>
      <p>This is Sub-Header.</p>
    </div>
    <nav class="navbar bg-blue navbar-dark sticky-top" role="navigation">
      <div class="container-fluid">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-header">
          <p class="navbar-brand white">Menu</p>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav white">
            <span class="line-br-white"></span>
            <li class="nav-item"><a href="#" class="white nav-link">Apply Scholarship</a></li>
            <span class="line-br-white"></span>
            <li class="nav-item"><a href="#" class="white nav-link">Review Scholarship - (Staffs only)</a></li>
            <span class="line-br-white-"></span>
          </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="logout.php" class="white nav-link" style="text-decoration: none;">
            <span class="glyphicon glyphicon-log-out white">Logout</span>
          </a></li>
        </ul>
      </div>
    </nav>
    <!-- <div class="application-container container">
      <h1 class="text-center">Welcome! <?= $login_session ?></h1>
      <h3 class="text-center">Student Info Form comes here :) </h3>
    </div> -->
    <!-- <div class="container max-width">
      <div class="row justify-content-center">
        <div class="col-sm-auto text-center menu-container bottom-drop order-second">
          <h2>Student Menu</h2>
          <div class="line-br-blue"></div>
          <button type="button" class="btn-norm water-drop" aria-describedby="#apply-desc">Apply</button>
          <small id="apply-desc">Apply for Scholarship</small>
          <div class="line-br-blue"></div>
          <button type="button" class="btn-norm water-drop" aria-describedby="#track-application">Track</button>
          <small id="track-application">Application Status</small>
          <div class="line-br-blue"></div>
        </div>
        <div class="col-sm-8 text-center info-container">
          <h2>Student Info comes here :)</h2>
          <h4><a href="#">Not your info? click here to report.</a></h4>
          <span class="glyphicon glyphicon-envelope"></span>
          <span class="glyphicon glyphicon-comment"></span>
        </div>
      </div>
    </div>-->
    <div class="container stud-profile">
      <div class="row">
        <div class="col-md-4">
          <div class="profile-img">
            <img src="user.png"  alt=""/>
          </div>
        </div>
        <div class="col-md-6">
          <div class="profile-head text-center">
            
            <h5 id="name">
            NAVINKUMAR.S
            </h5>
            <h6 class="text-muted">
            Web Developer and Designer
            </h6>
            
            
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Info</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-work text-center" >
            <!--  <p><h5>
              NAVINKUMAR.s
              </h5>
              <h6 class="text-muted">
              Web Developer and Designer
            </h6></p>
          -->              </div>
        </div>
        <div class="col-md-5 ">
          <div class="tab-content profile-tab" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>Name:</label>
                </div>
                <div class="col-md-6">
                  <p id="name">NAVINKUMAR.S</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Branch:</label>
                </div>
                <div class="col-md-6">
                  <p id="dept">cse/reg</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>year:</label>
                </div>
                <div class="col-md-6">
                  <p id="course_dur">2016-2019</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Email:</label>
                </div>
                <div class="col-md-6">
                  <p id="email">******@gmail.com</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label></label>
                </div>
                <div class="col-md-6">
                  <p></p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-6">
                  <label>DOB:</label>
                </div>
                <div class="col-md-6">
                  <p id="dob">00/00/0000</p>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <label>Blood Group: </label>
                </div>
                <div class="col-md-6">
                  <p id="blood_grp">2</p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Reg No:</label>
                </div>
                <div class="col-md-6">
                  <p id="reg_no">ENGLISH</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center text-center">
        <div class="col-sm-6">
          <button class="btn-big water-drop" aria-describedby="#apply-desc" onclick="goTo('application_form.php')">Apply</button>
          <small id="apply-desc">Apply for Scholarship</small>
        </div>
        <div class="col-sm-6">
          <button class="btn-big water-drop" aria-describedby="#track-application">Track</button>
          <small id="track-application">Application Status</small>
        </div>
      </div>
    </div>
    <div class="footer white">
      <div class="row">
        <div class="col-sm white">
          <p><a href="#">Home</a></p>
          <p><a href="#">About</a></p>
          <p><a href="#">Contact Us</a></p>
        </div>
        <div class="col-sm white">
          <p><a href="#">Terms and Conditions</a></p>
          <p><a href="#">Privacy Policy</a></p>
        </div>
      </div>
      <p class="text-center">Copyright &copy <script>document.write(new Date().getFullYear())</script> - EpicSoftwares.</p>
    </div>
  </body>
</html>