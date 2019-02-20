<?php
	include('session.php');
	$application_id = $_GET['app_id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script src="js/jquery.min.js"></script>
		<script src="DT.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="main.css">
		<title>Application <?= $application_id ?></title>
		<script type="text/javascript">

			var acceptApplication_js, rejectApplication_js = null;
		
		$(document).ready(function() {

			$(".col-md-5:odd").addClass("text-left");
			$(".col-md-5:even").addClass("text-right");

			function updateData(response) {

				$("#stud_name").html(response['stud_name']);
				$("#father_name").html(response['father_name']);
				$("#dept").html(response['dept']);
				$("#clg_address").html(response['clg_address']);
				$("#la_yr_course").html(response['la_yr_course']);
				$("#cu_yr_course").html(response['cu_yr_course']);
				$("#no_of_arrear").html(response['no_of_arrear']);
				$("#elig-for-scholarship").html(
					response['elig_for_scholar'] == 1 ? "Yes" : "No"
				);
				$("#elig-for-next-exam").html(
					response['elig_for_next_exam'] == 1 ? "Yes" : "No"
				);
				$("#caste").html(response['cast']);
				$("#class").html(response['class']);
				$("#temp-addr").html(response['temp_address']);
				$("#perm-addr").html(response['perm_address']);
				$("#prev-year-scholar-amt").html(response['prev_yr_scholar_amt']);
				$("#hostel-chk-in-la-year").html(response['hostel_chk_in_la_yr']);
				$("#hostel-chk-out-la-year").html(response['hostel_chk_out_la_yr']);
				$("#hostel-chk-in-cu-year").html(response['hostel_chk_in_cu_yr']);
				$("#hostel-chk-out-cu-year").html(response['hostel_chk_out_cu_yr']);
				$("#cand-behav-impr").html(response['cand_behav_impr']);
				$("#cand-prev-yr-attend").html(response['cand_prev_yr_attend'] == 0 ? "Not Updated" : response['cand_prev_yr_attend']);
			}

			var req = $.ajax({
			url: "database/fetch_application_data.php",
			type: "POST",
			data: {
			"application_id": "<?= $application_id ?>"
			},
			dataType: "json"
			});

			req.done(function(response, textStatus, jqXHr) {
			
				updateData(response);
				// alert(response[row]['application_id']);
			});

			req.error(function(error, msg) {
			alert(error + ": " + msg);
			});

			function acceptApplication() {
				// alert("Application is being processed");
				var val = $('form').serialize();

				req =  $.ajax({
					url: "database/",
					type: "POST",
				});
			}

			$("#reject-modal").on('show.bs.modal', function (event) {
				var app_id = "<?= $application_id ?>";

				var modal = $(this);
				modal.find('.modal-title').text("Reject Application: " + app_id);
				modal.find('.modal-body input').val(app_id);

				modal.find('.modal-footer .btn-primary').on('click', function (evt) {
					rejectApplication(app_id);
				});
			});

			function rejectApplication(application_id) {
				alert("Application has been Rejected");
				window.location = "staff_index_lvl0.php";
			}

			acceptApplication_js = acceptApplication;
			rejectApplication_js = rejectApplication;
		});
		</script>
	</head>
	<body class="parallax">
		<div class="jumbotron header text-center">
			<h1 class="display-4">This is Header.</h1>
			<p>This is Sub-Header.</p>
		</div>
		<nav class="navbar bg-blue navbar-dark white sticky-top" role="navigation">
			<div class="container-fluid">
				<button type="button" class="navbar-toggler white" data-toggle="collapse"
				data-target="#myNavbar">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-header">
					<a class="navbar-brand white" href="#">Menu</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav white">
						<span class="line-br-white"></span>
						<li class="nav-item"><a href="#" class="white nav-link">Apply Scholarship</a></li>
						<span class="line-br-white"></span>
						<li class="nav-item"><a href="#" class="white nav-link">Review Scholarship - (Staffs only)</a></li>
						<span class="line-br-white"></span>
					</ul>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php" class="white nav-link" style="text-decoration: none;">logout</a></li>
				</ul>
			</div>
		</nav>
		<div class="container water-drop">
			<div class="display-4 text-center">Application <?= $application_id ?></div>
		</div>
		<div class="application-container container">
			<div class="row">
				<div class="col-md-5">
					Student Name:
				</div>
				<div class="col-md-5">
					<p id="stud_name"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Father Name:
				</div>
				<div class="col-md-5">
					<p id="father_name"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					College Address:
				</div>
				<div class="col-md-5">
					<p id="clg_address"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Last Year Course:
				</div>
				<div class="col-md-5">
					<p id="la_yr_course"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Current Year Course:
				</div>
				<div class="col-md-5">
					<p id="cu_yr_course"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Number of Arrear:
				</div>
				<div class="col-md-5">
					<p id="no_of_arrear"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Eligible for Applying Scholarship:
				</div>
				<div class="col-md-5">
					<p id="elig-for-scholarship"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Eligible for Next Exam:
				</div>
				<div class="col-md-5">
					<p id="elig-for-next-exam"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Department:
				</div>
				<div class="col-md-5">
					<p id="dept"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Caste:
				</div>
				<div class="col-md-5">
					<p id="caste"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Class:
				</div>
				<div class="col-md-5">
					<p id="class"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Temporary Address:
				</div>
				<div class="col-md-5">
					<p id="temp-addr"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Permanent Address:
				</div>
				<div class="col-md-5">
					<p id="perm-addr"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Previous Year Scholarship Amount:
				</div>
				<div class="col-md-5">
					<p id="prev-year-scholar-amt"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Hostel Check In Last Year:
				</div>
				<div class="col-md-5">
					<p id="hostel-chk-in-la-year"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Hostel Check Out Last Year:
				</div>
				<div class="col-md-5">
					<p id="hostel-chk-out-la-year"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Hostel Check In Current Year:
				</div>
				<div class="col-md-5">
					<p id="hostel-chk-in-cu-year"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5">
					Hostel Check Out Current Year (Approx):
				</div>
				<div class="col-md-5">
					<p id="hostel-chk-out-cu-year"></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 form-group">
					<p>Candidate's Behaviour Impression:</p>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" name="cand-behav-impr" class="form-control form-control-main" required />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 form-group">
					<p>Candidate's Previous Year Attendance:</p>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						<input type="text" name="cand-prev-yr-attend" class="form-control form-control-main" required />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<button type="button" onclick="updateConductCert()" class="btn btn-primary">Update Details</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 form-group">
					<button class="btn-norm water-drop" onclick="acceptApplication_js()" id="btn-accept" disabled>Accept</button>
					<!-- btn btn-lg btn-outline-success -->
				</div>
				<div class="col-md-5 form-group">
					<button type="button" class="btn-norm water-drop" data-toggle="modal" data-target="#reject-modal">Reject</button>
					<!-- btn btn-lg btn-outline-danger -->
				</div>
			</div>
		</div>
		<div class="modal fade" id="reject-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					 <div class="modal-header">
					 	<h5 class="modal-title" id="exampleModalLabel">New Message</h5>
					 	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					 </div>
					 <div class="modal-body">
					 	<form id="form-reject-modal">
					 		<div class="form-group">
					 			<label for="appilcation-id" class="col-form-label">Application Id:</label>
					 			<input type="text" class="form-control" id="appilcation-id" name="appilcation-id" readonly>
					 		</div>
					 		<div class="form-group">
					 			<label for="reject-reason-msg" class="col-form-label">Rejection Message: <small class="text-muted"> *Optional but Recommended</small></label>
					 			<textarea class="form-control" id="reject-reason-msg" name="reject-reason-msg" placeholder="Eg. _____ document is not valid"></textarea>
					 		</div>
					 	</form>
					 </div>
					 <div class="modal-footer">
					 	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					 	<button type="button" class="btn btn-primary" data-dismiss="modal">Reject Application</button>
					 </div>
				</div>
			</div>	
		</div>
		<div class="footer white">
			<div class="row">
				<div class="col-sm white">
					<p><a href="index.php" data-toggle="tooltip" data-placement="top" title="Go to Home!">Home</a></p>
					<p><a href="about.php">About</a></p>
					<p><a href="contact.php">Contact Us</a></p>
				</div>
				<div class="col-sm white">
					<p><a href="#">Terms and Conditions</a></p>
					<p><a href="#">Privacy Policy</a></p>
				</div>
				<div class="clock">
					<div id="Date"></div>
					<ul>
						<li id="hours"></li>
						<li id="point">:</li>
						<li id="min"></li>
						<li id="point">:</li>
						<li id="sec"></li>
					</ul>
				</div>
			</div>
			<p class="text-center">Copyright &copy <script>document.write(new Date().getFullYear())</script> - EpicSoftwares.<br>An Unauthorized and Unofficial Software Development team.</p>
			<p class="text-center">- A Beloved work of <span class="team-name">BHAANN.</span></p>
		</div>
	</body>
	<script type="text/javascript">
		function updateConductCert() {
			alert("Data Updated!");
			document.getElementById('btn-accept').disabled = false;
		}
	</script>
</html>