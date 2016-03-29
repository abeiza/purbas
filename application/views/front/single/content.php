<!--CONTENT-->
  <section id="content">
    <div class="container top">
      <div class="row">
        <div class="span12">
          <h3 style="text-transform:uppercase;"><?php echo $category;?> POST</h3>
          <div class="post-preview">
            <h3><?php echo $title;?></h3>
			<div class="row">
				<div class="span12" style="text-align:justify">
					<div>
						<img src="<?php echo base_url().'uploads/post/original/'.$pict;?>" />
					</div>
					<div class="post-meta"> <span class="meta-date"><i class="icon-clock-alt"></i>
					<?php 
						if($update == NULL){
							$y = substr($create,0,4);
							$m = substr(date('F', mktime(0, 0, 0, substr($create,5,2), 10)),0,3);
							$d = substr($create,8,2);
							echo $d.' '.$m.','.$y;
						}else{
							$y = substr($update,0,4);
							$m = substr(date('F', mktime(0, 0, 0, substr($update,5,2), 10)),0,3);
							$d = substr($update,8,2);
							echo $d.' '.$m.','.$y;
						}
					?>
					</span> <span class="meta-author"><i class="icon-user-2"></i><a href="#"><?php echo $nick?></a></span></div>
					<p><?php echo $desc;?></p>
					<div class="post-tags"><i class="icon-tag-1"></i><a href="<?php echo base_url().'index.php/home/post/category/'.$category_id; ?>"><?php echo $category;?></a></div>
					<div class="post-navigation">
						<?php 
							if($before != '' or $before != null){
								echo '<div class="pull-left"><i class="icon-left-open"></i>&nbsp;<a href="'.base_url().'/index.php/home/post/single/'.$before.'/'.'">Previous Post</a></div>';
							}
							
							if($after != '' or $after != null){
								echo '<div class="pull-right"><a href="'.base_url().'/index.php/home/post/single/'.$after.'/'.'">Next Post</a>&nbsp;<i class="icon-right-open"></i></div>';
							}
						?>
					</div>
				</div>
			</div>
            <div class="line"></div>
            <!-- <h3>Comments (2)</h3>
            <div class="comments">
              <div class="comment">
                <div class="user_pic"><img src="img/user_pic.jpg" width="78" height="88" alt=""></div>
                <div class="username">Username </div>
                <div class="date">Sep 15, 2012 at 6:15 pm / <a href="#" class="color">Replay</a></div>
                <div class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non lorem lacinia et. Cras et ligula libero. </div>
              </div>
              <div class="comment sub">
                <div class="user_pic"><img src="img/user_pic.jpg" width="78" height="88" alt=""></div>
                <div class="username">Username </div>
                <div class="date">Sep 15, 2012 at 6:15 pm / <a href="#" class="color">Replay</a></div>
                <div class="text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non lorem lacinia et. Cras et ligula libero. </div>
              </div>
              <br>
              <br>
              <h3>ADD COMMENT</h3>
              <form action="#" method="post">
                <div class="row-fluid">
                  <div class="span6">
                    <label>Name:</label>
                    <input name="" type="text" class="full-width">
                    <label>Telephone:</label>
                    <input name="" type="text" class="full-width">
                  </div>
                  <div class="span6">
                    <label>E-Mail:</label>
                    <input name="" type="text" class="full-width">
                  </div>
                </div>
                <label>Comment:</label>
                <textarea name="" cols="1" rows="20" class="full-width"></textarea>
                <br>
                <br>
                <button name="" type="submit" class="button_form">ADD COMMENT</button>
              </form>
            </div> -->
          </div>
        </div>
        <!-- <div class="span3">
          <div class="block">
            <div class="block-title">Categories</div>
            <div class="block-content">
              <ul class="categories">
                <li><i class='icon-right-open'></i><a href="#">Web Design </a></li>
                <li><i class='icon-right-open'></i><a href="#">Wordpress Themes</a></li>
                <li><i class='icon-right-open'></i><a href="#">Animation</a></li>
                <li><i class='icon-right-open'></i><a href="#">Logo Design</a></li>
                <li><i class='icon-right-open'></i><a href="#">Photography</a></li>
              </ul>
            </div>
          </div>
          <div class="block">
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
          <div class="block">
            <div class="block-content">
              <div class="block-title">Text Widget</div>
              <p>Maecenas eu enim in lorem scelerisque auctor. Ut non erat. Suspendisse fermentum posuere lectus. Fusce vulputate nibh egestas orci. Aliquam lectus. Morbi eget dolor ullamcorper massa pellentesque sagittis. Morbi sit amet quam. </p>
            </div>
          </div>
          <div class="block">
            <div class="block-content">
              <div class="block-title">Popular Tags</div>
              <div class="tags_cloud"><a href="#">Web Developer</a> <a href="#">Branding</a> <a href="#">Wordpress</a> <a href="#">Web Design</a> <a href="#">Logo</a> <a href="#">PHP</a> <a href="#">Graphic</a> <a href="#">Competitions</a> <a href="#">Awards & Recognition</a></div>
            </div>
          </div>
          <div class="block">
            <div class="block-content">
              <div class="block-title">Latest Tweets</div>
              <div class="twit">
                <div class="icon"><i class="icon-twitter-bird"></i></div>
                <div class="mess">Nullam id justo sed diam aliquam tincidunt. Duis sollicitudin, dui ac More info at  labore <a href="#">http://t.co/f9E9cJEg </a>Thanks for the patience :)<br>
                  3 days ago </div>
              </div>
              <div class="twit">
                <div class="icon"><i class="icon-twitter-bird"></i></div>
                <div class="mess">Curabitur convallis facilisis lorem. Curabi tur quis tortordi. Maecenas tincidunt adipiscing tellus. Aliquam erat volutpat. Nulla porttitor tortor at nisl. Mauris sem ac risu magna sed <a href="#">http://t.co/VCB4tX7r</a><br>
                  3 days ago </div>
              </div>
            </div>
          </div>
          <div class="block">
            <div class="block-content">
              <div class="block-title">Features Video</div>
              <p><a href="#"><img src="img/features_video.jpg" alt="" class="full-width"></a></p>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </section>
  <div id="push"></div>