<?php
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

	class Home extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$header['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$q = $this->db->query("select setting_logo from purb_setting");
			foreach($q->result() as $db){
				$header['logo'] = $db->setting_logo;
			}
			//$this->load->view('front/others/header',$header);
			$slider['slide'] = $this->db->query("select * from purb_banner");
			//$this->load->view('front/home/slider',$slider);
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
			}
			
			$data['product'] = $this->db->query("select * from purb_product order by product_id LIMIT 10");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			$this->load->view('front/home/slider',$slider);
			$this->load->view('front/home/content',$data);
			$this->load->view('front/others/bottom');
		}
		
	}
	/*End of file home.php*/
	/*Location:.application/controllers/frontend/home.php*/