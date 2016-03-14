<?php 
	if(!defined('BASEPATH'))exit('No Direct Script Access Allowed');
	class Login extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		
		function index(){
			$cek = $this->session->userdata('success_login');
			if(!$cek){
				$this->load->view("back/login/login_view");
			}else{
				$this->load->view('back/others/top');
				$this->load->view('back/others/left');
				$this->load->view('back/others/right_top');
				$this->load->view("back/dashboard/right_bottom");
				$this->load->view('back/others/bottom');
			}
		}
		
		function login_act(){
			$this->form_validation->set_rules('username','username','required');
			$this->form_validation->set_rules('password','password','required');
			if($this->form_validation->run() == false){
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$this->load->model('model_purb');
				$log = $this->model_purb->get_login($username,$password);
				if($log->num_rows() > 0){
					foreach($log->result() as $db){
						$sess['success_login'] = 'success';
						$sess['user_id'] = $db->user_id;
						$sess['user_nick'] = $db->user_nick;
						$sess['user_username'] = $db->user_username;
						$sess['user_password'] = $db->user_password;
						$this->session->set_userdata($sess);
						
						date_default_timezone_set('Asia/Jakarta');
						$data['user_date_log'] = date("Y-m-d H:i:s");
						$this->model_purb->get_update('purb_user',$data,'user_id',$sess['user_id']);
					}
					Header('Location:'.base_url().'index.php/backend/dashboard');
				}else{
					$this->session->set_flashdata('login_result',"<span class='fa fa-exclamation-circle' style='color:#fff; margin-top:10px;background:#aa2e33;padding:10px;border-radius:3px;box-shadow: 0 0 5px rgba(123, 123, 123, 0.2);'> <strong style='font-size:11px;font-family:calibri'>Sorry your data account is invalid. . .</strong></span>");
					Header('Location:'.base_url().'index.php/backend/login');
				}
			}
		}
		
		function logout_act(){
			$cek = $this->session->userdata('success_login');
			if($cek){
				$this->session->sess_destroy();
				?>
				<script>
					window.location.href = '<?php echo base_url();?>index.php/backend/login';
				</script>
			<?php
			}else{
				?>
				<script>
					window.location.href = '<?php echo base_url();?>index.php/backend/login';
				</script>
			<?php
			}
		}
	}
	/*End of file login.php*/
	/*Location:.application/controllers/backend/login.php*/