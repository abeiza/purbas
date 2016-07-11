<!--CONTENT-->
<?php echo $map['js']; ?>
  <div id="canvas-peta">
	<?php echo $map['html']; ?>
	<!--<iframe style="width:100%; height:270px; margin:0; border:0; overflow:hidden;" src="http://maps.google.com/maps?q=<?php //echo $db['comp_lat']; ?>,<?php //echo $db['comp_long']; ?>&z=15&output=embed"></iframe>-->
	</div>
  <section id="content" style="background-color:#F9F9F8">
    <div class="container top">
      <div class="row">
        <div class="span12">
          <h3 style="text-transform:uppercase;">CONTACT US</h3>
          <div class="post-preview">
		  <div class="line"></div>
			<div class="row">
			<style>
				.form_control{
					background-color: #fff;
					//border-color: #eaeaea;
					border-radius: 3px;
					font-size: 1em;
					min-height: 30px;
					transition: border-color .15s linear;
					display: block;
					width: 100%;
					padding: 3px;
					font-size: 1rem;
					line-height: 1.5;
					color: #55595c;
					background-color: #fff;
					background-image: none;
					//border: 1px solid #ccc;
					border-radius: 0.25rem;
				}
				
				.contact{
					background-color: #fff;
					border-radius: 3px;
					//box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
					font-size: .95em;
					width: 100%;					
				}
			</style>
				<div class="span8">
					<?php echo form_open('home/contact/message');?>
						<div class="row" style="margin-left:0px;font-size:13px;">
							<div style="width:40%;float:left;margin:10px;">
								<label>Name:</label>
								<input class="form_control" type="text" name="name" placeholder="Your Name" required/>
							</div>
							<div style="width:40%;float:left;margin:10px;">
								<label>Email:</label>
								<input class="form_control" type="text" name="email" placeholder="Your Email" required/>
							</div>
						</div>
						<div class="row" style="margin-left:0px;font-size:13px;">
							<label style="margin-left:10px;">Messages:</label>
							<textarea class="form_control" name="text" style="padding:10px;width:83%;float:left;margin:10px;height:100px;font-size:14px;" placeholder="Messages . . ." required></textarea>
						</div>
						<div class="row" style="margin-left:0px;font-size:13px;margin-top:20px;">
							<button style="margin-left:10px;" type="submit"><i class="fa fa-send" style="margin:10px auto;margin-right:10px;"></i>Send</button>
							<input style="margin:10px;background:transparent;border:none;width:20px;text-align:center" name="a" value="<?php echo rand(0,9);?>" readonly/> + 
							<input style="margin:10px;background:transparent;border:none;width:20px;text-align:center" name="b" value="<?php echo rand(0,9);?>" readonly/> =  
							<input class="form_control" style="width:50px;margin-left:10px;" required type="text" name="jml"/>
							<?php echo $this->session->flashdata('add_result');?>
						</div>
					<?php echo form_close();?>
				</div>
				<div class="span4">
					<h3>Contact Information</h3>
					<div class="contact"  style="padding:20px ;width:90%;font-size:13px;">
						<table>
							<tr>
								<td style="font-weight:bold;width:30%">Address</td>
								<td><?php echo $address;?></td>
							</tr>
							<tr>
								<td style="font-weight:bold;width:30%">Phone</td>
								<td><?php echo $phone1;?> , <?php echo $phone1;?></td>
							</tr>
							<tr>
								<td style="font-weight:bold;width:30%">Fax</td>
								<td><?php echo $fax;?></td>
							</tr>
							<tr>
								<td style="font-weight:bold;width:30%">Email</td>
								<td><?php echo $email;?></td>
							</tr>
							<td style="font-weight:bold;width:30%">Company Website</td>
								<td>www.goc.co.id</td>
						</table>
					</div>
				</div>
			</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div id="push"></div>