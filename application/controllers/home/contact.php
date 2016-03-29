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
				$marker['infowindow_content'] = '<div style="width:100%;text-align:center"><img src="'.base_url().'assets/theme/img/purbasari.png'.'" style="width:100px;text-align:center;"/><h4 style="text-align:center;color:#eb028a">Gloria Origita Cosmetics</h4></div>';
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
		
		function message(){
			$hasil = $this->input->post('a') + $this->input->post('b');
			$this->load->model('model_purb');
			if($hasil == $this->input->post('jml')){
				$data['message_name'] = $this->input->post('name');
				$data['message_email'] = $this->input->post('email');
				$data['message_text'] = $this->input->post('text');
				$data['message_date_post'] = date("Y-m-d H:i:s");
				
				$add_data = $this->model_purb->get_insert("purb_message",$data);
				
				if(!$add_data){
					$this->session->set_flashdata("add_result",'<span style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, Your Message Not Complete</span></span>');
					Header("Location:".base_url()."index.php/home/contact/");
				}else{
					$this->session->set_flashdata("add_result",'<span style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Thank You for Your Message</span></span>');
					Header("Location:".base_url()."index.php/home/contact/");
				}
			}else{
				$this->session->set_flashdata("add_result",'<span style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, Are You Robots</span></span>');
					Header("Location:".base_url()."index.php/home/contact/");
			}
		}
		
	}
	/*End of file contact.php*/
	/*Location:.application/controllers/home/contact.php*/