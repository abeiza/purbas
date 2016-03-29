			<script type="text/javascript" src="<?php echo base_url(); ?>assets/theme/backend/ckeditor/ckeditor.js"></script>
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
								New Data Product
							</h3>
                        </div>

                        <!--<div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
										<button class="btn btn-default" type="button">Go!</button>
									</span>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Add <small>(Form add product)</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

									<?php 
										$attributes = array('class' => 'form-horizontal form-label-left', '' => 'novalidate');
										echo form_open_multipart('backend/manage_product/add/', $attributes);
									?>
									<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo validation_errors();?></span>
									<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo $this->session->flashdata('add_result');?></span>
								   

									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<input id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="Product Name" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="code">Product Code Principle <span class="required">*</span>
										</label>
										<div class="col-md-5 col-sm-12 col-xs-12">
											<input id="code" class="form-control col-md-7 col-xs-12" name="code" placeholder="Code Principle" required="required" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="pict">Picture 
										</label>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<input id="pict" class="form-control col-md-7 col-xs-12" name="pict" placeholder="Thumbnail Pict" type="file">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Category <span class="required">*</span>
										</label>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<select id="category" class="form-control col-md-7 col-xs-12" name="category">
												<option value="" disabled selected> -- Select Category -- </option>
												<?php 
													foreach($category->result() as $db){
														echo "<option value='".$db->category_id."'>".$db->category_name."</option>";
													}
												?>
											</select>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="promo">Promo
										</label>
										<div class="col-md-6 col-sm-12 col-xs-12">
											<input id="promo" class="form-control col-md-7 col-xs-12" name="promo" placeholder="Promotion / Discount" type="text">
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Product Type
										</label>
										<div class="col-md-3 col-sm-3 col-xs-12">
											<select id="type" class="form-control col-md-7 col-xs-12" name="type">
												<option value="" disabled selected> -- Select Type -- </option>
												<option value="1" > New </option>
												<option value="" selected> Regular </option>
											</select>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Status <span class="required">*</span>
										</label>
										<div class="col-md-3 col-sm-12 col-xs-12">
											<select id="status" class="form-control col-md-7 col-xs-12" name="status">
												<option value="" disabled selected> -- Select Category -- </option>
												<option value="posting"> Publish </option>
												<option value="draft"> Save Post / Draft </option>
												<option value="trash"> Trash </option>
											</select>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Editor <small>(Form Description for product)</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
									<div class="form-horizontal form-label-left">
									<div class="item form-group">
										<label style="margin-bottom:10px;" class="control-label col-md-1 col-sm-1 col-xs-12" for="desc">Description<span class="required">*</span>
										</label>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<textarea style="height:150px;" id="desc" class="form-control col-md-7 col-xs-12" name="desc" placeholder="Short Description" required></textarea>
											<script>CKEDITOR.replace('desc');</script>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<a href="<?php echo base_url().'index.php/backend/manage_product/';?>"><button type="button" class="btn btn-primary">Cancel</button></a>
											<button id="send" type="submit" class="btn btn-success">Submit</button>
										</div>
									</div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
                </div>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">Content Management System |
                            <span class="lead"> Develop by Evan Abeiza</span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
	<script src="<?php echo base_url().'assets/theme/backend/';?>js/validator/validator.js"></script>
    <script>
        // initialize the validator function
        validator.message['date'] = 'not a real date';

        // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
        $('form')
            .on('blur', 'input[required], input.optional, select.required', validator.checkField)
            .on('change', 'select.required', validator.checkField)
            .on('keypress', 'input[required][pattern]', validator.keypress);

        $('.multi.required')
            .on('keyup blur', 'input', function () {
                validator.checkField.apply($(this).siblings().last()[0]);
            });

        // bind the validation to the form submit event
        //$('#send').click('submit');//.prop('disabled', true);

        $('form').submit(function (e) {
            e.preventDefault();
            var submit = true;
            // evaluate the form using generic validaing
            if (!validator.checkAll($(this))) {
                submit = false;
            }

            if (submit)
                this.submit();
            return false;
        });

        /* FOR DEMO ONLY */
        $('#vfields').change(function () {
            $('form').toggleClass('mode2');
        }).prop('checked', false);

        $('#alerts').change(function () {
            validator.defaults.alerts = (this.checked) ? false : true;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
