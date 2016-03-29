<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Contact extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login_view');
			}else{
				$contact = $this->db->query('select * from purb_contact');
				foreach($contact->result() as $db){
					$data['email'] = $db->contact_email;
					$data['phone1'] = $db->contact_phone1;
					$data['phone2'] = $db->contact_phone2;
					$data['fax'] = $db->contact_fax;
					$data['address'] = $db->contact_address;
					$data['facebook'] = $db->contact_facebook;
					$data['twitter'] = $db->contact_twitter;
					$data['youtube'] = $db->contact_youtube;
					$data['linkedin'] = $db->contact_linkedin;
					$data['long'] = $db->long_point;
					$data['lat'] = $db->lat_point;
				}
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/contact/form_add_view',$data);
				$this->load->view('back/others/bottom');
			}
		}
		
		function update_act(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('email','email','required');
			$this->form_validation->set_rules('phone1','phone 1','required');
			if($this->form_validation->run()==false){
				$this->index();
			}else{
				$data['contact_email'] = $this->input->post('email');
				$data['contact_phone1'] = $this->input->post('phone1');
				$data['contact_phone2'] = $this->input->post('phone2');
				$data['contact_fax'] = $this->input->post('fax');
				$data['contact_address'] = $this->input->post('address');
				$data['contact_facebook'] = $this->input->post('facebook');
				$data['contact_twitter'] = $this->input->post('twitter');
				$data['contact_youtube'] = $this->input->post('youtube');
				$data['contact_linkedin'] = $this->input->post('linkedin');
				$data['long_point'] = $this->input->post('long');
				$data['lat_point'] = $this->input->post('lat');
				$data['contact_date_update'] = date("Y-m-d H:i:s");
				
				$add_data = $this->model_purb->get_update('purb_contact',$data,'contact_id','1');
				
				if(!$add_data){
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/contact/");
				}else{
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/contact/");
				}	
			}
		}
	}

/*End of file contact.php*/
/*Location:.application/controllers/backend/contact.php*/