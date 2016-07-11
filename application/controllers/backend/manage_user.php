<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Manage_User extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->model('model_purb');
				$data['user'] = $this->model_purb->get_data('purb_user');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/user/list_view',$data);
				$this->load->view('back/others/bottom');
			}
		}
		
		function form_add(){
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/user/form_add_view");
			$this->load->view('back/others/bottom');
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('first','first name','required');
			$this->form_validation->set_rules('nick','nick name','required');
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required|matches[confirm_password]');
			$this->form_validation->set_rules('email','email','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$data['user_first_name'] = $this->input->post('first');
				$data['user_last_name'] = $this->input->post('last');
				$data['user_nick'] = $this->input->post('nick');
				$data['user_username'] = $this->input->post('username');
				$data['user_password'] = $this->input->post('password');
				$data['user_email'] = $this->input->post('email');
				
				$cek = $this->db->query("select user_username, user_password from purb_user where user_username='".$data['user_username']."' and user_password='".$data['user_password']."'");
				if($cek->num_rows() == 0){
					$add_data = $this->model_purb->get_insert('purb_user',$data);
				
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/manage_user/add/");
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/manage_user/add/");
					}	
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your username or password is available.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_user/add/");
				}
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$user_read = $this->model_purb->get_data_where('user_id',$id,'purb_user');
			foreach($user_read->result() as $db){
				$data['id'] = $db->user_id;
				$data['first'] = $db->user_first_name;
				$data['last'] = $db->user_last_name;
				$data['nick'] = $db->user_nick;
				$data['username'] = $db->user_username;
				$data['password'] = $db->user_password;
				$data['email'] = $db->user_email;
			}
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/user/form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('first','first name','required');
			$this->form_validation->set_rules('nick','nick name','required');
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required|matches[confirm_password]');
			$this->form_validation->set_rules('email','email','required');
			if($this->form_validation->run() == false){
				$this->form_edit($this->uri->segment(4));
			}else{
				$id = $this->uri->segment(4);
				$data['user_first_name'] = $this->input->post('first');
				$data['user_last_name'] = $this->input->post('last');
				$data['user_nick'] = $this->input->post('nick');
				$data['user_username'] = $this->input->post('username');
				$data['user_password'] = $this->input->post('password');
				$data['user_email'] = $this->input->post('email');
				
				$edit_data = $this->model_purb->get_update('purb_user',$data,'user_id',$id);
				
				if(!$edit_data){
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your update is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_user/edit/".$id);
				}else{
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/manage_user/edit/".$id);
				}	
			}
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_user','user_id',$id);
			
			if(!$delete){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_user/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_user/");
			}
		}
	}
	
/*End of file manage_user.php*/
/*Location:.application/controllers/backend/manage_users.php*/
