<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($error)) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<?= $error ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" id="username" name="username" placeholder="Enter a username">
					<p class="help-block">At least 4 characters, letters or numbers only</p>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
					<p class="help-block">A valid email address</p>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Enter a password">
					<p class="help-block">At least 6 characters</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<p class="help-block">Must match your password</p>
				</div>
				<div class="form-group">
					<label for="full_name">Full Name</label>
					<input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name">
					<p class="help-block">Your full name</p>
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
					<p class="help-block">With Country Code eg +62</p>
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
					<p class="help-block">Your address</p>
				</div>
				<div class="form-group">
					<label for="address">Avatar</label>
					<input type="file" name="avatar" value="Avatar">
					<p class="help-block">Your photo</p>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->