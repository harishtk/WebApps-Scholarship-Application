<?php

	include('constants.php');
	
	define('DB_SERVER', 'localhost:3306');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'hellosql');
	define('DB_NAME', 'scholarship');
	
	// $db_con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	// $db_con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	// if ( $db_con->connect_errno )
	// 	echo err."Connection Failed: ".$db_con->connect_error."<br>";

	/**
	 * Database helper class to access DB for scholarship application.
	 */
	class Database {
	    
	    private $db_con;

	    //Holds error msg
	    private $err = "";

	    //Holds no of errors 
	    public $errno = 0;

	    /**
	     * Creates and holds connection object.
	     */
	    public function __construct() {
	        $this->db_con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

	        if ( $this->db_con->connect_error ) {
	        	$this->err = err.$this->db_con->connect_error;
	        	$this->errno++;
	        }

	    }
	    
	    /**
		* returns the db_con object
		* 
		* @return mysqli $db_con
		*/
	    public function get_connection() {
	    	return $this->db_con;
	    }

		/**
		 * @return mysqli_result $result - Which contains the result
		 */
	    public function get_error_msg() {
	    	return $this->err;
	    }

	    public function get_users() {
	    	$result = "";

	    	if ( $stmt = $this->db_con->prepare("SELECT username FROM stud_auth") ) {

	    		$stmt->execute();

	    		$result = $stmt->get_result();

	    		// $stmt->fetch();

	    		$stmt->free_result();

	    		$stmt->close();
	    	}

	    	if ( !$result ) {
	    		$this->errno++;
	    		$this->err = err.$this->db_con->error;
	    		return false;
	    	} else {
	    		return $result;
	    	}
	    }
	    
	    // functions to access 'stud_auth' table
	    
	     /**
		* Checks if it is a valid student for given
		* @param string $username
		* @param string $passwd
		* 
		* @return bool $exists
		*/  
	    public function stud_exists($username, $passwd) {
			$exists = false;
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM stud_auth WHERE username=? AND passwd=?") ) {
				
				$stmt->bind_param("ss", $username, $passwd);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 0 )
					$exists = false;
				else
					$exists = true;
				
				$stmt->free_result();
				
				$stmt->close();
			} else {
				$this->errno++;
				$this->err = err.$this->db_con->error;
			}
			
			return $exists;	
		}
		
		// functions to access 'staff_auth' table
		
		/**
		* Checks if staff exists for given 
		* @param string $username
		* @param string $passwd
		* 
		* @return assoc_array $data[ bool 'exists', int 'level']
		*/
		public function staff_exists($username, $passwd) {
			$data = array();
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM staff_auth WHERE username=? AND passwd=?") ) {
				
				$stmt->bind_param("ss", $username, $passwd);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 0 ) {
					$data['exists'] = false;
				} else {
					$row = $res->fetch_assoc();
					$data['level'] = $row['level'];
					$data['exists'] = true;
				}
					
				
				$stmt->free_result();
				
				$stmt->close();
			} else {
				$this->errno++;
				$this->err = err.$this->db_con->error;
			}
			
			return $data;
		}

		// functions to access 'stud_info' table
		
		/**
		* Returns the student data of given 
		* @param string $username
		* 
		* @return json $data{
			* 'reg_no': string,
			* 'name': string,
			* 'dob': string,
			* 'dept': string,
			* 'course_dur': string,
			* 'blood_grp': string
		}
		*/
		public function get_stud_info($username) {
			
			$data = array();
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM stud_info WHERE reg_no=?") ) {
				
				$stmt->bind_param("s", $username);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
				} else {
					$data['err'] = "Not found";
				}
				
				$stmt->free_result();
				
				$stmt->close();
			} else {
				
				$this->errno++;
				$this->err = $this->db_con->error;
			}
			
			return json_encode($data);
		}
		
		public function get_pending_applications_for_level($level) {
			
			$data = null;
			
			if ( $level == 0 ) {
				$query = "SELECT a.reg_no, a.application_id, a.submitted_on FROM application_avail AS a NATURAL JOIN validation AS v WHERE a.application_id=v.application_id AND lvl_0 = 0";
			} else if($level == 1){
			  	$query = "SELECT a.reg_no, a.application_id, a.submitted_on FROM application_avail AS a NATURAL JOIN validation AS v WHERE a.application_id=v.application_id AND lvl_1 = 0";
			} else if($level == 2){
			  	$query = "SELECT a.reg_no, a.application_id, a.submitted_on FROM application_avail AS a NATURAL JOIN validation AS v WHERE a.application_id=v.application_id AND lvl_2 = 0 AND lvl_0 = 1 AND lvl_1 = 1";
			  }		  
			
			if ( $stmt = $this->db_con->prepare($query) ){
				
				// $stmt->bind_param("i", $level);
				
				$stmt->execute();
				
				$res = $stmt->get_result();
				
				if ( $stmt->num_rows <= 0 ) {
					$this->errno++;
					$this->err = "No Data Found :(";
					
//					$data['err'] = "No Data Found :(";
				}
					
				while ( $row = $res->fetch_assoc() ) {
					$data[$row['reg_no']] = $row;
				}
				
				$stmt->free_result();
				
				$stmt->close();			
				
			}
			
			return json_encode($data);
			
		}
		
		public function get_application_data_for_id($application_id) {
			
			$data  = array();
			
			if( $stmt = $this->db_con->prepare("SELECT * FROM application WHERE application_id=?") ) {
				
				$stmt->bind_param("s", $application_id);
				
				$stmt->execute();
				
				if ( $this->db_con->errno ) {
					$this->errno++;
					$this->err = $this->db_con->error;
				}
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows == 1 ) {
					$data = $res->fetch_assoc();
				} else {
					$data['err'] = "Not Found!";
				}
				
				$stmt->free_result();
				
				$stmt->close();
			}
			
			return json_encode($data);
		}
		
		/**
		* Check whether the application is rejected for given
		* @param string $application_id
		* 
		* @return json $data {
			* 'is_rejected': bool 	
		}
		*/
		function is_application_rejected($application_id) {
			
			$data['is_rejected'] = true;
			
			if ( $stmt = $this->db_con->prepare("SELECT * FROM validation WHERE application_id = ? AND lvl_0 = 2 OR lvl_1 = 2 OR lvl_2 = 2") ) {
				
				$stmt->bind_param("s", $application_id);
				
				$stmt->execute();
				
				if ( $this->db_con->errno ) {
					$this->errno++;
					$this->err = $this->db_con->error;
				}
				
				$res = $stmt->get_result();
				
				if ( $res->num_rows <= 0 )
					$data['is_rejected'] = false;
					
				$stmt->free_result();
				
				$stmt->close();
				
			}
			
			return json_encode($data);
		}
		
		
	    /**
	     * Destroys the connection object as soon as there is no reference.
	     */
	    public function __destruct() {
	    	$this->db_con->close();
	    }
	}
?>