<div class="login-form">
	<form name="loginForm" method="post" action="<?php echo site_url($redirect) ?>">
		<div class="control-group">
			<label class="control-label" for="siteUser">Email</label>
			<div class="controls">
				<input type="text" name="siteUser" id="username" maxlength="255"/>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="sitePassword">Password</label>
			<div class="controls">
				<input type="password" name="sitePassword" id="password" maxlength="255" />
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<input type="submit" class="btn" value="Log in" />
				- <a href="http://agcompliance.com/login.php" target="_blank">I forgot my password</a>
			</div>
		</div>
	</form>
</div>