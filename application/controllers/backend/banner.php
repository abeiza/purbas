<?php if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

	class Banner extends CI_Controller{
		function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
			$this->load->model('model_purb');
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->model('model_purb');
				$data['banner'] = $this->db->query("select * from purb_banner");
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/banner/list_view',$data);
				$this->load->view('back/others/bottom');
			}
		}
		
		function form_add(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/banner/form_add_view');
				$this->load->view('back/others/bottom');
			}
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('title','title','required');
			$this->form_validation->set_rules('desc','description','required');
			
			if(empty($_FILES['pict']['name'])){
				$this->form_validation->set_rules('pict', 'image banner', 'required');
			}
			
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$configu['upload_path'] = './uploads/banner/original/';
				$configu['upload_url'] = base_url().'uploads/banner/original/';
				$configu['allowed_types'] = 'gif|jpeg|jpg|png';
				$configu['max_size'] = '10000';
				$configu['max_width'] = '10000';
				$configu['max_height'] = '10000';
				
				$this->load->library('upload',$configu);
				
				if (!$this->upload->do_upload('pict'))
				{
					$error = array('error' => $this->upload->display_errors());
					$this->load->view('form_upload', $error);
				}
				else
				{
					$upload_data = $this->upload->data();
				
					$config1['image_library'] = 'GD2';
					$config1['source_image'] = $upload_data['full_path'];
					$config1['new_image'] = 'uploads/banner/thumb/'.$upload_data['file_name'];
					//$config1['create_thumb'] = TRUE;
					$config1['maintain_ratio'] = TRUE;
					$config1['width'] = 225;
					$config1['height'] = 165;

					$this->load->library('image_lib', $config1);

					if(!$this->image_lib->resize()){
						echo $this->image_lib->display_errors();
					}
					
					
					$data['banner_id'] = $this->model_purb->getMaxKode('purb_banner', 'banner_id', 'BNR');
					$data['banner_name'] = $this->input->post('title');
					$data['banner_desc'] = $this->input->post('desc');
					$data['banner_url'] = $this->input->post('url');
					$data['banner_post_disp'] = $upload_data['file_name'];
					$data['author'] = $this->session->userdata('user_id');
					
					
					$data['banner_date_create'] = date("Y-m-d H:i:s");
					
			
					$add_data = $this->model_purb->get_insert('purb_banner',$data);
			
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/banner/add/");
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/banner/add/");
					}
				}
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$banner_read = $this->model_purb->get_data_where('banner_id',$id,'purb_banner');
			foreach($banner_read->result() as $db){
				$data['id'] = $db->banner_id;
				$data['title'] = $db->banner_name;
				$data['desc'] = $db->banner_desc;
				$data['url'] = $db->banner_url;
				$data['pict'] = $db->banner_post_disp;
			}
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/banner/form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('title','title','required');
			$this->form_validation->set_rules('desc','description','required');
			
			if($this->form_validation->run() == false){
				$this->form_edit($this->uri->segment(4));
			}else{
				if(empty($_FILES['pict']['name'])){
					
						$id = $this->uri->segment(4);
						$data['banner_name'] = $this->input->post('title');
						$data['banner_desc'] = $this->input->post('desc');
						$url = $this->input->post('url');
						if(!empty($url)){
							$data['banner_url'] = $this->input->post('url');
						}
						$data['author'] = $this->session->userdata('user_id');
						
						
						$data['banner_date_update'] = date("Y-m-d H:i:s");
						
				
						$add_data = $this->model_purb->get_update('purb_banner',$data,'banner_id',$id);
					
						if(!$add_data){
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
							Header("Location:".base_url()."index.php/backend/banner/form_edit/".$id);
						}else{
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
							Header("Location:".base_url()."index.php/backend/banner/form_edit/".$id);
						}	
				}else{
					$configu['upload_path'] = './uploads/banner/original/';
					$configu['upload_url'] = base_url().'uploads/banner/original/';
					$configu['allowed_types'] = 'gif|jpeg|jpg|png';
					$configu['max_size'] = '10000';
					$configu['max_width'] = '10000';
					$configu['max_height'] = '10000';
					
					$this->load->library('upload',$configu);
					
					if (!$this->upload->do_upload('pict'))
					{
						$error = array('error' => $this->upload->display_errors());
						$this->load->view('form_upload', $error);
					}
					else
					{
						$upload_data = $this->upload->data();
					
						$config1['image_library'] = 'GD2';
						$config1['source_image'] = $upload_data['full_path'];
						$config1['new_image'] = 'uploads/banner/thumb/'.$upload_data['file_name'];
						//$config1['create_thumb'] = TRUE;
						$config1['maintain_ratio'] = TRUE;
						$config1['width'] = 225;
						$config1['height'] = 165;

						$this->load->library('image_lib', $config1);

						if(!$this->image_lib->resize()){
							echo $this->image_lib->display_errors();
						}
						
						$id = $this->input->post('id');
						$data['banner_name'] = $this->input->post('title');
						$data['banner_desc'] = $this->input->post('desc');
						$url = $this->input->post('url');
						if(!empty($url)){
							$data['banner_url'] = $this->input->post('url');
						}
						$data['author'] = $this->session->userdata('user_id');
						$data['banner_post_disp'] = $upload_data['file_name'];
						
						$data['banner_date_update'] = date("Y-m-d H:i:s");
						
				
						$add_data = $this->model_purb->get_update('purb_banner',$data,'banner_id',$id);
					
						if(!$add_data){
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
							Header("Location:".base_url()."index.php/backend/banner/form_edit/".$id);
						}else{
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
							Header("Location:".base_url()."index.php/backend/banner/form_edit/".$id);
						}							
					}
				}
			}
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_banner','banner_id',$id);
			
			if(!$delete){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/banner/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/banner/");
			}
		}
		
	}

/*End of file banner.php*/
/*Location:.application/controllers/backend/banner.php*/