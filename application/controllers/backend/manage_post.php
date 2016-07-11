<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	class Manage_Post extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->model('model_purb');
				$data['post'] = $this->db->query('select * from purb_post');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/post/list_view',$data);
				$this->load->view('back/others/bottom');
				
			}
		}
		
		function form_add(){
			$query['category'] = $this->db->query("select category_post_id, category_post_name from purb_category_post order by category_post_name");
			//$query['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/post/form_add_view",$query);
			$this->load->view('back/others/bottom');
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('title','post title','required');
			$this->form_validation->set_rules('short','short description','required');
			$this->form_validation->set_rules('desc','description','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('category','category post','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$data['post_id'] = $this->model_purb->getMaxKode('purb_post', 'post_id', 'PST');
				if(empty($_FILES['pict']['name'])){
					$data['post_title'] = $this->input->post('title');
					$data['post_short_desc'] = $this->input->post('short');
					$data['post_desc'] = $this->input->post('desc');
					$data['post_category'] = $this->input->post('category');
					$data['post_status'] = $this->input->post('status');
					
					
					$data['post_date_create'] = date("Y-m-d H:i:s");
					$data['author'] = $this->session->userdata('user_id');
					
					$data2['data_id'] = $this->model_purb->getMaxKode('purb_all_data', 'data_id', 'DTA');
					$data2['data_kode'] = $data['post_id'];
					$data2['data_title'] = $this->input->post('title');
					$data2['data_url'] = base_url().'index.php/home/post/single/'.$data['post_id'];
						
					$add_data = $this->model_purb->get_insert("purb_post",$data);
					$add_data2 = $this->model_purb->get_insert('purb_all_data',$data2);
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/manage_post/add/");
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/manage_post/add/");
					}
				}else{
					$configu['upload_path'] = './uploads/post/original/';
					$configu['upload_url'] = base_url().'uploads/post/original/';
					$configu['allowed_types'] = 'gif|jpeg|jpg|png';
					$configu['max_size'] = '1000';
					$configu['max_width'] = '1000';
					$configu['max_height'] = '1000';
					
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
						$config1['new_image'] = 'uploads/post/thumb/'.$upload_data['file_name'];
						$config1['maintain_ratio'] = TRUE;
						$config1['width'] = 225;
						$config1['height'] = 165;
