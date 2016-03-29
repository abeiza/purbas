  <section class="slider">
    <div class="flexslider big">
		<ul class="slides">
		<?php 
			if($slide->num_rows() == 0){
				
			}else{
				foreach($slide->result() as $db){
					echo '<li> <a href="'.$db->banner_url.'"><img src="'.base_url().'uploads/banner/original/'.$db->banner_post_disp.'" alt="" /></a> </li>';
				}
			}
        
       
		?>
	  </ul>
      <div class="next-slider"><img src="<?php echo base_url();?>assets/theme/img/slider_small3.jpg"  alt=""></div>
      <div class="prev-slider"><img src="<?php echo base_url();?>assets/theme/img/slider_small2.jpg"  alt=""></div>
    </div>
  </section>
 