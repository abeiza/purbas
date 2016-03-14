<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	class Manage_Product extends CI_Controller{
		
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
				$data['product'] = $this->db->query('select * from purb_product');
				
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view('back/product/list_view',$data);
				$this->load->view('back/others/bottom');
				
			}
		}
		
		function form_add(){
			$query['category'] = $this->db->query("select category_id, category_name from purb_category_product order by category_name");
			//$query['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/product/form_add_view",$query);
			$this->load->view('back/others/bottom');
		}
		
		function add(){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','product name','required');
			$this->form_validation->set_rules('code','code principle','required');
			$this->form_validation->set_rules('desc','description','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('category','category post','required');
			if($this->form_validation->run() == false){
				$this->form_add();
			}else{
				$data['product_id'] = $this->model_purb->getMaxKode('purb_product', 'product_id', 'PRD');
				if(empty($_FILES['pict']['name'])){
					$data['product_name'] = $this->input->post('name');
					$data['product_principle_id'] = $this->input->post('code');
					$data['product_desc'] = $this->input->post('desc');
					$data['product_category'] = $this->input->post('category');
					$data['product_status'] = $this->input->post('status');
					
					
					$data['product_create_date'] = date("Y-m-d H:i:s");
					
					$data2['data_id'] = $this->model_purb->getMaxKode('purb_all_data', 'data_id', 'DTA');
					$data2['data_kode'] = $data['product_id'];
					$data2['data_title'] = $this->input->post('name');
					$data2['data_url'] = base_url().'index.php/home/page/product_detail/'.$data['product_id'];
						
					$add_data = $this->model_purb->get_insert("purb_product",$data);
					$add_data2 = $this->model_purb->get_insert('purb_all_data',$data2);
					if(!$add_data){
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/manage_product/add/");
					}else{
						$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/manage_product/add/");
					}
				}else{
					$configu['upload_path'] = './uploads/product/original/';
					$configu['upload_url'] = base_url().'uploads/product/original/';
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
						$config1['new_image'] = 'uploads/product/thumb/'.$upload_data['file_name'];
						$config1['maintain_ratio'] = TRUE;
						$config1['width'] = 200;
						$config1['height'] = 200;

						$this->load->library('image_lib', $config1);

						if(!$this->image_lib->resize()){
							echo $this->image_lib->display_errors();
						}
						
						$data['product_name'] = $this->input->post('name');
						$data['product_principle_id'] = $this->input->post('code');
						$data['product_desc'] = $this->input->post('desc');
						$data['product_category'] = $this->input->post('category');
						$data['product_status'] = $this->input->post('status');
						
						$data['product_pict'] = $upload_data['file_name'];
						
						$data['product_thumb_pict'] = $config1['new_image'];
						
						
						$data['product_create_date'] = date("Y-m-d H:i:s");
						
						$data2['data_id'] = $this->model_purb->getMaxKode('purb_all_data', 'data_id', 'DTA');
						$data2['data_kode'] = $data['product_id'];
						$data2['data_title'] = $this->input->post('name');
						$data2['data_url'] = base_url().'index.php/home/page/product_detail/'.$data['product_id'];
						
						
						$add_data = $this->model_purb->get_insert("purb_product",$data);
						$add_data2 = $this->model_purb->get_insert('purb_all_data',$data2);
						if(!$add_data){
							$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your entry is fail.. Please try again.. </span></div>');
							Header("Location:".base_url()."index.php/backend/manage_product/add/");
						}else{
							$this->session->set_flashdata("add_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Insert data is success</span></div>');
							Header("Location:".base_url()."index.php/backend/manage_product/add/");
						}
					}
				}
			}
		}
		
		function form_edit($id){
			$id = $this->uri->segment(4);
			$this->load->model('model_purb');
			$product_read = $this->model_purb->get_data_where('product_id',$id,'purb_product');
			foreach($product_read->result() as $db){
				$data['id'] = $db->product_id;
				$data['name'] = $db->product_name;
				$data['desc'] = $db->product_desc;
				$data['status'] = $db->product_status;
				$data['code'] = $db->product_principle_id;
				$data['pict'] = $db->product_pict;
				$data['cat'] = $db->product_category;
				//$data['tag'] = $db->post_tag;
			}
			$data['category'] = $this->db->query("select category_id, category_name from purb_category_product order by category_name");
			//$data['tag'] = $this->db->query("select tag_id, tag_name from purb_tag order by tag_name");
			$this->load->view('back/others/top');
			$this->load->view('back/others/left');
			$this->load->view('back/others/right_top');
			$this->load->view("back/product/form_edit_view",$data);
			$this->load->view('back/others/bottom');
		}
		
		function edit($id){
			$this->load->model('model_purb');
			$this->form_validation->set_rules('name','product name','required');
			$this->form_validation->set_rules('code','code principle','required');
			$this->form_validation->set_rules('desc','description','required');
			$this->form_validation->set_rules('status','status','required');
			$this->form_validation->set_rules('category','category product','required');
			if($this->form_validation->run() == false){
				$this->form_edit($this->uri->segment(4));
			}else{
				if(empty($_FILES['pict']['name'])){
					$id = $this->uri->segment(4);
					$data['product_name'] = $this->input->post('name');
					$data['product_principle_id'] = $this->input->post('code');
					$data['product_desc'] = $this->input->post('desc');
					$data['product_category'] = $this->input->post('category');
					$data['product_status'] = $this->input->post('status');
					
					
					$data['product_update_date'] = date("Y-m-d H:i:s");
					
					$edit_data = $this->model_purb->get_update('purb_product',$data,'product_id',$id);
					if(!$edit_data){
						$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your update is fail.. Please try again.. </span></div>');
						Header("Location:".base_url()."index.php/backend/manage_product/edit/".$id);
					}else{
						$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
						Header("Location:".base_url()."index.php/backend/manage_product/edit/".$id);
					}
				}else{
					$configu['upload_path'] = './uploads/product/original/';
					$configu['upload_url'] = base_url().'uploads/product/original/';
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
						$config1['new_image'] = 'uploads/product/thumb/'.$upload_data['file_name'];
						$config1['maintain_ratio'] = TRUE;
						$config1['width'] = 225;
						$config1['height'] = 165;

						$this->load->library('image_lib', $config1);

						if(!$this->image_lib->resize()){
							echo $this->image_lib->display_errors();
						}
						
						$id = $this->uri->segment(4);
						$data['product_name'] = $this->input->post('name');
						$data['product_principle_id'] = $this->input->post('code');
						$data['product_desc'] = $this->input->post('desc');
						$data['product_category'] = $this->input->post('category');
						$data['product_status'] = $this->input->post('status');
						$data['product_pict'] = $upload_data['file_name'];
						$data['product_thumb_pict'] = $config1['new_image'];
						
						
						$data['product_update_date'] = date("Y-m-d H:i:s");
						
						$edit_data = $this->model_purb->get_update('purb_product',$data,'product_id',$id);
						if(!$edit_data){
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-exclamation-triangle" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry your update is fail.. Please try again.. </span></div>');
							Header("Location:".base_url()."index.php/backend/manage_product/edit/".$id);
						}else{
							$this->session->set_flashdata("edit_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Update data is success</span></div>');
							Header("Location:".base_url()."index.php/backend/manage_product/edit/".$id);
						}
					}
				}	
			}
		}
		
		function delete($id){
			$this->load->model('model_purb');
			$id = $this->uri->segment(4);
			
			$delete = $this->model_purb->get_delete('purb_product','product_id',$id);
			$delete2 = $this->model_purb->get_delete('purb_all_data','data_kode',$id);
			
			if(!$delete and !$delete2){
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:red; font-size:12px;"><i class="fa fa-check" style="color:red;font-size:16px;margin-right:5px;"></i>Sorry, delete proses id fail... Please try again...</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_product/");
			}else{
				$this->session->set_flashdata("modify_result",'<div style="margin:10px 20px;width:auto;background-color:#ffffbf;font-size:12px;border-radius:3px;color:red;padding:10px;"><span style="color:green; font-size:12px;"><i class="fa fa-check" style="color:green;font-size:16px;margin-right:5px;"></i>Delete data is success</span></div>');
				Header("Location:".base_url()."index.php/backend/manage_product/");
			}
		}
		
		
	}
/*End of file manage_product.php*/
/*Location:.application/controllers/backend/manage_product.php*/