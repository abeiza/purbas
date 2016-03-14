<!--CONTENT-->
  <section id="content">
    <div class="container top">
      <div class="row">
        <div class="span12">
			<?php 
				if(substr($this->uri->segment(4),0,3) != "CTR"){
					echo '<h1>CATALOGUE PRODUCT</h1>';
				}else{
					echo '<h1>CATALOGUE PRODUCT ('.$category_name.')</h1>';
				} 
			?>
		</div>
      </div>
      <div class="listing_header_row1">
        <div class="pull-left" style="margin-top:20px;">
          <label>Sort by:</label>
          <div class="select_wrapper width1">
            <select name="select3" class="custom sort-by" tabindex="1">
                  <option value="position">Position</option>
                  <option value="name">Name</option>
                  <option value="price">Price</option>
                  <option value="rating">Rating</option>
            </select>
          </div>
        </div>
        <div class="pull-right alignright">
		  <?php echo $paging;?>
		</div>
      </div>
      <div class="line1"></div>
      <div class="row">
        <div class="span12">
          <h3>Listing</h3>
          <div class="row big_with_description isotope-outer">
			<?php 
				if($product->num_rows() == 0){
					echo '<h5 style="text-align:center;">Catalogue (Product) is Not Available</h5>';
				}else{
					foreach($product->result() as $prd){
						?>
							<div class="span3 product "><span class="sort-rating hidden">9</span><span class="sort-price hidden">89</span>
							  <div class="product-image-wrapper animate scale"> <div class="label_new_top_left">New</div>
							  <div class="sale_discount img-rounded" style="padding:0px 5px;">Disc 50%</div>
								<a href="<?php echo base_url().'index.php/home/page/product_detail/'.$prd->product_id;?>"><img src="<?php echo base_url().$prd->product_thumb_pict;?>" alt=""><img src="<?php echo base_url().$prd->product_thumb_pict;?>" class="roll_over_img" alt=""></a> </div>
							  <div class="wrapper-hover">
								<div class="product-name"><a href="<?php echo base_url().'index.php/home/page/product_detail/'.$prd->product_id;?>" style="text-decoration:none;text-align:center;"><h4><?php echo $prd->product_name;?></h4></a></div>
							  </div>
							</div>
						<?php
					}
				}
			?>
          </div>
        </div>
      </div>
      <div class="listing_header_row1">
        <div class="pull-left" style="margin-top:20px;">
          <label>Sort by:</label>
          <div class="select_wrapper width1">
            <select name="select1" class="custom sort-by" tabindex="1">
                  <option value="position">Position</option>
                  <option value="name">Name</option>
                  <option value="price">Price</option>
                  <option value="rating">Rating</option>
            </select>
          </div>
        </div>
		<div class="pull-right alignright">
		  <?php echo $paging;?>
		</div>
      </div>
      <div class="line1"></div>
    </div>
  </section>
  <div id="push"></div>