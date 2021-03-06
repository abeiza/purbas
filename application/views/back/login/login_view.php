<!DOCTYPE html>
<html>
	<head>
		<title>Panel Administration | Purbasari Website</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	</head>
	<body style="font-family:calibri;">
		<div style="position:absolute;background-color:#2e2e2e;width:100%;height:100%;top:0;left:0;display:flex;align-items:center;">
			<div style="width:300px;margin: 0 auto;color:#444;text-align:center;background-color:#fff;">
				<div style="width:100%;background-color:#FF8BA1;float:left;color:#fff;">
					<div style="margin:30px 20px;">
						<h1 style="margin:0px;text-align:left;font-weight:normal;">Sign In</h1>
						<h4 style="margin:0px;margin-left:40px;text-align:left;font-weight:normal;">For access system</h4>
					</div>
				</div>
				<div style="width:100%;background-color:#fff;float:left;">
					<div style="margin:20px;">
					<?php echo form_open('backend/login/login_act');?>
						<div style="width:100%;float:left;display:flex;align-items:center;">
							<div style="width:13%;float:left;display:flex;align-items:center;height:30px;background-color:#e6e6e6;">
								<i class="fa fa-user" style="color:#fff;margin:auto;"></i>
							</div>
							<input name="username" style="font-size:11px;padding:0px 5px;height:30px;box-shadow:none;border:none;background-color:#f7f7f7;width:87%;float:left;margin:3px 0;" type="text" placeholder="Username"/>
						</div>
						<div style="width:100%;float:left;display:flex;align-items:center;">
							<div style="width:13%;float:left;display:flex;align-items:center;height:30px;background-color:#e6e6e6;">
								<i class="fa fa-lock" style="color:#fff;margin:auto;"></i>
							</div>
							<input name="password" style="font-size:11px;padding:0px 5px;height:30px;box-shadow:none;border:none;background-color:#f7f7f7;width:87%;float:left;margin:3px 0;" type="password" placeholder="Password"/>
						</div>
						<button type="submit" style="background-color:#FF8BA1;color:#fff;padding:10px;border:none;cursor:pointer;margin:10px 0;width:100%;border-radius:3px;">Sign In</button>
					<?php echo form_close(); ?>
					</div>
				</div>
				<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo validation_errors();?></span>
				<span style="font-size:12px;color:#666;width:100%;float:left;margin:3px;"><?php echo $this->session->flashdata('login_result');?></span>
				<hr style="border:none;border-bottom:1px solid #e1e1e1;width:85%;margin:0px auto;"/>
				<div style="font-size:11px;color:#666;padding:20px 0px;">
					<span>Forget?<i class="fa fa-phone" style="margin:0px 3px"></i>Please call TI Division.</span><br>
					<span>Copyright &copy; 2016</span>
				</div>
			</div>
		</div>
	</body>
</html>