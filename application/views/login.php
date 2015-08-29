<link href="<?=base_url();?>media/css/signin.css" rel="stylesheet">
<script type="text/javascript">
    $(function () {
        document.getElementsByTagName('input')[0].focus();
    });
</script>
<div class="container">
		
    <form class="form-signin" role="form" method="post">
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
                                <?php if($message!=""){ ?>
				<div id="infoMessage" class="alert alert-success"><?php echo $message;?></div>
                                <?php } ?>
				<div class="field">
					<label for="username">Username</label>
					<input type="text" id="username" name="username" value="" placeholder="Username" class="form-control" />
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password" value="" placeholder="Password" class="form-control"/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				
				<span class="login-checkbox">
					<input id="Field" name="remember" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					<label class="choice" for="Field">Keep me signed in</label>
				</span>
									
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
	
</div> <!-- /account-container -->



<div class="login-extra">
	<a href="<?=base_url();?>auth/forgot_password">Forgot Password?</a>
</div> <!-- /login-extra -->


<script src="<?=base_url();?>media/js/signin.js"></script>