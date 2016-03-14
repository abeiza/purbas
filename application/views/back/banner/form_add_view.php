			<link id="base-style-responsive" href="<?php echo base_url().'assets/css/chosen.css';?>" rel="stylesheet" />
			<script src="<?php echo base_url().'assets/js/'; ?>jquery-1.7.2.min.js"></script>
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
								New Data Banner
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
                                    <h2>Form Add <small>(Form add banner)</small></h2>
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
										echo form_open_multipart('backend/banner/add/', $attributes);
									?>
										<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo validation_errors();?></span>
										<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo $this->session->flashdata('add_result');?></span>
                                       

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title Banner<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <input id="title" class="form-control col-md-7 col-xs-12" name="title" placeholder="Title Banner" required="required" type="text">
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Picture<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <input type="file" id="pict" class="form-control col-md-7 col-xs-12" name="pict">
                                            </div>
                                        </div>
										<div class="item form-group" style="margin-bottom:50px;">
											<?php //if($logo == null){?>
												<div style="height:200px;width:100%;background-color:#f1f1f1;">
													<h1 style="color:#fff;text-align:center;padding-top:7.5%">No Image</h1>
												</div>
											<?php //}else{?>
												<!--<div style="height:200px;width:100%;background-color:#f1f1f1;text-align:center;">
													<img src="<?php //echo base_url().$logo;?>"/>
												</div>-->
											<?php //}?>
										</div>
										<div class="item form-group">
                                            <label style="margin-bottom:10px;" class="control-label col-md-3 col-sm-1 col-xs-12" for="url">Link Page 
                                            </label>
											<div class="col-md-6 col-sm-12 col-xs-12">
                                                <select id="url" class="form-control col-md-7 col-xs-12" name="url">
													<option value="" disabled selected> -- Select Component Page -- </option>
													<?php 
														$query = $this->db->query("select * from purb_all_data order by data_kode");
														foreach($query->result() as $db){
															echo "<option value='".$db->data_url."'>".$db->data_kode.' - '.$db->data_title."</option>";
														}
													?>
												</select>
                                            </div>
										</div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description
                                            </label>
                                            <div class="col-md-6 col-sm-12 col-xs-12">
                                                <textarea style="height:150px;" id="desc" class="form-control col-md-7 col-xs-12" name="desc" placeholder="Desc. Banner . . ."></textarea>
                                            </div>
                                        </div>
										
										
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <a href="<?php echo base_url().'index.php/backend/banner/';?>"><button type="button" class="btn btn-primary">Cancel</button></a>
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
