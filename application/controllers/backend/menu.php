<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	class Menu extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->model('model_purb');
				$data['menu'] = $this->db->query('select * from purb_menu order by menu_id');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/menu/list_view',$data);
				$this->load->view('back/others/bottom');
			}
		}
		
		function submenu($id){
			$id = $this->uri->segment(4);
			$query['sub_menu'] = $this->db->query('select * from purb_menu_header where id_menu="'.$id.'"');
			$query['kode'] = $id;
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/menu/sub_header_list_view',$query);
				$this->load->view('back/others/bottom');
			}
		}
		
		function submenu_form_add($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			$cek = $this->session->userdata('success_login');
			$query['kode'] = $id;
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view("back/menu/sub_header_form_add_view",$query);
				$this->load->view('back/others/bottom');
			}
		}
		
		function submenu_add($kode){
			$this->load->model('model_purb');
			$kode = $this->uri->segment(4);
			$this->form_validation->set_rules('name','header label','required');
			if($this->form_validation->run() == false){
				$this->submenu_form_add($kode);
			}else{
				
				$data['menu_header_id'] = $this->model_purb->getMaxKode('purb_menu_header', 'menu_header_id', 'MHU');
				$data['menu_header_label'] = $this->input->post('name');
				$data['menu_header_remark'] = $this->input->post('remark');
				$data['id_menu'] = $kode;
				
		
				$add_data = $this->model_purb->get_insert('purb_menu_header',$data);
			
				if(!$add_data){
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/menu/submenu_add/".$kode);
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/menu/submenu_add/".$kode);
				}	
			}
		}
		
		function submenu_form_edit($kode,$id){
			$kode = $this->uri->segment(4);
			$id = $this->uri->segment(5);
			$this->load->model('model_purb');
			$menu_read = $this->model_purb->get_data_where('menu_header_id',$id,'purb_menu_header');
			foreach($menu_read->result() as $db){
				$data['id'] = $db->menu_header_id;
				$data['menu_header_label'] = $db->menu_header_label;
				$data['menu_header_remark'] = $db->menu_header_remark;
				$data['kode'] = $kode;
				//$data['tag'] = $db->post_tag;
			}
			//$data['category'] = $this->db->query("select category_id, category_name from purb_category order by category_name");
			//$data['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/menu/sub_header_form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function submenu_edit($kode, $id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(5);
				
			$data['menu_header_label'] = $this->input->post('name');
			$data['menu_header_remark'] = $this->input->post('remark');
			$data['id_menu'] = $this->uri->segment(4);
			
	
			$add_data = $this->model_purb->get_update('purb_menu_header',$data,'menu_header_id',$id);
		
			if(!$add_data){
				$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu_form_edit/".$this->uri->segment(4).'/'.$id);
			}else{
				$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu_form_edit/".$this->uri->segment(4).'/'.$id);
			}		
		}
		
		function submenu_delete($kode,$id){
			$this->load->model('model_purb');
			$kode = $this->uri->segment(4);
			$id = $this->uri->segment(5);
			
			$delete = $this->model_purb->get_delete('purb_menu_header','menu_header_id',$id);
			
			if(!$delete){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu/".$kode);
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu/".$kode);
			}
		}
		
		
		
		
		function submenu_detail($kode, $id){
			$id = $this->uri->segment(5);
			$kode = $this->uri->segment(4);
			$query['sub_menu'] = $this->db->query('select * from purb_menu_detail where menu_header="'.$id.'"');
			$query['id'] = $id;
			$query['kode'] = $kode;
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/menu/sub_detail_list_view',$query);
				$this->load->view('back/others/bottom');
			}
		}
		
		function submenu_detail_form_add($kode, $id){
			$this->load->model('model_purb');
			$kode = $this->uri->segment(4);
			$id = $this->uri->segment(5);
			$cek = $this->session->userdata('success_login');
			$query['kode'] = $kode;
			$query['id'] = $id;
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view("back/menu/sub_detail_form_add_view",$query);
				$this->load->view('back/others/bottom');
			}
		}
		
		function submenu_detail_add($kode, $id){
			$this->load->model('model_purb');
			$kode = $this->uri->segment(4);
			$id = $this->uri->segment(5);
			$this->form_validation->set_rules('name','detail label','required');
			if($this->form_validation->run() == false){
				$this->submenu_detail_form_add($kode, $id);
			}else{
				
				$data['menu_detail_id'] = $this->model_purb->getMaxKode('purb_menu_detail', 'menu_detail_id', 'MDU');
				$data['menu_detail_label'] = $this->input->post('name');
				$data['menu_detail_url'] = $this->input->post('url_link');
				$data['menu_header'] = $id;
				
		
				$add_data = $this->model_purb->get_insert('purb_menu_detail',$data);
			
				if(!$add_data){
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/menu/submenu_detail_add/".$kode.'/'.$id);
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/menu/submenu_detail_add/".$kode.'/'.$id);
				}	
			}
		}
		
		function submenu_detail_form_edit($kode,$id2,$id){
			$kode = $this->uri->segment(4);
			$id2 = $this->uri->segment(5);
			$this->load->model('model_purb');
			$menu_read = $this->model_purb->get_data_where('menu_detail_id',$id,'purb_menu_detail');
			foreach($menu_read->result() as $db){
				$data['id'] = $db->menu_detail_id;
				$data['menu_detail_label'] = $db->menu_detail_label;
				$data['menu_detail_url'] = $db->menu_detail_url;
				$data['kode'] = $kode;
				$data['id2'] = $id2;
				//$data['tag'] = $db->post_tag;
			}
			//$data['category'] = $this->db->query("select category_id, category_name from purb_category order by category_name");
			//$data['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/menu/sub_detail_form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function submenu_detail_edit($kode, $id2, $id){
			$this->load->model('model_purb');
			$kode = $this->uri->segment(4);
			$id = $this->uri->segment(6);
				
			$data['menu_detail_label'] = $this->input->post('name');
			$data['menu_detail_url'] = $this->input->post('url_link');
			$data['menu_header'] = $this->uri->segment(5);
			
	
			$add_data = $this->model_purb->get_update('purb_menu_detail',$data,'menu_detail_id',$id);
		
			if(!$add_data){
				$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu_detail_form_edit/".$kode.'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));
			}else{
				$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu_detail_form_edit/".$kode.'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));
			}		
		}
	
		function submenu_detail_delete($kode,$id2,$id){
			$this->load->model('model_purb');
			$kode = $this->uri->segment(4);
			$id = $this->uri->segment(6);
			
			$delete = $this->model_purb->get_delete('purb_menu_detail','menu_detail_id',$id);
			
			if(!$delete){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu_detail/".$kode."/".$this->uri->segment(5));
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/submenu_detail/".$kode."/".$this->uri->segment(5));
			}
		}
		
	
	
	
		function form_add(){
			$this->load->model('model_purb');
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view('back/login/login_view');
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view("back/menu/form_add_view");
				$this->load->view('back/others/bottom');
			}
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','label menu','required');
			$this->form_validation->set_rules('url_link','url link','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				
				$data['menu_id'] = $this->model_purb->getMaxKode('purb_menu', 'menu_id', 'MNU');
				$data['menu_name'] = $this->input->post('name');
				$data['menu_url'] = $this->input->post('url_link');
				$data['menu_remark'] = $this->input->post('remark');
				
				
				$data['menu_date_modify'] = date("Y-m-d H:i:s");
				
		
				$add_data = $this->model_purb->get_insert('purb_menu',$data);
			
				if(!$add_data){
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
					Header("Location:".base_url()."index.php/backend/menu/add/");
				}else{
					$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
					Header("Location:".base_url()."index.php/backend/menu/add/");
				}	
			}
		}
		
		function add_content($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$this->form_validation->set_rules('label','label menu','required');
			if($this->form_validation->run() == false){
				$this->add_content();
			}else{
				if($this->input->post('page')){
					$data['menu_refparent'] = $id;
					$data['menu_content_label'] = $this->input->post('label');
					$data['menu_content_url'] = $this->input->post('page');
					
					
					//$data['menu_date_modify'] = date("Y-m-d H:i:s");
					
			
					$add_data = $this->model_purb->get_insert('purb_menu_content',$data);
				
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}	
				}else if($this->input->post('post')){
					$data['menu_refparent'] = $id;
					$data['menu_content_label'] = $this->input->post('label');
					$data['menu_content_url'] = $this->input->post('post');
					
					
					//$data['menu_date_modify'] = date("Y-m-d H:i:s");
					
			
					$add_data = $this->model_purb->get_insert('purb_menu_content',$data);
				
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}	
				}else if($this->input->post('page_category')){
					$data['menu_refparent'] = $id;
					$data['menu_content_label'] = $this->input->post('label');
					$data['menu_content_url'] = $this->input->post('page_category');
					
					
					//$data['menu_date_modify'] = date("Y-m-d H:i:s");
					
			
					$add_data = $this->model_purb->get_insert('purb_menu_content',$data);
				
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}	
				}else if($this->input->post('post_category')){
					$data['menu_refparent'] = $id;
					$data['menu_content_label'] = $this->input->post('label');
					$data['menu_content_url'] = $this->input->post('post_category');
					
					
					//$data['menu_date_modify'] = date("Y-m-d H:i:s");
					
			
					$add_data = $this->model_purb->get_insert('purb_menu_content',$data);
				
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}	
				}else if($this->input->post('url')){
					$data['menu_refparent'] = $id;
					$data['menu_content_label'] = $this->input->post('label');
					$data['menu_content_url'] = $this->input->post('url');
					
					
					//$data['menu_date_modify'] = date("Y-m-d H:i:s");
					
			
					$add_data = $this->model_purb->get_insert('purb_menu_content',$data);
				
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/menu/content_add/".$id);
					}	
				}
			}
		}
		
		function delete_content($id){
			//$this->load->model('model_purb');
			$id_parent = $this->uri->segment(4);
			$id_child = $this->uri->segment(5);
			
			$delete = $this->db->query("delete from purb_menu_content where menu_content_id='".$id_child."' and menu_refparent='".$id_parent."'");
			
			if(!$delete){
				$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/content_add/".$id_parent);
			}else{
				$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/content_add/".$id_parent);
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$menu_read = $this->model_purb->get_data_where('menu_id',$id,'purb_menu');
			foreach($menu_read->result() as $db){
				$data['menu_id'] = $db->menu_id;
				$data['menu_name'] = $db->menu_name;
				$data['menu_url'] = $db->menu_url;
				$data['menu_remark'] = $db->menu_remark;
				//$data['category'] = $db->post_category;
				//$data['tag'] = $db->post_tag;
			}
			//$data['category'] = $this->db->query("select category_id, category_name from purb_category order by category_name");
			//$data['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/menu/form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
				
			$data['menu_name'] = $this->input->post('name');
			$data['menu_url'] = $this->input->post('url_link');
			$data['menu_remark'] = $this->input->post('remark');
			
			
			$data['menu_date_modify'] = date("Y-m-d H:i:s");
			
	
			$add_data = $this->model_purb->get_update('purb_menu',$data,'menu_id',$id);
		
			if(!$add_data){
				$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
				Header("Location:".base_url()."index.php/backend/menu/form_edit/".$id);
			}else{
				$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/form_edit/".$id);
			}		
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_menu','menu_id',$id);
			
			if(!$delete){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/menu/");
			}
		}
		
	}
/*End of file menu.php*/
/*Location:.application/controllers/menu.php*/