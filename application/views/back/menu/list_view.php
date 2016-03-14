<!-- page content -->
			<link href="<?php echo base_url().'assets/theme/backend/'?>css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
           <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>
								Menu Setting
								<small>
									Some examples to get you started
								</small>
							</h3>
                        </div>

                    <!--<div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                
                            </div>
                        </div>-->
                    </div>
                    <div class="clearfix"></div>
					<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo $this->session->flashdata('modify_result');?></span>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>All Data Menu <small>(List Data Main Menu)</small></h2>
                                    <div class="input-group" style="float:right;">
										<a href="<?php echo base_url().'index.php/backend/menu/form_add/';?>"><button type="button" class="btn btn-primary">Add Main Menu</button></a>
									</div>
									<div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
												<th></th>
                                                <th>Menu Label </th>
                                                <th style="text-align:center;vertical-align:inherit">Menu Remark </th>
												<th style="text-align:center;vertical-align:inherit">Menu URL </th>
                                                <th style="text-align:center;vertical-align:inherit" class=" no-link last"><span class="nobr">Action</span>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
											<?php 
												if($menu->num_rows() == 0){
													
												}else{
													foreach($menu->result() as $db){
														echo '<tr class="even pointer">';
														echo '<td class=" "></td>';
														echo '<td class=" ">'.$db->menu_name.'</td>';
														echo '<td class=" ">'.$db->menu_remark.'</td>';
														echo '<td class=" ">'.$db->menu_url.'</td>';
														
														echo '<td class=" last"><a style="margin:0px 5px;" href="'.base_url().'index.php/backend/menu/form_edit/'.$db->menu_id.'">Edit</a><a style="margin:0px 5px;" href="'.base_url().'index.php/backend/menu/submenu/'.$db->menu_id.'">Add Submenu</a><a style="margin:0px 5px;" href="'.base_url().'index.php/backend/menu/delete/'.$db->menu_id.'">Delete</a>';
														echo '</tr>';
													}
												}
											
											?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <br />
                        <br />
                        <br />

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
                 
                    
            </div>
			<script src="<?php echo base_url().'assets/theme/backend/'?>js/datatables/js/jquery.dataTables.js"></script>
			<script src="<?php echo base_url().'assets/theme/backend/'?>js/datatables/tools/js/dataTables.tableTools.js"></script>
			 <script>
            $(document).ready(function () {
                $('input.tableflat').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });
            });

            var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#example').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0]
                        } //disables sorting for column one
            ],
                    'iDisplayLength': 12,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url('assets/theme/js/Datatables/tools/swf/copy_csv_xls_pdf.swf'); ?>"
                    }
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
        </script>
            <!-- /page content -->
 