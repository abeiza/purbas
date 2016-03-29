<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	class Manage_Page extends CI_Controller{
		
		function __construct(){
			parent::__construct();
			date_default_timezone_set('Asia/Jakarta');
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login_view');
			}else{
				$this->load->model('model_purb');
				
				$data['pages'] = $this->model_purb->get_data('purb_page');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/page/list_view',$data);
				$this->load->view('back/others/bottom');
				
			}
		}
		
		function form_add(){
			//$query['category'] = $this->db->query("select page_category_id, page_category_name from purb_page_category order by page_category_name");
			//$query['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/page/form_add_view");
			$this->load->view('back/others/bottom');
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('title','post title','required');
			$this->form_validation->set_rules('desc','description','required');
			$this->form_validation->set_rules('status','status','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$data['page_id'] = $this->model_purb->getMaxKode('purb_page', 'page_id', 'PGE');
				$data['page_title'] = $this->input->post('title');
				$data['page_desc'] = $this->input->post('desc');
				$data['page_status'] = $this->input->post('status');
				
				
				$data['page_date_create'] = date("Y-m-d H:i:s");
				$data['author'] = $this->session->userdata('user_id');
				
				$data2['data_id'] = $this->model_purb->getMaxKode('purb_all_data', 'data_id', 'DTA');
				$data2['data_kode'] = $data['page_id'];
				$data2['data_title'] = $this->input->post('title');
				$data2['data_url'] = base_url().'index.php/home/page/single/'.$data['page_id'];
				
				
				$add_data = $this->model_purb->get_insert('purb_page',$data);
				$add_data2 = $this->model_purb->get_insert('purb_all_data',$data2);
				
				if(!$add_data){
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_page/add/");
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/manage_page/add/");
				}
							
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$page_read = $this->model_purb->get_data_where('page_id',$id,'purb_page');
			foreach($page_read->result() as $db){
				$data['id'] = $db->page_id;
				$data['title'] = $db->page_title;
				$data['desc'] = $db->page_desc;
				$data['status'] = $db->page_status;
				
			}
			//$data['category'] = $this->db->query("select page_category_id, page_category_name from purb_page_category order by page_category_name");
			//$data['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/page/form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('title','page title','required');
			$this->form_validation->set_rules('desc','description','required');
			$this->form_validation->set_rules('status','status','required');
			if($this->form_validation->run() == false){
				$this->form_edit($this->uri->segment(4));
			}else{
				
				$id = $this->uri->segment(4);
				$data['page_title'] = $this->input->post('title');
				$data['page_desc'] = $this->input->post('desc');
				$data['page_status'] = $this->input->post('status');
				
				
				$data['page_date_update'] = date("Y-m-d H:i:s");
				$data['author'] = $this->session->userdata('user_id');
				
				
				$edit_data = $this->model_purb->get_update('purb_page',$data,'page_id',$id);
		
				if(!$edit_data){
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your update is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_page/edit/".$id);
				}else{
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/manage_page/edit/".$id);
				}
				
			}
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_page','page_id',$id);
			$delete2 = $this->model_purb->get_delete('purb_all_data','data_kode',$id);
			
			if(!$delete and !$delete2){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_page/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_page/");
			}
		}
		
		
	}
/*End of file manage_page.php*/
/*Location:.application/controllers/backend/manage_page.php*/