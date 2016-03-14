
            <div class="col-md-3 left_col" style="background-color:#2e2e2e;">
                <div class="left_col scroll-view">

                    
                    <div class="clearfix"></div>


                    <!-- menu prile quick info -->
                    <div class="profile" style="margin-top:0px;">
                        <div class="profile_info" style="width:230px;text-align:right;padding-right:25px">
                            <h2>WELCOME,</h2>
							<span>(Panel Administrator)</span>
                            <h2 style="color:#FF8BA1"><?php echo $this->session->userdata('user_nick');?></h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                            <h3>&nbsp;</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home" style="font-size:14px;"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url();?>">Home</a>
                                        </li>
                                        <li><a href="<?php echo base_url();?>">Update</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-pencil-square-o" style="font-size:14px;"></i> Posts <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url().'index.php/backend/manage_post';?>">All Posts</a>
                                        </li>
                                        <li><a href="<?php echo base_url().'index.php/backend/manage_category';?>">Post Categories</a>
                                        </li>
                                    </ul>
								</li>
                                <li><a href="<?php echo base_url().'index.php/backend/manage_page';?>"><i class="fa fa-files-o" style="font-size:14px;"></i> Pages </a></li>
                                <li><a><i class="fa fa-star" style="font-size:14px;"></i> Products <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url().'index.php/backend/manage_product';?>">All Products</a>
                                        </li>
                                        <li><a href="<?php echo base_url().'index.php/backend/manage_category_page';?>">Product Categories</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-newspaper-o" style="font-size:14px;"></i> Appearance <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url().'index.php/backend/menu';?>">Menu</a>
                                        </li>
                                        <li><a href="<?php echo base_url().'index.php/backend/banner';?>">Banners</a>
                                        </li>
                                    </ul>
                                </li>
								<li><a><i class="fa fa-gears" style="font-size:14px;"></i> Settings <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo base_url().'index.php/backend/manage_user/';?>">Users</a>
                                        </li>
                                        <li><a href="<?php echo base_url().'index.php/backend/partner/';?>">Partner</a>
                                        </li>
										<li><a href="<?php echo base_url().'index.php/backend/setting/';?>">Identity</a>
                                        </li>
										<li><a href="<?php echo base_url().'index.php/backend/contact/';?>">Contact</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>
