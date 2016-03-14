<!--CONTENT-->
  <section id="content">
    <div class="container top">
      <div class="content_top">
        <div class="breadcrumbs"><a href="<?php echo base_url();?>">Home</a> <span>&#8250;</span> <a href="#">Post</a> </div>
      </div>
      <div class="row">
        <div class="span9">
			<?php 
				if(substr($this->uri->segment(4),0,3) != "CTP"){
					echo '<h3>ALL POSTS</h3>';
				}else{
					echo '<h3>CATEGORY ('.$category_name.')</h3>';
				} 
			?>
		  <?php 
			if($post->num_rows() == 0){
				echo "Data Posting is Not Avaliable";
			}else{
				foreach($post->result() as $db){
					?>
					<div class="post-preview">
					<h3><a href="<?php echo base_url().'index.php/home/post/single/'.$db->post_id;?>"><?php echo $db->post_title?></a></h3>
					<div class="image"><img src="<?php echo base_url().'uploads/post/original/'.$db->post_pict;?>" width="733" height="301" alt="" class="img-responsive img-rounded"></div>
					<div class="post-meta"> <span class="meta-date"><i class="icon-clock-alt"></i>
					<?php 
					if($db->post_date_update == NULL){
						$y = substr($db->post_date_create,0,4);
						$m = substr(date('F', mktime(0, 0, 0, substr($db->post_date_create,5,2), 10)),0,3);
						$d = substr($db->post_date_create,8,2);
						echo $d.' '.$m.','.$y;
					}else{
						$y = substr($db->post_date_update,0,4);
						$m = substr(date('F', mktime(0, 0, 0, substr($db->post_date_update,5,2), 10)),0,3);
						$d = substr($db->post_date_update,8,2);
						echo $d.' '.$m.','.$y;
					}
					?></span> <span class="meta-author"><i class="icon-user-2"></i><a href="#">
					<?php echo $db->user_nick;?>
					</a></span> <span class="meta-tags"><i class="icon-tag-1"></i><a href="#"><?php echo $db->category_post_name;?></a></span></div>
					<p><?php echo $db->post_short_desc;?></p>
					<p><a class="button" href="<?php echo base_url().'index.php/home/post/single/'.$db->post_id;?>">More Info</a></p>
				  </div>
				  <div class="line"></div>
					<?php 
				}
			}
		  ?>
		  <?php echo $paging;?>
        </div>
        <div class="span3">
          <div class="block">
            <div class="block-title">Categories</div>
            <div class="block-content">
              <ul class="categories">
				<?php 
					foreach($category->result() as $category){
						?>
						<li><i class='icon-right-open'></i><a href="<?php echo base_url().'index.php/home/post/category/'.$category->category_post_id;?>"><?php echo $category->category_post_name;?></a></li>
						<?php
					}
				?>
              </ul>
            </div>
          </div>
          <!--<div class="block">
            <div class="block-content">
              <ul class="nav-tabs contentTab">
                <li class="active"><a href="#tab1">Popular</a></li>
                <li><a href="#tab2">Recent</a></li>
                <li><a href="#tab3">Comment</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab1">
                  <div class="wrapper"> <img src="img/popular_img1.jpg" width="55" height="55" alt="" class="pull-left border"> <span class="date color"><strong>14 August, 2013</strong></span> <br>
                    Fusce vulputate ne sed egestas quam.</div>
                  <div class="wrapper"> <img src="img/popular_img2.jpg" width="55" height="55" alt="" class="pull-left border"> <span class="date color"><strong>14 August, 2013</strong></span> <br>
                    Praesent vitae dui. Morbi id tellus. Cum sociis<br>
                  </div>
                </div>
                <div class="tab-pane" id="tab2">
                  <p>Praesent laoreet rutrum malesuada duis ac eget ac sapien accumsan elementum ac nullam pretium, eros nec consectetur euismod, elit tortor consequat </p>
                  <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus posuere lectus. Fusce vulputate nibh egestas orci. Aliquam lectus. Morbi eget dolor ullamcorper massa pellentesque sagittis. Morbi sit amet quam. </p>
                </div>
                <div class="tab-pane" id="tab3">
                  <p>Praesent laoreet rutrum malesuada duis ac eget ac sapien accumsan elementum ac nullam pretium, eros nec consectetur euismod, elit tortor consequat </p>
                </div>
              </div>
            </div>
          </div>
       --> </div>
      </div>
    </div>
  </section>
  <div id="push"></div>