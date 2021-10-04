<main>
	<div class="container-fluid">
		<h1 class="mt-4">Dashboard</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item active">Home/Add Link</li>
		</ol>
	</div>
	<div class="container-fluid">
	<span id="general_error" class="mt-3" style="color: red; font-weight: bold;">
                      <?php if(isset($_SESSION['product_msg'])){echo $_SESSION['product_msg'];} ?>

					  <?php $_SESSION['product_msg']= ""; ?>
                    </span>
		<section id="add_vendor">
			<div class="row mt-2 ml-3">
				<form method="post" style="width:70%" action="func/admin/links.php" id="update_shop" >
					<div class="container-fluid">

						<!-- Name -->
						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="name">Name</label>
							<div class="col-sm-6">
								<input type="text" value="<?php if(isset($_SESSION['link_name'])){ echo $_SESSION['link_name'];} ?>" class="form-control" id="name" name="name" placeholder="Enter name"></div>
						</div>

						<!-- DOB -->

						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="dob">Date of Birth</label>
							<div class="col-sm-6">
								<input type="date" value="<?php if(isset($_SESSION['link_dob'])){ echo $_SESSION['link_dob'];} ?>" class="form-control" id="dob" name="dob" ></div>
						</div>

						<!-- Personal Health Number -->

						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="phnumber">Personal Health Number</label>
							<div class="col-sm-6">
								<input type="text" value="<?php if(isset($_SESSION['link_phnumber'])){ echo $_SESSION['link_phnumber'];} ?>" class="form-control" id="phnumber" name="phnumber" placeholder="Personal Health Number"></div>
						</div>

						<!-- First Vaccination Date -->
						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="fdate">first vaccination date</label>
							<div class="col-sm-6">
								<input type="date" value="<?php if(isset($_SESSION['link_fdate'])){ echo $_SESSION['link_fdate'];} ?>" class="form-control" id="fdate" name="fdate" ></div>
						</div>

						<!-- Second VAccination Date -->

						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="sdate">second vaccination date</label>
							<div class="col-sm-6">
								<input type="date" value="<?php if(isset($_SESSION['link_sdate'])){ echo $_SESSION['link_sdate'];} ?>" class="form-control" id="sdate" name="sdate" ></div>
						</div>

						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="country">Country</label>
							<div class="col-sm-6">
								<select name="country" id="country" >
								<option>Select country</option>
									<?php
										 if(file_exists('template_parts/country.php'))
										 {
											 include'template_parts/country.php';
										 }

										 $_SESSION['link_name'] = "";
										 $_SESSION['link_dob'] = "";
										 $_SESSION['link_phnumber'] = "";
										 $_SESSION['link_fdate'] = "";
										 $_SESSION['link_sdate'] = "";
									?>
								</select>
							</div>
						</div>


						<div class="form-group row mt-5">
							<label class="control-label col-sm-6 pt-1" for="lang">Language</label>
							<div class="col-sm-6">
								<select name="lang" id="lang">
								<option>Select Language</option>
									<?php
										 if(file_exists('template_parts/lang.php'))
										 {
											 include'template_parts/lang.php';
										 }
									?>
								</select>
							</div>
						</div>


						<div class="form-group row mt-1 ">
							<div class="col-sm-offset-2 col-sm-6">
								<input type="submit" class="btn btn-success float-right" name="add_link" value="Add"> </div>
						</div>
					</div>


				</form>
			</div>
		</section>
	</div>
</main>