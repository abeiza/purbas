<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	class Setting extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$query = $this->db->query("select * from purb_setting");
				foreach($query->result() as $db){
					$data['name'] = $db->setting_title;
					$data['tag'] = $db->setting_tag_line;
					$data['desc'] = $db->setting_desc;
					$data['logo'] = $db->setting_thumb_logo;
				}
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/setting/form_add_view',$data);
				$this->load->view('back/others/bottom');
			}
		}
		
		function update_act(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','company name','required');
			//$this->form_validation->set_rules('tagline','company tagline','required');
			//$this->form_validation->set_rules('ogo','','');
			//$this->form_validation->set_rules('visi','company vision','required');
			//$this->form_validation->set_rules('misi','company mission','required');
			//$this->form_validation->set_rules('moto','company moto','required');
			if($this->form_validation->run() == false){
				$this->index();
			}else{
				if(empty($_FILES['logo']['name'])){
					$data['setting_title'] = $this->input->post('name');
					$data['setting_tag_line'] = $this->input->post('tag');
					$data['setting_desc'] = $this->input->post('desc');
					$data['setting_date_update'] = date("Y-m-d H:s:i");
					
					$input = $this->model_purb->get_update('purb_setting',$data,'setting_id','1');
					if(!$input){
						$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/setting/");
					}else{
						$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/setting/");
					}	
				}else{
					$configu['upload_path'] = './uploads/logo/';
					$configu['upload_url'] = base_url().'uploads/logo/';
					$configu['allowed_types'] = 'gif|jpeg|jpg|png';
					$configu['max_size'] = '10000';
					$configu['max_width'] = '34600';//panjang img
					$configu['max_height'] = '500000';//tinggi img
					
					$this->load->library('upload',$configu);
					
					if (!$this->upload->do_upload('logo'))
					{
						$error = array('error' => $this->upload->display_errors());
						$this->load->view('form_upload', $error);
					}
					else
					{
						$upload_data = $this->upload->data();
					
						$config1['image_library'] = 'GD2';
						$config1['source_image'] = $upload_data['full_path'];
						$config1['new_image'] = 'uploads/logo/thumb/'.$upload_data['file_name'];
						//$config1['create_thumb'] = TRUE;
						$config1['maintain_ratio'] = TRUE;
						$config1['width'] = 236;//panjang thumb
						$config1['height'] = 345;//tinggi thumb

						$this->load->library('image_lib', $config1);

						if(!$this->image_lib->resize()){
							echo $this->image_lib->display_errors();
						}
						
					
						$data['setting_logo'] = $upload_data['file_name'];
						$data['setting_thumb_logo'] = $config1['new_image'];
						$data['setting_title'] = $this->input->post('name');
						$data['setting_tag_line'] = $this->input->post('tag');
						$data['setting_desc'] = $this->input->post('desc');
						$data['setting_date_update'] = date("Y-m-d H:s:i");
						
						$input = $this->model_purb->get_update('purb_setting',$data,'setting_id','1');
						if(!$input){
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
							Header("Location:".base_url()."index.php/backend/setting/");
						}else{
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
							Header("Location:".base_url()."index.php/backend/setting/");
						}	
					}
				}
			}
		}
		
	}
/*End of file setting.php*/
/*Location:.application/controllers/setting.php*/