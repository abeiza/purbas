				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

				<script type="text/javascript">
				var peta;
				var koorAwal = new google.maps.LatLng(-6.257737483553622, 106.77751957671717);
				function peta_awal(){
					loadDataLokasiTersimpan();
					var settingpeta = {
						zoom:18,
						center: koorAwal,
						mapTypeId: google.maps.MapTypeId.ROADMAP 
						};
					peta = new google.maps.Map(document.getElementById("canvas-peta"),settingpeta);
					google.maps.event.addListener(peta,'click',function(event){
						tandai(event.latLng);
					});
				}

				function tandai(lokasi){
					$("#lat").val(lokasi.lat());
					$("#long").val(lokasi.lng());
					tanda = new google.maps.Marker({
						position: lokasi,
						map: peta
					});
				}

				$(document).ready(function(){
				   peta_awal();
				});


				function loadDataLokasiTersimpan(){
					$('#kordinattersimpan').load('tampilkan_lokasi_tersimpan.php');
				}
				setInterval (loadDataLokasiTersimpan, 3000);

				function carikordinat(lokasi){
					var settingpeta = {
						zoom: 10,
						center: lokasi,
						mapTypeId: google.maps.MapTypeId.ROADMAP 
						};
					peta = new google.maps.Map(document.getElementById("canvas-peta"),settingpeta);
					tanda = new google.maps.Marker({
						position: lokasi,
						map: peta
					});
					google.maps.event.addListener(tanda, 'click', function() {
					  infowindow.open(peta,tanda);
					});
					google.maps.event.addListener(peta,'click',function(event){
						tandai(event.latLng);
					});
				}


				function gantipeta(){
					loadDataLokasiTersimpan();
					var isi = document.getElementById('cmb').value;
					if(isi=='1')
					{
					var settingpeta = {
						zoom: 10,
						center: koorAwal,
						mapTypeId: google.maps.MapTypeId.ROADMAP
						};
					}
					else if(isi=='2')
					{
					var settingpeta = {
						zoom: 10,
						center: koorAwal,
						mapTypeId: google.maps.MapTypeId.TERRAIN 
						};
					}
					else if(isi=='3')
					{
					var settingpeta = {
						zoom: 10,
						center: koorAwal,
						mapTypeId: google.maps.MapTypeId.SATELLITE  
						};
					}
					else if(isi=='4')
					{
					var settingpeta = {
						zoom: 10,
						center: koorAwal,
						mapTypeId: google.maps.MapTypeId.HYBRID  
						};
					}
					peta = new google.maps.Map(document.getElementById("canvas-peta"),settingpeta);
					google.maps.event.addListener(peta,'click',function(event){
						tandai(event.latLng);
					});
				}

				</script>
			<!-- page content -->
            <!-- page content -->
            <div class="right_col" role="main">

                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
								Web Contact
							</h3>
							<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo validation_errors();?></span>
							<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo $this->session->flashdata('edit_result');?></span>
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
					<?php 
					$attributes = array('' => 'novalidate');
					echo form_open('backend/contact/update_act',$attributes);
					?>
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Update <small>(Form Update Contact)</small></h2>
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
										
                                        <span class="section">Website Contact</span>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Email
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="email" name="email" class="form-control col-md-7 col-xs-12" placeholder="Email" value="<?php echo $email;?>">
												<span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone 1 </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="phone1" id="phone1" class="form-control" data-inputmask="'mask' : '(999) 999-9999'" value="<?php echo $phone1;?>">
                                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Phone 2 </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="phone2" id="phone2" class="form-control" data-inputmask="'mask' : '(999) 999-9999'" value="<?php echo $phone2;?>">
                                                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">No Fax</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" name="fax" id="fax" class="form-control" data-inputmask="'mask' : '(999) 999-9999'" value="<?php echo $fax;?>">
                                                <span class="fa fa-fax form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-3">Address</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea name="address" id="address" style="height:200px;" class="form-control"><?php echo $address;?></textarea>
                                                <span class="fa fa-home form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Update <small>(Form Update Sosmed)</small></h2>
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
										
                                        <span class="section">Website Social Media</span>

                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Facebook
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="facebook" name="facebook" class="form-control col-md-7 col-xs-12" placeholder="Url Facebook" value="<?php echo $facebook;?>">
												<span class="fa fa-facebook form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Twitter
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="twitter" name="twitter" class="form-control col-md-7 col-xs-12" placeholder="Url Twitter" value="<?php echo $twitter;?>">
												<span class="fa fa-twitter form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Youtube
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="youtube" name="youtube" class="form-control col-md-7 col-xs-12" placeholder="Url Youtube" value="<?php echo $youtube;?>">
												<span class="fa fa-youtube form-control-feedback right" aria-hidden="true"></span>
                                            </div>
                                        </div>
										<div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Linked In
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="text" id="linkedin" name="linkedin" class="form-control col-md-7 col-xs-12" placeholder="Url Linked In" value="<?php echo $linkedin;?>">
												<span class="fa fa-linkedin form-control-feedback right" aria-hidden="true"></span>
                                            </div>
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
									<h2>Form Update <small>(Form Update Location)</small></h2>
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
									
									<span class="section">Company Location</span>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Longitude Point
										</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" id="long" readonly name="long" class="form-control col-md-7 col-xs-12" placeholder="Longitude"  value="<?php echo $long;?>">
											<span class="fa fa-crosshairs form-control-feedback right" aria-hidden="true"></span>
										</div>
									</div>
									<div class="item form-group">
										<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Lattitude Point
										</label>
										<div class="col-md-9 col-sm-9 col-xs-12">
											<input type="text" id="lat" readonly name="lat" class="form-control col-md-7 col-xs-12" placeholder="Lattitude" value="<?php echo $lat;?>">
											<span class="fa fa-crosshairs form-control-feedback right" aria-hidden="true"></span>
										</div>
									</div>
									<div class="item form-group">
										<div style="height:300px;width:100%;background-color:#f1f1f1;">
											<div id="canvas-peta" style="width:100%; float:left; height:100%;"></div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-3">
											<a href="<?php echo base_url().'index.php/backend/login/';?>"><button type="button" class="btn btn-primary">Cancel</button></a>
											<button id="send" type="submit" class="btn btn-success">Submit</button>
										</div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
				<?php echo form_close();?>
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
	<script src="<?php echo base_url().'assets/theme/backend/';?>js/input_mask/jquery.inputmask.js"></script>
	<!-- input_mask -->
    <script>
        $(document).ready(function () {
            $(":input").inputmask();
        });
    </script>
    <!-- /input mask -->
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
