<!--CONTENT-->
  <section id="content">
    <div class="container top">
      <div class="row">
        <div class="span12">
          <h3 style="text-transform:uppercase;">Category : <?php echo $category;?></h3>
          <div class="post-preview">
            <h3><?php echo $name;?></h3>
			<div class="row">
				<div class="span6" style="text-align:justify">
					<!--<div class="post-meta"></div>-->
					<p><?php echo $desc;?></p>
					<div class="post-tags"><i class="icon-tag-1"></i><a href="<?php echo base_url().'index.php/home/page/category/'.$category_id; ?>"><?php echo $category;?></a></div>
					<div class="post-navigation">
					  <div class="pull-left"><i class='icon-left-open'></i>&nbsp;<a href="#">Previous Post</a></div>
					  <div class="pull-right"><a href="#">Next Post</a>&nbsp;<i class='icon-right-open'></i></div>
					</div>
				</div>
				<div class="span6">
					<h2><img src="<?php echo base_url().'uploads/product/original/'.$pict;?>"/></h2>
				</div>
			</div>
            <div class="line"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="push"></div>