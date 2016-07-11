<!--HEADER-->
  <div id="topline" style="box-shadow:none;
    -webkit-font-smoothing: antialiased;
    ">
    <div class="container">
      <div class="wrapper_w">
        <div class="pull-left">
          <div style="padding:10px 0px;">
			<span style="padding:0px 20px;font-family:'Montserrat';text-transform:none;color:#fff;">
				<?php 
					$qry = $this->db->query("select post_id, post_short_desc from purb_post order by post_id DESC LIMIT 1 ");
					foreach($qry->result() as $pub){
						echo '<a style="color:#fff;text-decoration:none;" href="'.base_url().'index.php/home/post/single/'.$pub->post_id.'">'.substr($pub->post_short_desc,0,50).' . . .</a>';
					}
				?>
			</span>
		</div>
        </div>
		<div class="pull-right">
          <div style="padding:10px 0px;">
			<a style="text-decoration:none;color:#fff;" href="<?php echo $facebook;?>"><span class="fa fa-facebook" style="color:#fff;background-color:transparent;padding:0px 8px;font-size:18px;margin-right:5px;border-radius:100px;"></span></a>
			<a style="text-decoration:none;color:#fff;" href="<?php echo $twitter;?>"><span class="fa fa-twitter" style="color:#fff;background-color:transparent;padding:0px 6px;font-size:18px;margin-right:5px;border-radius:100px;"></span>
			<a style="text-decoration:none;color:#fff;" href="<?php echo $youtube;?>"><span class="fa fa-youtube" style="color:#fff;background-color:transparent;padding:0px 6px;font-size:18px;margin-right:5px;border-radius:100px;"></span>
			<a style="text-decoration:none;color:#fff;" href="<?php echo $linkedin;?>"><span class="fa fa-instagram" style="color:#fff;background-color:transparent;padding:0px 6px;font-size:18px;margin-right:5px;border-radius:100px;"></span>
		  </div>
        </div>
      </div>
    </div>
  </div>