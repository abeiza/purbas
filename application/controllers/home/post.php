<?php
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');

	class Post extends CI_Controller{
		
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$page = $this->uri->segment(4);
			$limit = 1;
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			$category = $this->db->query("select * from purb_post, purb_category_post, purb_user
			where purb_post.author=purb_user.user_id and purb_post.post_category=purb_category_post.category_post_id 
			and purb_post.post_status='posting'");
			$config['base_url'] = base_url()."index.php/home/post/index/";
			$config['total_rows'] = $category->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			$config['full_tag_open'] = "<div class='paginator'><ul id='pagination'>";
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
			
			$data['post'] = $this->db->query("select * from purb_post, purb_category_post, purb_user
			where purb_post.author=purb_user.user_id and purb_post.post_category=purb_category_post.category_post_id 
			and purb_post.post_status='posting' LIMIT ".$limit." OFFSET ".$offset);
	
			
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
			
			$data['category'] = $this->db->query("select * from purb_category_post order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/list/content',$data);
			$this->load->view('front/others/bottom');
		}
		
		function category($id){
			$id = $this->uri->segment(4);
			
			$page = $this->uri->segment(5);
			$limit = 1;
			if(!$page){
				$offset = 0;
			}else{
				$offset = $page;
			}
			
			$category = $this->db->query("select * from purb_post, purb_category_post, purb_user
			where purb_post.author=purb_user.user_id and purb_post.post_category=purb_category_post.category_post_id 
			and purb_post.post_status='posting' and purb_category_post.category_post_id='".$id."'");
			$config['base_url'] = base_url()."index.php/home/post/category/".$id."/";
			$config['total_rows'] = $category->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 5;
			$config['full_tag_open'] = "<div class='paginator'><ul id='pagination'>";
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
			
			$data['post'] = $this->db->query("select * from purb_post, purb_category_post, purb_user
			where purb_post.author=purb_user.user_id and purb_post.post_category=purb_category_post.category_post_id 
			and purb_post.post_status='posting' and purb_category_post.category_post_id='".$id."' LIMIT ".$limit." OFFSET ".$offset);
			
			$posted_count = $this->db->query("select category_post_name from purb_category_post where category_post_id='".$id."'");
			
			foreach($posted_count->result() as $ct_nm){
				$data['category_name'] = $ct_nm->category_post_name;
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
			
			$data['category'] = $this->db->query("select * from purb_category_post order by category_post_id desc");
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/list/content',$data);
			$this->load->view('front/others/bottom');
		}
		
		function single($id){
			$id = $this->uri->segment(4);
			$single = $this->db->query("select * from purb_post, purb_category_post, purb_user where purb_category_post.category_post_id = purb_post.post_category and purb_post.author = purb_user.user_id and purb_post.post_id='".$id."'");
			
			$max_start = $this->db->query("select post_id from purb_post order by post_id asc limit 1");
			foreach($max_start->result() as $start){
				$data['min'] = $start->post_id;
			}
			
			$max_end = $this->db->query("select post_id from purb_post order by post_id desc limit 1");
			foreach($max_end->result() as $end){
				$data['max'] = $end->post_id;
			}
			
			$max_before = $this->db->query("select post_id from purb_post where post_id < '".$id."' order by post_id desc limit 1");
			if($max_before->num_rows() == 0){
				$data['before'] = null;
			}else{
				foreach($max_before->result() as $before){
					$data['before'] = $before->post_id;
				}
			}
			
			$max_after = $this->db->query("select post_id from purb_post where post_id > '".$id."' order by post_id asc limit 1");
			if($max_after->num_rows() == 0){
				$data['after'] = null;
			}else{
				foreach($max_after->result() as $after){
					$data['after'] = $after->post_id;
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
			
			foreach($single->result() as $db){
				$data['id'] = $db->post_id;
				$data['title'] = $db->post_title;
				$data['desc'] = $db->post_desc;
				$data['category_id'] = $db->category_post_id;
				$data['category'] = $db->category_post_name;
				$data['pict'] = $db->post_pict;
				$data['nick'] = $db->user_nick;
				$data['short'] = $db->post_short_desc;
				$data['create'] = $db->post_date_create;
				$data['update'] = $db->post_date_update;
			}
			
			$this->load->view('front/others/top');
			$this->load->view('front/others/back_to_top');
			$this->load->view('front/others/header_top',$data);
			$this->load->view('front/others/navigation',$header);
			//$this->load->view('front/home/slider');
			$this->load->view('front/single/content',$data);
			$this->load->view('front/others/bottom');
		}
		
	}
	/*End of file post.php*/
	/*Location:.application/controllers/home/post.php*/