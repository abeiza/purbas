<?php
	if(!defined('BASEPATH'))exit('No direct script access allowed');
	
	class Page extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$page = $this->uri->segment(4);
			$limit = 8;
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			$product = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting'");
			$config['base_url'] = base_url()."index.php/home/page/index/";
			$config['total_rows'] = $product->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = "<div class='paginator' style='margin-bottom:2px;'><ul id='pagination'>";
			$config['full_tag_close'] = "</ul></div>";
			
			$config['next_link'] = "<i class='icon-right-thin'></i>";
			$config['next_tag_open'] = "<li class='next'>";
			$config['next_tag_close'] = "</li>";
			
			$config['prev_link'] = "<i class='icon-left-thin'></i>";
			$config['prev_tag_open'] = "<li class='previous'>";
			$config['prev_tag_close'] = "</li>";
			
			$config['first_link'] = "<i class='icon-left-open-1'></i>";
			$config['first_tag_open'] = "<li class='previous'>";
			$config['first_tag_close'] = "</li>";
			
			$config['last_link'] = "<i class='icon-right-open-1'></i>";
			$config['last_tag_open'] = "<li class='next'>";
			$config['last_tag_close'] = "</li>";

			$config['cur_tag_open'] = "<li class='active'>";
			$config['cur_tag_close'] = "</li>";
			
			$config['num_tag_open'] = "<li><span>";
			$config['num_tag_close'] = "</span></li>";
			
			$this->pagination->initialize($config);
			$data['paging'] = $this->pagination->create_links();
			
			$data['product'] = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting' LIMIT ".$limit." OFFSET ".$offset);
	
			
			$header['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$q = $this->db->query("select setting_logo from purb_setting");
			foreach($q->result() as $db){
				$header['logo'] = $db->setting_logo;
			}
			
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
			}
			
			//$data['category'] = $this->db->query("select * from purb_category_product order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/catalogue/content',$data);
			$this->load->view('front/others/bottom');
		}
		
		function product_detail($id){
			$id = $this->uri->segment(4);
			
			$product = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting' and purb_product.product_id='".$id."'");
			
			$max_start = $this->db->query("select product_id from purb_product order by product_id asc limit 1");
			foreach($max_start->result() as $start){
				$data['min'] = $start->product_id;
			}
			
			$max_end = $this->db->query("select product_id from purb_product order by product_id desc limit 1");
			foreach($max_end->result() as $end){
				$data['max'] = $end->product_id;
			}
			
			$max_before = $this->db->query("select product_id from purb_product where product_id < '".$id."' order by product_id desc limit 1");
			if($max_before->num_rows() == 0){
				$data['before'] = null;
			}else{
				foreach($max_before->result() as $before){
					$data['before'] = $before->product_id;
				}
			}
			
			$max_after = $this->db->query("select product_id from purb_product where product_id > '".$id."' order by product_id asc limit 1");
			if($max_after->num_rows() == 0){
				$data['after'] = null;
			}else{
				foreach($max_after->result() as $after){
					$data['after'] = $after->product_id;
				}
			}
			
			$header['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$q = $this->db->query("select setting_logo from purb_setting");
			foreach($q->result() as $db){
				$header['logo'] = $db->setting_logo;
			}
			
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
			}
			
			foreach($product->result() as $prd){
				$data['id'] = $prd->product_id;
				$data['name'] = $prd->product_name;
				$data['principle'] = $prd->product_principle_id;
				$data['desc'] = $prd->product_desc;
				$data['pict'] = $prd->product_pict;
				$data['category_id'] = $prd->category_id;
				$data['category'] = $prd->category_name;
				$data['new'] = $prd->product_new;
				$data['promo'] = $prd->product_promo;
			}
			
			//$data['category'] = $this->db->query("select * from purb_category_product order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/single/content_product',$data);
			$this->load->view('front/others/bottom');
		}
		
		function category(){
			$id = $this->uri->segment(4);
			$page = $this->uri->segment(5);
			$limit = 8;
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			$category = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting' and purb_category_product.category_id='".$id."'");
			$config['base_url'] = base_url()."index.php/home/page/category/".$page."/";
			$config['total_rows'] = $category->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 5;
			$config['full_tag_open'] = "<div class='paginator' style='margin-bottom:2px;'><ul id='pagination'>";
			$config['full_tag_close'] = "</ul></div>";
			
			$config['next_link'] = "<i class='icon-right-thin'></i>";
			$config['next_tag_open'] = "<li class='next'>";
			$config['next_tag_close'] = "</li>";
			
			$config['prev_link'] = "<i class='icon-left-thin'></i>";
			$config['prev_tag_open'] = "<li class='previous'>";
			$config['prev_tag_close'] = "</li>";
			
			$config['first_link'] = "<i class='icon-left-open-1'></i>";
			$config['first_tag_open'] = "<li class='previous'>";
			$config['first_tag_close'] = "</li>";
			
			$config['last_link'] = "<i class='icon-right-open-1'></i>";
			$config['last_tag_open'] = "<li class='next'>";
			$config['last_tag_close'] = "</li>";

			$config['cur_tag_open'] = "<li class='active'>";
			$config['cur_tag_close'] = "</li>";
			
			$config['num_tag_open'] = "<li><span>";
			$config['num_tag_close'] = "</span></li>";
			
			$this->pagination->initialize($config);
			$data['paging'] = $this->pagination->create_links();
			
			$data['product'] = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting' and purb_category_product.category_id='".$id."' LIMIT ".$limit." OFFSET ".$offset);

			$posted_count = $this->db->query("select category_name from purb_category_product where category_id='".$id."'");
			
			foreach($posted_count->result() as $ct_nm){
				$data['category_name'] = $ct_nm->category_name;
			}
			
			$header['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$q = $this->db->query("select setting_logo from purb_setting");
			foreach($q->result() as $db){
				$header['logo'] = $db->setting_logo;
			}
			
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
			}
			
			//$data['category'] = $this->db->query("select * from purb_category_product order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/catalogue/content',$data);
			$this->load->view('front/others/bottom');
		}
		
		function single($id){
			$id = $this->uri->segment(4);
			
			$single = $this->db->query("select * from purb_page where page_id='".$id."'");
			
			$header['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$q = $this->db->query("select setting_logo from purb_setting");
			foreach($q->result() as $db){
				$header['logo'] = $db->setting_logo;
			}
			
			$query = $this->db->query('select * from purb_contact');
			foreach($query->result() as $db){
				$data['facebook'] = $db->contact_facebook;
				$data['twitter'] = $db->contact_twitter;
				$data['youtube'] = $db->contact_youtube;
				$data['linkedin'] = $db->contact_linkedin;
			}
			
			foreach($single->result() as $sgl){
				$data['id'] = $sgl->page_id;
				$data['title'] = $sgl->page_title;
				$data['desc'] = $sgl->page_desc;
			}
			
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/single/content_single',$data);
			$this->load->view('front/others/bottom');
		}
		
		function searchData(){
			$data = $this->input->post('search_data');
			$page = $this->uri->segment(4);
			$limit = 8;
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			$products = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting' and purb_product.product_name like '%".$data."%' ");
			$config['base_url'] = base_url()."index.php/home/page/search/";
			$config['total_rows'] = $products->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = "<div class='paginator' style='margin-bottom:2px;'><ul id='pagination'>";
			$config['full_tag_close'] = "</ul></div>";
			
			$config['next_link'] = "<i class='icon-right-thin'></i>";
			$config['next_tag_open'] = "<li class='next'>";
			$config['next_tag_close'] = "</li>";
			
			$config['prev_link'] = "<i class='icon-left-thin'></i>";
			$config['prev_tag_open'] = "<li class='previous'>";
			$config['prev_tag_close'] = "</li>";
			
			$config['first_link'] = "<i class='icon-left-open-1'></i>";
			$config['first_tag_open'] = "<li class='previous'>";
			$config['first_tag_close'] = "</li>";
			
			$config['last_link'] = "<i class='icon-right-open-1'></i>";
			$config['last_tag_open'] = "<li class='next'>";
			$config['last_tag_close'] = "</li>";

			$config['cur_tag_open'] = "<li class='active'>";
			$config['cur_tag_close'] = "</li>";
			
			$config['num_tag_open'] = "<li><span>";
			$config['num_tag_close'] = "</span></li>";
			
			$this->pagination->initialize($config);
			$datas['paging'] = $this->pagination->create_links();
			
			$datas['product'] = $this->db->query("select * from purb_product, purb_category_product
			where purb_product.product_category=purb_category_product.category_id 
			and purb_product.product_status='posting' and purb_product.product_name like '%".$data."%' LIMIT ".$limit." OFFSET ".$offset);
	
			
			$headers['menu'] = $this->db->query("select menu_id, menu_name, menu_url from purb_menu order by menu_id asc");
			$qa = $this->db->query("select setting_logo from purb_setting");
			foreach($qa->result() as $db){
				$headers['logo'] = $db->setting_logo;
			}
			
			$query1 = $this->db->query('select * from purb_contact');
			foreach($query1->result() as $db){
				$datas['facebook'] = $db->contact_facebook;
				$datas['twitter'] = $db->contact_twitter;
				$datas['youtube'] = $db->contact_youtube;
				$datas['linkedin'] = $db->contact_linkedin;
			}
			
			//$data['category'] = $this->db->query("select * from purb_category_product order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$datas);
			$this->load->view('front/others/navigation',$headers);
			//$this->load->view('front/home/slider');
			$this->load->view('front/catalogue/content',$datas);
			$this->load->view('front/others/bottom');
		}
	}
	
/*End of file page.php*/
/*Location:.application/controllers/home/page.php*/