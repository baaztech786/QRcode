<main>
	<div class="container-fluid">
		<h1 class="mt-4">Dashboard</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Home/User Details</li>
		</ol>
	</div>
	<?php
		//include "../func/admin/profile.php";
	?>
	<div class="container-fluid">
		<section id="add_vendor">
			<div class="row mt-2 ml-3">
				<form method="post" style="width:70%" action="func/admin/profile.php" id="update_shop">
					<div class="container-fluid">
					<span id="general_error" class="mt-3" style="color: red; font-weight: bold;">
                      <?php if(isset($_SESSION['profile_msg'])){echo $_SESSION['profile_msg'];} ?>

					  <?php $_SESSION['profile_msg']= ""; ?>
                    </span>
						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="username">Username</label>
							<div class="col-sm-6">
								<input type="text" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];} ?>" class="form-control" id="username" name="username" placeholder="Enter username"></div>
						</div>
                        <div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="email">Email</label>
							<div class="col-sm-6">
								<input type="email" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>" class="form-control" id="email" name="email" placeholder="Enter email"> </div>
						</div>
						<div class="form-group row mt-1 ">
							<div class="col-sm-offset-2 col-sm-6">
								<input type="submit" class="btn btn-success float-right" name="user_profile" value="Save"> </div>
						</div>
					</div>
				</form>
			</div>
		</section>
	</div>
</main>