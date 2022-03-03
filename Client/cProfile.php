<?php 
include ('../header.php')
include('helper/helper.php');

$object = new helper;

$object->query = "
SELECT * FROM patient_table 
WHERE patient_id = '".$_SESSION["patient_id"]."'
";

$result = $object->get_result();

include('header.php');

?>

<div class="container-fluid">
	<!-- <?php include('navbar.php'); ?> -->

	<div class="row justify-content-md-center">
		<div class="col col-md-6">
			<br />
			<?php
			if(isset($_GET['action']) && $_GET['action'] == 'edit')
			{
			?>
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Edit Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php" class="btn btn-secondary btn-sm">View</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<form method="post" id="edit_profile_form">
						<div class="form-group">
							<label>client Email Address<span class="text-danger">*</span></label>
							<input type="text" name="client_email_address" id="client_email_address" class="form-control" required autofocus data-parsley-type="email" data-parsley-trigger="keyup" readonly />
						</div>
						<div class="form-group">
							<label>client Password<span class="text-danger">*</span></label>
							<input type="password" name="client_password" id="client_password" class="form-control" required  data-parsley-trigger="keyup" />
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>client First Name<span class="text-danger">*</span></label>
									<input type="text" name="client_first_name" id="client_first_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>client Last Name<span class="text-danger">*</span></label>
									<input type="text" name="client_last_name" id="client_last_name" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>client Date of Birth<span class="text-danger">*</span></label>
									<input type="text" name="client_date_of_birth" id="client_date_of_birth" class="form-control" required  data-parsley-trigger="keyup" readonly />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>client Gender<span class="text-danger">*</span></label>
									<select name="client_gender" id="client_gender" class="form-control">
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>client Contact No.<span class="text-danger">*</span></label>
									<input type="text" name="client_phone_no" id="client_phone_no" class="form-control" required  data-parsley-trigger="keyup" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>client Maritial Status<span class="text-danger">*</span></label>
									<select name="client_maritial_status" id="client_maritial_status" class="form-control">
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Seperated">Seperated</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>client Complete Address<span class="text-danger">*</span></label>
							<textarea name="client_address" id="client_address" class="form-control" required data-parsley-trigger="keyup"></textarea>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="action" value="edit_profile" />
							<input type="submit" name="edit_profile_button" id="edit_profile_button" class="btn btn-primary" value="Edit" />
						</div>
					</form>
				</div>
			</div>

			<br />
			<br />
			

			<?php
			}
			else
			{

				if(isset($_SESSION['success_message']))
				{
					echo $_SESSION['success_message'];
					unset($_SESSION['success_message']);
				}
			?>

			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							Profile Details
						</div>
						<div class="col-md-6 text-right">
							<a href="profile.php?action=edit" class="btn btn-secondary btn-sm">Edit</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<?php
							foreach($result as $row)
						{
						?>
						<tr>
							<th class="text-right" width="40%">client Name</th>
							<td><?php echo $row["client_first_name"] . ' ' . $row["client_last_name"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Email Address</th>
							<td><?php echo $row["client_email_address"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Password</th>
							<td><?php echo $row["client_password"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Address</th>
							<td><?php echo $row["client_address"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Contact No.</th>
							<td><?php echo $row["client_phone_no"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Date of Birth</th>
							<td><?php echo $row["client_date_of_birth"]; ?></td>
						</tr>
						<tr>
							<th class="text-right" width="40%">Gender</th>
							<td><?php echo $row["client_gender"]; ?></td>
						</tr>
						
						<tr>
							<th class="text-right" width="40%">Maritial Status</th>
							<td><?php echo $row["client_maritial_status"]; ?></td>
						</tr>
						<?php
						}
						?>	
					</table>					
				</div>
			</div>
			<br />
			<br />
			<?php
			}
			?>
		</div>
	</div>
</div>


<?php include ('../footer.php') ?>