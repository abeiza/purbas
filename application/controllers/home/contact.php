<?php
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

	class Contact extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$this->load->library('googlemaps');
			
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['email'] = $db->contact_email;
				$data['phone1'] = $db->contact_phone1;
				$data['phone2'] = $db->contact_phone2;
				$data['fax'] = $db->contact_fax;
				$data['address'] = $db->contact_address;
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
				
				$long = $db->long_point;
				$lat = $db->lat_point;
				
				$config['center'] = '-6.257737483553622,106.77751957671717';
				$config['zoom'] = '13';
				$this->googlemaps->initialize($config);
				
				$marker = array();
				$marker['position'] = $lat.",".$long;
				$marker['icon'] = (base_url().'assets/location.png');
				$marker['animation'] = 'drop';
				$marker['infowindow_content'] = '<h4 style="color:#8dc43f">Gloria Origita Cosmetics</h4>';
  				$marker['title'] = 'venue_name';
				$this->googlemaps->add_marker($marker);
				$data['map'] = $this->googlemaps->create_map();
			}
			$header['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$q = $this->db->query("select setting_logo from purb_setting");
			foreach($q->result() as $db){
				$header['logo'] = $db->setting_logo;
			}
			
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
			}
			
			//$data['category'] = $this->db->query("select * from purb_category_post order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/contact/content');
			$this->load->view('front/others/bottom');
		}
		
	}
	/*End of file contact.php*/
	/*Location:.application/controllers/home/contact.php*/