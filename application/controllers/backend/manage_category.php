<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	
	class Manage_Category extends CI_Controller{
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
				$data['category'] = $this->model_purb->get_data('purb_category_post');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/post/category_list_view',$data);
				$this->load->view('back/others/bottom');
				
			}
		}
		
		function form_add(){
			
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/post/category_form_add_view");
			$this->load->view('back/others/bottom');
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','category name','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$data['category_post_id'] = $this->model_purb->getMaxKode('purb_category_post', 'category_post_id', 'CTP');
				$data['category_post_name'] = $this->input->post('name');
				$data['category_post_desc'] = $this->input->post('desc');
				$data['category_post_update'] = date("Y-m-d H:i:s");
				
				$data2['data_id'] = $this->model_purb->getMaxKode('purb_all_data', 'data_id', 'DTA');
				$data2['data_kode'] = $data['category_post_id'];
				$data2['data_title'] = $this->input->post('name');
				$data2['data_url'] = base_url().'index.php/home/post/category/'.$data['category_post_id'];
				
				$cek = $this->db->query("select category_post_name from purb_category_post where category_post_name='".$data['category_post_name']."'");
				if($cek->num_rows() == 0){
					$add_data = $this->model_purb->get_insert('purb_category_post',$data);
					$add_data2 = $this->model_purb->get_insert('purb_all_data',$data2);
				
					if(!$add_data and !$add_data2){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/manage_category/form_add/");
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/manage_category/form_add/");
					}	
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your category name is available.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_category/form_add/");
				}
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$category_read = $this->model_purb->get_data_where('category_post_id',$id,'purb_category_post');
			foreach($category_read->result() as $db){
				$data['id'] = $db->category_post_id;
				$data['name'] = $db->category_post_name;
				$data['desc'] = $db->category_post_desc;
			}
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/post/category_form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','category name','required');
			if($this->form_validation->run() == false){
				$this->form_edit($this->uri->segment(4));
			}else{
				$id = $this->uri->segment(4);
				$data['category_post_name'] = $this->input->post('name');
				$data['category_post_desc'] = $this->input->post('desc');
				$data['category_post_update'] = date("Y-m-d H:i:s");
				
				$edit_data = $this->model_purb->get_update('purb_category_post',$data,'category_post_id',$id);
				
				if(!$edit_data){
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your update is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/manage_category/edit/".$id);
				}else{
					$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/manage_category/edit/".$id);
				}	
			}
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_category_post','category_post_id',$id);
			$delete2 = $this->model_purb->get_delete('purb_all_data','data_kode',$id);
			
			if(!$delete and !$delete2){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_category/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_category/");
			}
		}
		
		function search(){
			if($this->input->post('search') != ''){
				$sess['search_category'] = $this->input->post('search');
			}

			$this->session->set_userdata($sess);
			$search = $this->db->query("select * from purb_category where category_name like '%".$this->session->userdata('search_category')."%' or category_description like '%".$this->session->userdata('search_category')."%'");
			$page = $this->uri->segment(5);
			$limit = 5;
			
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			//$user = $this->model_purb->get_data('purb_user');
			$config['total_rows'] = $search->num_rows();
			$config['base_url'] = base_url()."index.php/backend/manage_category/search/index/";
			$config['per_page'] = $limit;
			$config['uri_segment'] = 5;
			$config['full_tag_open'] = "<div class='pagination'><ul>";
			$config['full_tag_close'] = "</ul></div>";
			
			$config['next_link'] = "Next <i class='fa fa-angle-right'></i>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag_close'] = "</li>";
			
			$config['prev_link'] = "<i class='fa fa-angle-left'></i> Prev";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag_close'] = "</li>";
			
			$config['first_link'] = "<span class='paging-arrow'><i class='fa fa-angle-double-left'></i> First</span>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag_close'] = "</li>";
			
			$config['last_link'] = "<span class='paging-arrow'>Last <i class='fa fa-angle-double-right'></i></span>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag_close'] = "</li>";

			$config['cur_tag_open'] = "<li><span class='active'>";//active
			$config['cur_tag_close'] = "</span></li>";
			
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = "</li>";
			
			$config['num_links'] = 3;
			
			$this->pagination->initialize($config);
			$data['paging'] = $this->pagination->create_links();
			
			//$data['user_grid'] = $this->model_purb->get_data_limit('purb_user',$limit,$offset);
			$data['category_grid'] = $this->db->query("select * from purb_category where category_name like '%".$this->session->userdata('search_category')."%' or category_description like '%".$this->session->userdata('search_category')."%' LIMIT ".$limit." OFFSET ".$offset."");
			$data['limit'] = $limit;
			$data['of'] = $search->num_rows();
			
			$this->load->view('back/others/top');
			$this->load->view('back/others/left_side');
			$this->load->view('back/others/top-header');
			$this->load->view('back/category/manage_category_view',$data);
			$this->load->view('back/others/bottom');
		}
	}
/*End of file manage_category.php*/
/*Location:.application/controller/backend/manage_category.php*/