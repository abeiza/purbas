<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Dashboard extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/dashboard/right_bottom');
				$this->load->view('back/others/bottom');
			}
		}
	}

/*End of file dashboard.php*/
/*Location:.application/controllers/backend/dashboard.php*/
