<div id="header" style="padding:0px;background-color:#fefefe">
    <div id="spy" class="visible-desktop" style="opacity:0.9">
      <div class="container">
        <div class="row">
          <div class="span12" style="position:absolute;margin-top:10px;">
            <nav></nav>
          </div>
          <div class="spy-left">
            <div class="spy_logo"> <a href="#" class="logo_inner"><img src="<?php echo base_url().'uploads/logo/'.$logo;?>" width="100" style="margin-top:40px;" alt=""></a></div>
          </div>
          <div class="spy-right">
            <div class="spyshop_search" style="margin-top:60px;">
              <form class="form-search" id="form-search-spy">
                <input type="text" style="background:transparent;box-shadow:none;border-top:none;border-left:none;border-right:none;border-radius:0;border-bottom:1px solid #e1e1e1;"class="search-query" value="search here..." onblur="if (this.value == '') {this.value = 'search here...';}" onfocus="if(this.value == 'search here...') {this.value = '';}">
                <button style="color:#e1e1e1;background-color:transparent" type="submit" class="btn" onclick="document.getElementById('form-search').submit()"><i class="icon-search-2 icon-large"></i></button>
              </form>
            </div>
            <div class="spyshop"> </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="">
        <div id="logo"> <a href="index.html" class="logo_inner"><img src="<?php echo base_url().'uploads/logo/'.$logo;?>" width="100" alt=""></a> </div>
        <div class="pull-right padding-1" style="margin-top:10px;">
          <div class="form-search-wrapper">
            <div id="search">
              <form class="form-search" id="form-search">
                <input type="text" style="background:transparent;width:200px;box-shadow:none;border-top:none;border-left:none;border-right:none;border-radius:0;border-bottom:1px solid #e1e1e1;" class="search-query" value="search..." onblur="if (this.value == '') {this.value = 'search...';}" onfocus="if(this.value == 'search...') {this.value = '';}">
                <button style="color:#e1e1e1;background-color:transparent" type="submit" class="btn" onClick="document.getElementById('form-search').submit()"><i class="icon-search-2 icon-large"></i></button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <div class="" style="margin-top:30px;">
		  <nav> 
            <!--MENU-->
			<!--<span style="margin:0px;margin-left:0px;font-family:'lato';font-size:12px;font-weight:900;color:#eb028a;">KECANTIKAN YANG BERSUMBER DARI ALAM</span>-->
            <div id="megamenu" style="margin-top:0px;">
              <ul id="nav" style="margin:0px">
                <!--<li class="li-first-home dropdown"> <a href="index.html"><i class="icon-home"></i></a> </li>-->
				<?php 
					if($menu->num_rows() == 0){
						
						
					}else{
						foreach($menu->result() as $db){
							echo '<li class="level0 parent dropdown"> <a href="'.$db->menu_url.'" class="over"> <span>'.$db->menu_name.'</span> </a>';
							$query = $this->db->query("select * from purb_menu_header where id_menu='".$db->menu_id."' order by menu_header_id");
							if($query->num_rows() != 0){
								echo '<ul class="level0">
										<ul class="shadow">
										  <li class="row_middle">
											<ul class="rows_outer">
											  <li>
												<ul class="menu_row">
												  ';
								foreach($query->result() as $header){
									echo '<li class="col"  style="float:left;padding:20px 0px;">
													<ul>';
									echo '<li class="level1 nav-5-1 first parent title"> <a href="#" style="font-size:14px;font-weight:bold;">'.$header->menu_header_label.'</a> </li>';
										$query2 = $this->db->query("select * from purb_menu_detail where menu_header='".$header->menu_header_id."' order by menu_detail_id");
											foreach($query2->result() as $sub){
												echo '<li class="level2 nav-5-1-1 first"> <a href="'.$sub->menu_detail_url.'"> '.$sub->menu_detail_label.' </a> </li>';
											}
									echo '</ul>
												</li>';
								}
											  echo '
											</ul>
										</li>
									</ul>
								</li>
								</ul>
								</ul>';
							}
							echo '</li>';
						}
						
					}
				?>
                <!--<li class="level0 nav-4 first parent over dropdown"> <a href="listing_usual.html" class="over"> <span>HOME</span> </a>
                </li>
                <li class="level0 nav-4 parent dropdown"> <a href="listing_usual.html" class="over"> <span>ABOUT US</span> </a>
                </li>
 				<li class="level0 nav-5 parent dropdown"> <a href="listing_usual.html" class=""> <span>PRODUCTS</span> </a>
                  <ul class="level0">
                    <ul class="shadow">
                      <li class="row_middle">
                        <ul class="rows_outer">
                          <li>
                            <ul class="menu_row">
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-1 first parent title"> <a href="listing_usual.html"> Purbasari </a> </li>
                                  <li class="level2 nav-5-1-1 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-1-2"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-1-3"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-1-4"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-1-5"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                  <li class="level2 nav-5-1-6"> <a href="listing_usual.html"> Empty category #6 </a> </li>
                                  <li class="level2 nav-5-1-7 last"> <a href="listing_usual.html"> Empty category #7 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-2 parent title"> <a href="listing_usual.html"> Purbasari </a> </li>
                                  <li class="level2 nav-5-2-8 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-2-9"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-2-10"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-2-11"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-2-12"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                  <li class="level2 nav-5-2-13 last"> <a href="listing_usual.html"> Empty category #6 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-3 parent title"> <a href="listing_usual.html"> Purbasari </a> <span class="hot"> Any title! </span> </li>
                                  <li class="level2 nav-5-3-14 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-3-15"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-3-16"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-3-17"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-3-18 last"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-4 parent title"> <a href="listing_usual.html"> Purbasari </a> </li>
                                  <li class="level2 nav-5-4-19 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-4-20"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-4-21"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-4-22 last"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-5 parent title"> <a href="listing_usual.html"> Purbasari </a> <span class="hot"> -50% </span> </li>
                                  <li class="level2 nav-5-5-23 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-5-24"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-5-25 last"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-6 parent title"> <a href="listing_usual.html"> Purbasari </a> </li>
                                  <li class="level2 nav-5-6-26 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-6-27 last"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <!--<li>
                            <ul class="menu_row">
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-7 parent title"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-7-28 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-7-29 last"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-8 parent title"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-8-30 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-8-31"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-8-32 last"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-9 parent title"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-9-33 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-9-34"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-9-35"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-9-36 last"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-10 parent title"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-10-37 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-10-38"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-10-39"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-10-40"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-10-41 last"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-11 parent title"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                  <li class="level2 nav-5-11-42 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-11-43"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-11-44"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-11-45"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-11-46"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                  <li class="level2 nav-5-11-47 last"> <a href="listing_usual.html"> Empty category #6 </a> </li>
                                </ul>
                              </li>
                              <li class="col">
                                <ul>
                                  <li class="level1 nav-5-12 last parent title"> <a href="listing_usual.html"> Empty category #6 </a> </li>
                                  <li class="level2 nav-5-12-48 first"> <a href="listing_usual.html"> Empty category #1 </a> </li>
                                  <li class="level2 nav-5-12-49"> <a href="listing_usual.html"> Empty category #2 </a> </li>
                                  <li class="level2 nav-5-12-50"> <a href="listing_usual.html"> Empty category #3 </a> </li>
                                  <li class="level2 nav-5-12-51"> <a href="listing_usual.html"> Empty category #4 </a> </li>
                                  <li class="level2 nav-5-12-52"> <a href="listing_usual.html"> Empty category #5 </a> </li>
                                  <li class="level2 nav-5-12-53"> <a href="listing_usual.html"> Empty category #6 </a> </li>
                                  <li class="level2 nav-5-12-54 last"> <a href="listing_usual.html"> Empty category #7 </a> </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li class="row_bot"><span class=" inside"><i class="icon-gift"></i><a href="#">Gifts                      Exclusive</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-briefcase"></i><a href="#">offers</a></span></li>
                    </ul>
                  </ul>
                </li>
                <li id="menu_custom_block" class="level0 nav-6 last parent dropdown"> <a href="listing_usual.html" class=""> <span>EVENTS AND PROMO</span> </a>
                  <ul class="level0">
                    <li>
                      <div class="menu_custom_block">
                        <div class="shadow">
                          <div class="col-third"><img src="img/blog_img_small.jpg" alt="">
                            <p>This is a HTML block; you can create it via admin panel. There are many blocks like this on site. They are created especially to set to everybody's preferences. If you have any questions please make a request via our <a href="#">contact form</a></p>
                          </div>
                          <div class="col-third"><img src="img/blog_img_small-05.jpg" alt="">
                            <p>This is a HTML block; you can create it via admin panel. There are many blocks like this on site. They are created especially to set to everybody's preferences. If you have any questions please make a request via our <a href="#">contact form</a></p>
                          </div>
                          <div class="col-third"><img src="img/blog_img_small-07.jpg" alt="">
                            <p>This is a HTML block; you can create it via admin panel. There are many blocks like this on site. They are created especially to set to everybody's preferences. If you have any questions please make a request via our <a href="contact.html">contact form</a></p>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
   			    </li>--
                
                <!--#1 DUPLICATE THIS SECTION IF YOU WANT MORE CUSTOM MENU ITEMS--
                <li id="menu_custom_block" class="level0 nav-2 level-top first parent dropdown"> <a href="blog_listing_view.html" class="level-top"> <span>CONTACT US</span> </a>
                </li>-->
                <!--end #1--> 
              </ul>
            </div>
            <!--MENU--> 
          </nav>
			<div class="row">
				<div class="span12">
				  <nav>
					<ul class="nav nav-list">
					  <li class="nav-header"><a href="#level1" title="" data-toggle="collapse" class="collapsed"><i class="icon-th"></i>&nbsp;&nbsp;MENU <i class="icon-up pull-right"></i><i class="icon-down pull-right"></i> </a>
						<ul class="collapse in" id="level1">
							<?php 
								foreach($menu->result() as $db){
									echo '<li class="level0"> <a href="listing_usual.html"> <span>'.$db->menu_name.'</span> </a> <a class="icon-collapse collapsed" href="#level29" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>';
									echo	'<ul class="level0 collapse in" id="level29">';
									$que = $this->db->query("select * from purb_menu_header where id_menu='".$db->menu_id."' order by menu_header_id");
										if($query->num_rows() != 0){
											foreach($query->result() as $header){
											echo	'<li class="level1 nav-3-1 first parent"> <a href="listing_usual.html"> <span>'.$header->menu_header_label.'</span> </a> <a class="icon-collapse collapsed" href="#level25" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a';
											echo	'<ul class="level1 collapse in" id="level25">';
											$que2 = $this->db->query("select * from purb_menu_detail where menu_header='".$header->menu_header_id."' order by menu_detail_id");
											foreach($query2->result() as $sub){
												 echo	'<li class="level2 nav-3-1-1 first"> <a href="listing_usual.html"> <span>'.$sub->menu_detail_label.'</span> </a> </li>';
											}
											echo	'</ul>';
											echo	'</li';
											}
										}
										echo	'</ul>';
									echo	'</li>';
								}
							?>
						<!--  <li class="level0"> <a href="listing_usual.html"> <span>Women</span> </a> <a class="icon-collapse collapsed" href="#level11" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
							<ul class="level0 collapse in" id="level11">
							  <li class="level1 nav-1-1 first parent"> <a href="listing_usual.html.html"> <span>Dresses</span> </a> <a class="icon-collapse collapsed" href="#level3" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level3">
								  <li class="level2 nav-1-1-1 first parent"> <a href="listing_usual.html"> <span>Club Dresses</span> </a> <a class="icon-collapse collapsed" href="#level2" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
									<ul class="level2 collapse in" id="level2">
									  <li class="level3 nav-1-1-1-1 first"> <a href="listing_usual.html"> <span>Mini dress</span> </a> </li>
									  <li class="level3 nav-1-1-1-2"> <a href="listing_usual.html"> <span>Midi dress</span> </a> </li>
									  <li class="level3 nav-1-1-1-3 last"> <a href="listing_usual.html"> <span>Maxi dress</span> </a> </li>
									</ul>
								  </li>
								  <li class="level2 nav-1-1-2"> <a href="listing_usual.html"> <span>Evening Dresses</span> </a> </li>
								  <li class="level2 nav-1-1-3 last"> <a href="listing_usual.html"> <span>Prom Dresses</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-2 parent"> <a href="listing_usual.html"> <span>Shirts</span> </a> <a class="icon-collapse collapsed" href="#level4" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level4">
								  <li class="level2 nav-1-2-4 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-1-2-5"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-1-2-6 last"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-3 parent"> <a href="listing_usual.html"> <span>Coats</span> </a> <a class="icon-collapse collapsed" href="#level5" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level5">
								  <li class="level2 nav-1-3-7 first"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-1-3-8"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								  <li class="level2 nav-1-3-9 last"> <a href="listing_usual.html"> <span>Empty category #6</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-4 parent"> <a href="listing_usual.html"> <span>Jackets</span> </a> <a class="icon-collapse collapsed" href="#level6" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level6">
								  <li class="level2 nav-1-4-10 first"> <a href="listing_usual.html"> <span>Empty category #7</span> </a> </li>
								  <li class="level2 nav-1-4-11"> <a href="listing_usual.html"> <span>Empty category #8</span> </a> </li>
								  <li class="level2 nav-1-4-12 last"> <a href="listing_usual.html"> <span>Empty category #9</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-5 parent"> <a href="listing_usual.html"> <span>Shorts</span> </a> <a class="icon-collapse collapsed" href="#level7" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level7">
								  <li class="level2 nav-1-5-13 first"> <a href="listing_usual.html"> <span>Empty category #10</span> </a> </li>
								  <li class="level2 nav-1-5-14"> <a href="listing_usual.html"> <span>Empty category #11</span> </a> </li>
								  <li class="level2 nav-1-5-15 last"> <a href="listing_usual.html"> <span>Empty category #12</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-6 parent"> <a href="listing_usual.html"> <span>Jeans</span> </a> <a class="icon-collapse collapsed" href="#level8" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level8">
								  <li class="level2 nav-1-6-16 first"> <a href="listing_usual.html"> <span>Empty category #13</span> </a> </li>
								  <li class="level2 nav-1-6-17"> <a href="listing_usual.html"> <span>Empty category #14</span> </a> </li>
								  <li class="level2 nav-1-6-18 last"> <a href="listing_usual.html"> <span>Empty category #15</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-7 parent"> <a href="listing_usual.html"> <span>Skirts</span> </a> <a class="icon-collapse collapsed" href="#level9" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level9">
								  <li class="level2 nav-1-7-19 first"> <a href="listing_usual.html"> <span>Empty category #16</span> </a> </li>
								  <li class="level2 nav-1-7-20 last"> <a href="listing_usual.html"> <span>Empty category #17</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-8 parent"> <a href="listing_usual.html"> <span>Lingerie</span> </a> <a class="icon-collapse collapsed" href="#level10" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level10">
								  <li class="level2 nav-1-8-21 first"> <a href="listing_usual.html"> <span>Empty category #18</span> </a> </li>
								  <li class="level2 nav-1-8-22"> <a href="listing_usual.html"> <span>Empty category #19</span> </a> </li>
								  <li class="level2 nav-1-8-23 last"> <a href="listing_usual.html"> <span>Empty category #20</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-1-9"> <a href="listing_usual.html"> <span>Tops</span> </a> </li>
							  <li class="level1 nav-1-10"> <a href="listing_usual.html"> <span>Empty category #21</span> </a> </li>
							  <li class="level1 nav-1-11"> <a href="listing_usual.html"> <span>Empty category #22</span> </a> </li>
							  <li class="level1 nav-1-12 last"> <a href="listing_usual.html"> <span>Empty category #23</span> </a> </li>
							</ul>
						  </li>
						  <li class="level0"> <a href="listing_usual.html"> <span>Men</span> </a> <a class="icon-collapse collapsed" href="#level24" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
							<ul class="level0 collapse in" id="level24">
							  <li class="level1 nav-2-1 first parent"> <a href="listing_usual.html"> <span>Polo Shirts</span> </a> <a class="icon-collapse collapsed" href="#level12" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level12">
								  <li class="level2 nav-2-1-1 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-1-2"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-1-3"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-1-4"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-2-1-5"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								  <li class="level2 nav-2-1-6"> <a href="listing_usual.html"> <span>Empty category #6</span> </a> </li>
								  <li class="level2 nav-2-1-7 last"> <a href="listing_usual.html"> <span>Empty category #7</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-2 parent"> <a href="listing_usual.html"> <span>Shirts</span> </a> <a class="icon-collapse collapsed" href="#level13" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level13">
								  <li class="level2 nav-2-2-8 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-2-9"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-2-10"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-2-11"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-2-2-12"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								  <li class="level2 nav-2-2-13 last"> <a href="listing_usual.html"> <span>Empty category #6</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-3 parent"> <a href="listing_usual.html"> <span>Jumpers</span> </a> <a class="icon-collapse collapsed" href="#level14" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level14">
								  <li class="level2 nav-2-3-14 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-3-15"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-3-16"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-3-17"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-2-3-18 last"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-4 parent"> <a href="listing_usual.html"> <span>Jeans</span> </a> <a class="icon-collapse collapsed" href="#level15" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level15">
								  <li class="level2 nav-2-4-19 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-4-20"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-4-21"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-4-22 last"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-5 parent"> <a href="listing_usual.html"> <span>Jackets</span> </a> <a class="icon-collapse collapsed" href="#level16" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level16">
								  <li class="level2 nav-2-5-23 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-5-24"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-5-25 last"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-6 parent"> <a href="listing_usual.html"> <span>Shorts</span> </a> <a class="icon-collapse collapsed" href="#level17" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level17">
								  <li class="level2 nav-2-6-26 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-6-27 last"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-7 parent"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> <a class="icon-collapse collapsed" href="#level18" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level18">
								  <li class="level2 nav-2-7-28 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-7-29 last"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-8 parent"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> <a class="icon-collapse collapsed" href="#level19" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level19">
								  <li class="level2 nav-2-8-30 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-8-31"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-8-32 last"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-9 parent"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> <a class="icon-collapse collapsed" href="#level20" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level20">
								  <li class="level2 nav-2-9-33 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-9-34"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-9-35"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-9-36 last"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-10 parent"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> <a class="icon-collapse collapsed" href="#level21" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level21">
								  <li class="level2 nav-2-10-37 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-10-38"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-10-39"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-10-40"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-2-10-41 last"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-11 parent"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> <a class="icon-collapse collapsed" href="#level22" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level22">
								  <li class="level2 nav-2-11-42 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-11-43"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-11-44"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-11-45"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-2-11-46"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								  <li class="level2 nav-2-11-47 last"> <a href="listing_usual.html"> <span>Empty category #6</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-2-12 last parent"> <a href="listing_usual.html"> <span>Empty category #6</span> </a> <a class="icon-collapse collapsed" href="#level23" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level23">
								  <li class="level2 nav-2-12-48 first"> <a href="listing_usual.html"> <span>Empty category #1</span> </a> </li>
								  <li class="level2 nav-2-12-49"> <a href="listing_usual.html"> <span>Empty category #2</span> </a> </li>
								  <li class="level2 nav-2-12-50"> <a href="listing_usual.html"> <span>Empty category #3</span> </a> </li>
								  <li class="level2 nav-2-12-51"> <a href="listing_usual.html"> <span>Empty category #4</span> </a> </li>
								  <li class="level2 nav-2-12-52"> <a href="listing_usual.html"> <span>Empty category #5</span> </a> </li>
								  <li class="level2 nav-2-12-53"> <a href="listing_usual.html"> <span>Empty category #6</span> </a> </li>
								  <li class="level2 nav-2-12-54 last"> <a href="listing_usual.html"> <span>Empty category #7</span> </a> </li>
								</ul>
							  </li>
							</ul>
						  </li>
						  <li class="level0"> <a href="listing_usual.html"> <span>Others</span> </a> <a class="icon-collapse collapsed" href="#level29" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
							<ul class="level0 collapse in" id="level29">
							  <li class="level1 nav-3-1 first parent"> <a href="listing_usual.html"> <span>Electronics</span> </a> <a class="icon-collapse collapsed" href="#level25" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level25">
								  <li class="level2 nav-3-1-1 first"> <a href="listing_usual.html"> <span>Cell Phones</span> </a> </li>
								  <li class="level2 nav-3-1-2"> <a href="listing_usual.html"> <span>Cameras</span> </a> </li>
								  <li class="level2 nav-3-1-3"> <a href="listing_usual.html"> <span>Computers</span> </a> </li>
								  <li class="level2 nav-3-1-4 last"> <a href="listing_usual.html"> <span>Empty</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-3-2 parent"> <a href="listing_usual.html"> <span>Apparel</span> </a> <a class="icon-collapse collapsed" href="#level26" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level26">
								  <li class="level2 nav-3-2-5 first"> <a href="listing_usual.html"> <span>Shirts</span> </a> </li>
								  <li class="level2 nav-3-2-6"> <a href="listing_usual.html"> <span>Shoes</span> </a> </li>
								  <li class="level2 nav-3-2-7"> <a href="listing_usual.html"> <span>Hoodies</span> </a> </li>
								  <li class="level2 nav-3-2-8 last"> <a href="listing_usual.html"> <span>Empty</span> </a> </li>
								</ul>
							  </li>
							  <li class="level1 nav-3-3 last parent"> <a href="listing_usual.html"> <span>Test Category (lvl 2)</span> </a> <a class="icon-collapse collapsed" href="#level28" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
								<ul class="level1 collapse in" id="level28">
								  <li class="level2 nav-3-3-9 first last parent"> <a href="listing_usual.html"> <span>Test Category (lvl 3)</span> </a> <a class="icon-collapse collapsed" href="#level27" title="" data-toggle="collapse"><i class="icon-up pull-right"></i><i class="icon-down pull-right"></i></a>
									<ul class="level2 collapse in" id="level27">
									  <li class="level3 nav-3-3-9-1 first last"> <a href="listing_usual.html"> <span>Test Category (lvl 4)</span> </a> </li>
									</ul>
								  </li>
								</ul>
							  </li>
							</ul>
						  </li>
						-->
						</ul>
					  </li>
					</ul>
				  </nav>
				</div>
			</div>
		</div>
      </div>
    </div>
  </div>
 