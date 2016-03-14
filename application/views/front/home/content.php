<!--CONTENT-->
  <section id="content" style="margin-top:-25px;padding-top:50px;background: url('<?php echo base_url();?>assets/theme/img/pattern.png') repeat-x scroll 0 0 white;">
	 <div class="container">
      <h1 class="padding" style="text-transform:none;">Top Sellers</h1>
      <div class="carousel es-carousel-wrapper style0">
        <div class="es-carousel">
          <div class="row">
		  <style>
			.jj2 div span a{
				background-color:transparent;
				color:transparent;
			}
			
			.jj{
				visibility:hidden
			}
			
			.jj2:hover .prod{
				visibility:visible;
				transition:all 0.5s ease-in;
				color:#fff;
				background-color:#000;
			}
			
			.jj2 .prod{
				transition:all 0.5s ease-out;
			}
			
			.jj2 a{
				transition:all 0.5s ease-out;
			}
			
			.jj2:hover a{
				color:#e87c6f;
				transition:all 0.5s ease-in;
			}
		  </style>
            <div class="product_outer carousel_items">
			  <?php 
				if($product->num_rows() == 0){
					
				}else{
					foreach($product->result() as $prd){
						echo '<div class="jj2 span3 product carousel_item" style="border-radius:0;border:none;box-shadow:none;">';
						echo '<div>';
						echo '<span>';
						echo '<a class="prod" style="position:absolute;margin-left:41%;margin-top:45%;padding:5px;text-decoration:none;z-index:99999" href="'.base_url().'index.php/home/page/product_detail/'.$prd->product_id.'">VIEW</a>';
						echo '</span>';
						echo '</div>';
						echo '<div class="product-image-wrapper onhover animate scale"><a href="'.base_url().'index.php/home/page/product_detail/'.$prd->product_id.'"><img style="width:100%" src="'.base_url().'uploads/product/original/'.$prd->product_pict.'" alt=""><img style="width:100%" src="img/product/1.png" class="roll_over_img" alt=""></a> </div>';
						echo '<div class="wrapper-hover">';
						echo '<div class="product-name" style="width:100%"><a href="'.base_url().'index.php/home/page/product_detail/'.$prd->product_id.'" style="text-decoration:none;"><h4 style="text-align:center;z-index:999999;">'.$prd->product_name.'</h4></a></div>';
                  
						echo '</div>';
						echo '</div>';
						echo '<div class="jj preview hidden-tablet hidden-phone" style="border-radius:0;border:none;box-shadow:none;">';
						echo '<div class="wrapper">';
						echo '<div class="col-1 hidden"><a href="#" data-rel="'.base_url().'uploads/product/original/'.$prd->product_pict.'" class="image"><img style="width:100%" src="'.base_url().'uploads/product/original/'.$prd->product_pict.'" alt="" class="thumb"></a> <a href="#" data-rel="'.base_url().'uploads/product/original/'.$prd->product_pict.'" class="image"><img src="'.base_url().'uploads/product/original/'.$prd->product_pict.'" alt="" class="thumb"/></a> <a href="#" data-rel="'.base_url().'uploads/product/original/'.$prd->product_pict.'" class="image"><img src="'.base_url().'uploads/product/original/'.$prd->product_pict.'" alt="" class="thumb"/></a></div>';
						echo '<div class="col-2">';
						echo '<div class="big_image"><a href="'.base_url().'index.php/home/page/product_detail/'.$prd->product_id.'"><img style="width:100%" src="<?php echo base_url();?>assets/theme/img/product/1.png" alt=""></a></div>';
						echo '<div class="wrapper-hover">';
						echo '<div class="product-name"><a href="'.base_url().'index.php/home/page/product_detail/'.$prd->product_id.'">'.$prd->product_name.'</a></div>';
						echo '<div class="wrapper"><span class="sort-rating hidden">10</span>';
						echo '<div> <a href="#" style="text-decoration:none;">Read More<i style="margin-left:10px;" class="icon-right-thin"></i></a> </div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
						echo '</div>';
					}
				}
			  ?>
   			</div>
          </div>
        </div>
      </div>
    </div>
    <div class="line"></div>
	<!--<div class="container">
      <div class="row" style="padding-top:50px;">
        <div class="span6">
          <h1 class="padding" style="text-transform:none;">Future Products</h1>
		  <div class="banners_outer" style="box-shadow:none;border:none;">
            <div class="flexslider banners" style="box-shadow:none;border:none;">
              <ul class="slides">
                <li> <a href="product.html"><img src="<?php echo base_url();?>assets/theme/img/banner/banner1.jpg" alt="" ></a> </li>
                <li> <a href="product.html"><img src="<?php echo base_url();?>assets/theme/img/banner/banner2.jpg" alt="" ></a> </li>
                <li> <a href="product.html"><img src="<?php echo base_url();?>assets/theme/img/banner/banner2.jpg" alt="" ></a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="span6">
          <h1 class="padding" style="text-transform:none;">Event & Promo</h1>
		  <div class="banners_outer" style="box-shadow:none;border:none;">
            <div class="flexslider banners" style="box-shadow:none;border:none;">
              <ul class="slides">
                <li> <a href="product.html"><img src="<?php echo base_url();?>assets/theme/img/banner/banner2.jpg" alt="" ></a> </li>
                <li> <a href="product.html"><img src="<?php echo base_url();?>assets/theme/img/banner/banner1.jpg" alt="" ></a> </li>
                <li> <a href="product.html"><img src="<?php echo base_url();?>assets/theme/img/banner/banner1.jpg" alt="" ></a> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>-->
    </section>
  <div id="push"></div>