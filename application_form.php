<?php

	include('session.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Application Form</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="main.css">
	<title>Welcome</title>
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
          		<li class="nav-item"><a href="#" class="white nav-link menu">Apply Scholarship</a></li>
          		<span class="line-br-white"></span>
	          <li class="nav-item"><a href="#" class="white nav-link menu">Review Scholarship - (Staffs only)</a></li>
    	      <span class="line-br-white-"></span>
        	</ul>
      	</div>
      	<ul class="nav navbar-nav navbar-right">
        	  <li><a href="logout.php" class="white nav-link" style="text-decoration: none;">
        	  	Logout
        	  </a></li>
      	</ul>
    	</div>
  	</nav>

  	<div class="application-container container">
  		<h1 class="text-center">Welcome!</h1>
  		<h3 class="text-center">Application Form comes here :)</h3>
  		<!-- Form style by Naveen  -->

		<!-- New Form from Naveen -->
		<div class="form-container">
			<form method="POST" action="application_submiter.php">
					
			<div class="row">
				<div class="col-lg-6  col-sm-6 col-md-6">
					 <div class="form-group">
						<div class="inputWithIcon">
								<input type="text" id="text_reg_no" class="form-control form-control-input"  >
								<i class="glyphicon glyphicon-education"></i>
								<span class="highlight"></span>
					 	   		<label class="form-label" for="text_reg_no">Reg NO</label>
					   		</div>
					   	</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 ">
					 <div class="form-group">
						<div class="inputWithIcon">
							<input type="text" id="text_stud_name" class="form-control form-control-input" >
							<i class="glyphicon glyphicon-user"></i>
							<span class="highlight"></span>
				 	   		<label class="form-label" for="text_stud_name">Student Name</label>
				   		</div>
				   	</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 ">
					 <div class="form-group">
						<div class="inputWithIcon">
							<input type="text" id="text_father_name" class="form-control form-control-input" >
							<i class="glyphicon glyphicon-user"></i>
							<span class="highlight"></span>
				 	   		<label class="form-label" for="text_father_name">Father Name</label>
				   		</div>
				   	</div>
				</div>
				<div class="col-lg-6 col-sm-6 col-md-6 ">
			 		<div class="form-group">
						<div class="inputWithIcon">
							<input type="text" id="text_caste" class="form-control form-control-input" >
							<i class="glyphicon glyphicon-flag"></i>
							<span class="highlight"></span>
		 	   				<label class="form-label" for="text_cast">Caste</label>
		   				</div>
		   			</div>
		   		</div>
		   	</div>			

			<div class="row">
				 <div class="col-lg-6 col-sm-6 col-md-6">
				 	<div class=" form-group form-group-lg">
				 		<div class="input-group input-group-lg">
				 			<select class="custom-select" id="sel_dept">
				 				<option selected>choose dept:</option>
				 				<option value="1">Computer Sciense Engineering</option>
				 				<option value="2">Civil</option>
				 				<option value="3">Mechanical</option>
				 				<option value="4">Polymer</option>
				 				<option value="5">Plastic</option>
				 				<option value="6">Electrical And Elecronical</option>
				 			</select>
				 		</div>
				 	</div>							
				</div>
				 <div class="col-lg-6 col-sm-6 col-md-6">
				 	<div class="form-group form-group-lg">
				 		<div class="input-group input-group-lg">
				 			<select class="custom-select" id="sel_class">
				 				<option selected>choose class:</option>
				 				<option value="1">BC</option>
				 				<option value="2">MBC</option>
				 				<option value="3">AC</option>
				 				<option value="4">DC/BC</option>
				 			</select>
				 		</div>
				 	</div>							
				</div>
			</div>

			<div class="form-group text-center form-group-lg">
				<div class="inputWithIcon">
					<textarea  class="form-control form-control-texta"  rows="5" id="texta_clg_address" type="text" ></textarea> 
					<i class="glyphicon glyphicon-pencil"></i>
					<span class="highlight"></span>
					<label class="form-label" for="texta_clg_address">College Address</label>		
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-12">
					<div class="form-group form-group-lg">
						<div class="inputWithIcon">	
							<input type="text" id="text_arear" class="form-control form-control-input" >
							<i class="glyphicon glyphicon-book"></i>
							<span class="highlight"></span>
							<label class="form-label" for="text_arear">No of Arear</label>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-sm-6">
					<div class="form-group form-group-lg">
						<div class="inputWithIcon">
							<input type="text" id="text_last_yr_course" class="form-control form-control-input" >
							<i class="glyphicon glyphicon-book"></i>
							<span class="highlight"></span>
							<label class="form-label" for="text_last_yr_course">LastYear Course</label>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group form-group-lg">
				<div class="inputWithIcon">
					<input type="text" name="text_curre_yr_course" class="form-control form-control-input" >
					<i class="glyphicon glyphicon-book"></i>
					<span class="highlight"></span>
					<label class="form-label" for="text_curre_yr_course">CurrentYear Course</label>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-3"></div>
					<div class="col-lg-6 col-xs-12">
						<label>Eligibility For scholarship:</label>
						<div class="form-check form-check">
							<input type="radio" name="form-check-input" id="elig_for_schol" name="eligi_for_schol">
							<label class="form-check-label" for="elig_for_schol">Yes</label>
						</div>
						<div class="form-check form-check">
							<input type="radio" name="form-check-input" id="elig_for_schol" name="eligi_for_schol">
							<label class="form-check-label" for="elig_for_schol">no</label>
						</div>
					</div>
					<div class="col-lg-3"></div>
			</div>  						
				<div class="row">
					<div class="col-lg-3"></div>
							<div class="col-lg-6 col-xs-12">
								<label>Are you Going To Aten The Next Exam:</label>
									<div class="form-check">
									<input type="radio" name="form-check-input" id="elig_for_schol" name="eligi_for_schol">
									<label class="form-check-label" for="elig_for_schol">Yes</label>
								</div>
								<div class="form-check form-check">
									<input type="radio" name="form-check-input" id="elig_for_schol" name="eligi_for_schol">
									<label class="form-check-label" for="elig_for_schol">no</label>
								</div>
						</div>
						<div class="col-lg-3"></div>
					</div>  
		
								<div class="row">
									<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
										<div class="form-group form-group-lg">
											<div class="inputWithIcon">
												<input type="text" id="hostel_chk_in_la_yr" name="date" onclick="(this.type='date')" class="form-control form-control-input" >
												<span class="glyphicon glyphicon-calendar"></span>
												<span class="highlight"></span>
												<label for="hostel_chk_in_la_yr" class="form-label">Check last Year</label>
											</div>
										</div>
									</div>
									<div class="col-lg-6  col-sm-6 col-md-12 col-xs-12">
										<div class="form-group form-group-lg">
											<div class="inputWithIcon">
												<input type="text" id="date_checkout" onclick="(this.type='date')" class="form-control form-control-input" >
												<span class="glyphicon glyphicon-calendar"></span>
												<span class="highlight"></span>
												<label for="date_checkout" class="form-label">Check Last Year</label>
											</div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<input type="text" id="date_current" onclick="(this.type='date')" class="form-control form-control-input" >
											<span class="glyphicon glyphicon-calendar"></span>
											<span class="highlight"></span>
											<label class="form-label" for="date_current">Check Current Year</label>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<input type="text" id="date_aprrox" class="form-control form-control-input" onclick="(this.type='date')" >
											<span class="glyphicon glyphicon-calendar"></span>
											<span class="highlight"></span>
											<label class="form-label" for="date_aprrox">Check Current Year</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<input type="text" name="text_cand_behav_impr" id="text_cand_behav_impr" class="form-control form-control-input" >
											<span class="glyphicon glyphicon-money"></span>
											<span class="highlight"></span>
											<label class="form-label" for="text_cand_behav_impr">PrevYear Amonunt</label>
										</div>
									</div>
								</div>

								<div class="col-lg-6 col-sm-6 col-md-12 col-xs-12">
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<input type="text" name="text_cand_prev_yr_atted" id="text_cand_prev_yr_atted" class="form-control form-control-input" >
											<span class="glyphicon glyphicon-money"></span>
											<span class="highlight"></span>
											<label class="form-label" for="text_cand_prev_yr_atted">PrevYear Atted</label>
										</div>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<textarea type="text" id="texta_current_address" class="form-control form-control-texta" rows="5" ></textarea>
											<span class="glyphicon glyphicon-envelope"></span>
											<span class="highlight"></span>
											<label class="form-label" for="texta_current_address">Current Address</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<textarea class="form-control form-control-texta" type="text" id="texta_permanent_address" rows="5" ></textarea>
											<span class="glyphicon glyphicon-envelope"></span>
											<span class="highlight"></span>
											<label class="form-label" for="texta_permanent_address">Permanent Address</label>
										</div>	
									</div>
								</div>
							</div>		
							<div class="row">
								<div class="col-lg-12">	
									<div class="form-group form-group-lg">
										<div class="inputWithIcon">
											<input type="text" name="text_prev_year_amt" class="form-control form-control-input" >
											<span class="glyphicon glyphicon-share-alt"></span>
											<span class="highlight"></span>
											<label class="form-label" for="text_prev_year_amt">Prev Year Amount</label>
										</div>
									</div>
								</div>
							</div>

							<div class="form-group-lg">
								<a href="upload_docs.php"><button type="button" class="btn btn-primary btn-lg">Upload Documents</button></a>
							</div>

							<div class="form-group">
								 <button type="submit" class="btn-submit water-drop">Submit</button>
							</div>
							
						</form>
					</div>


		<!-- End of form style Naveen  -->
  	</div>

    <footer>
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
    </footer>
    
  </div>
</body>
</html>