<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Manage_Category_Page extends CI_Controller{
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
				$data['category'] = $this->model_purb->get_data('purb_category_product');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/product/category_list_view',$data);
				$this->load->view('back/others/bottom');
				
			}
		}
		
		function form_add(){
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/product/category_form_add_view");
			$this->load->view('back/others/bottom');
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','category name','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$data['category_id'] = $this->model_purb->getMaxKode('purb_category_product', 'category_id', 'CTR');
				$data['category_name'] = $this->input->post('name');
				$data['category_desc'] = $this->input->post('desc');
				$data['category_date_update'] = date("Y-m-d H:i:s");
				
				$data2['data_id'] = $this->model_purb->getMaxKode('purb_all_data', 'data_id', 'DTA');
				$data2['data_kode'] = $data['category_id'];
				$data2['data_title'] = $this->input->post('name');
				$data2['data_url'] = base_url().'index.php/home/page/category/'.$data['category_id'];
				
				$cek = $this->db->query("select category_name from purb_category_product where category_name='".$data['category_name']."'");
				if($cek->num_rows() == 0){
					$add_data = $this->model_purb->get_insert('purb_category_product',$data);
					$add_data2 = $this->model_purb->get_insert('purb_all_data',$data2);
				
					if(!$add_data and !$add_data2){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/manage_category_page/add/");
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/manage_category_page/add/");
					}	
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your category name is available.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_category_page/add/");
				}
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$category_read = $this->model_purb->get_data_where('category_id',$id,'purb_category_product');
			foreach($category_read->result() as $db){
				$data['id'] = $db->category_id;
				$data['name'] = $db->category_name;
				$data['desc'] = $db->category_desc;
			}
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/product/category_form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','category name','required');
			if($this->form_validation->run() == false){
				$this->form_edit($this->uri->segment(4));
			}else{
				$id = $this->uri->segment(4);
				$data['category_name'] = $this->input->post('name');
				$data['category_desc'] = $this->input->post('desc');
				$data['category_date_update'] = date("Y-m-d H:i:s");
				
				$edit_data = $this->model_purb->get_update('purb_category_product',$data,'category_id',$id);
				
				if(!$edit_data){
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your update is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_category_page/edit/".$id);
				}else{
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/manage_category_page/edit/".$id);
				}	
			}
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_category_product','category_id',$id);
			$delete2 = $this->model_purb->get_delete('purb_all_data','data_kode',$id);
			
			if(!$delete and !$delete2){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_category_page/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_category_page/");
			}
		}
		
		function search(){
			if($this->input->post('search') != ''){
				$sess['search_page_category'] = $this->input->post('search');
			}
