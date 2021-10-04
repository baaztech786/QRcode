<main>
	<div class="container-fluid">
		<h1 class="mt-4">Dashboard</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Home/User Password</li>
		</ol>
	</div>
	<?php
		//include "../func/admin/profile.php";
	?>
	<div class="container-fluid">
		<section id="add_vendor">
			<div class="row mt-2 ml-3">
				<form method="post" style="width:70%" action="func/admin/password.php" id="update_shop">
					<div class="container-fluid">
					<span id="general_error" class="mt-3" style="color: red; font-weight: bold;">
                      <?php if(isset($_SESSION['profile_msg'])){echo $_SESSION['profile_msg'];} ?>

					  <?php $_SESSION['profile_msg']= ""; ?>
                    </span>
						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="newpassword">New Password</label>
							<div class="col-sm-6">
								<input type="password" value="" class="form-control" id="newpassword" name="newpassword" placeholder="Enter New Password"></div>
						</div>
						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="cpassword">Confirm Password</label>
							<div class="col-sm-6">
								<input type="password" value="" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" ></div>
						</div>
						<div class="form-group row mt-1 ">
							<div class="col-sm-offset-2 col-sm-6">
								<input type="submit" class="btn btn-success float-right" name="user_profile_pass" value="Update"> </div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</main>