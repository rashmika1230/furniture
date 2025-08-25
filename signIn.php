<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
	<script src="https://unpkg.com/scrollreveal"></script>
	<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
	<title>Shehan Furniture</title>

</head>

<body class="bg">
	<div class="row row1 col-12 gap-5">

		<div class="col-6 content1 text-light">
			<h1><span>
					Welcome to,<br>
					<h3><span class="text"></span></h3>
				</span></h1>
		</div>

		<!-- Sign In box -->

		<div class="signIn-box col-3 border rounded-4" id="signInBox">

			<h2 class="text-center">Sign In</h2>

			<?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        } 
        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }
        

        ?>

			<div class="mt-2">
				<label for="form-label"><b>Username:</b></label>
				<input type="text" class="form-control" id="un" value="<?php echo $username?>">
			</div>

			<div class="mt-2">
				<label for="form-label"><b>Password:</b></label>
				<input type="password" class="form-control" id="pw" value="<?php echo $password?>">
			</div>


			<div class="container row ">
				<div>
					<input type="checkbox" class="form-chek-input" id="rm">
					<label for="form-label">Remember me:</label>
					<a href="#" class="text-primary" onclick="changeViewfbox();">
						<p>Forget Password?</p>
					</a>
				</div>



			</div>


			<div class="d-none" id="msgDiv2">
				<div class="alert alert-danger" id="msg2">
				</div>
			</div>


			<div class="mt-2 d-flex justify-content-center">
				<button class="btn btn-success col-6" onclick="signIn();">Sign In</button>
			</div>

			<div class="mt-2 d-flex justify-content-center">
				<span>Don't have an account? <b class="text-primary" onclick="changeView();">Sign up</b></span>
			</div>

			<div class=" d-flex justify-content-center">
				<a href="adminlogin.php" class="text-danger"><span>Are you an Admin</span></a>
			</div>

		</div>


		<!-- forgrot box -->
		<div class="bg-light  col-3 border rounded-4 d-none" id="fbox">

			<h2 class="text-center">Forget Pssword</h2>

			<div class="mt-2">
				<label for="form-label"><b>email:</b></label>
				<input type="email" class="form-control" id="email2" value="">
			</div>

			<a href="signIn.php">back</a>

			<div class="mt-2 d-flex justify-content-center mb-3">
				<button class="btn btn-success col-6" onclick="forgotPassword();">Submit Email</button>
			</div>
		</div>


		<!-- Sign In box -->
		<!-- modal -->
		<div class="modal" tabindex="-1" id="fpmodal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Forgot Password</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">

						<div class="row g-3">

							<div class="col-6">
								<label class="form-label">New Password</label>
								<div class="input-group mb-3">
									<input type="password" class="form-control" id="np" />
									
								</div>
							</div>

							<div class="col-6">
								<label class="form-label">Re-type Password</label>
								<div class="input-group mb-3">
									<input type="password" class="form-control" id="rnp" />
									
								</div>
							</div>

							<div class="col-12">
								<label class="form-label">Verification Code</label>
								<input type="text" class="form-control" id="vcode" />
							</div>

						</div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
					</div>
				</div>
			</div>
		</div>
		<!-- modal -->
		<!-- Sign up box -->
		<div class="signUp-box col-5 d-none" id="signUpBox">
			<h2 class="text-center">Sign Up</h2>

			<div class="row">

				<div class="mt-2 col-6">
					<label for="form-label">First Name</label>
					<input type="text" class="form-control" id="fname">
				</div>

				<div class="mt-2 col-6">
					<label for="form-label">Last Name</label>
					<input type="text" class="form-control" id="lname">
				</div>
			</div>

			<div class="row">

				<div class="mt-2 col-6">
					<label for="form-label">email</label>
					<input type="text" class="form-control" id="email">
				</div>

				<div class="mt-2 col-6">
					<label for="form-label">Mobile</label>
					<input type="text" class="form-control" id="mobile">
				</div>


			</div>



			<div class="mt-2">
				<label for="form-label">User Name</label>
				<input type="text" class="form-control" id="username">
			</div>

			<div class="mt-2 mb-3">
				<label for="form-label">Password</label>
				<input type="password" class="form-control" id="password">
			</div>

			<div class="d-none alert-box" id="msgDiv1">
				<div class="text-center text-danger" id="msg1">
				</div>
			</div>

			<div class="mt-2 d-flex justify-content-center">
				<button class="btn btn-success col-6" onclick="signUp();">Sign Up</button>
			</div>

			<div class="mt-2 d-flex justify-content-center">
				<span>Already have an account? <b class="text-primary" onclick="changeView();">Sign in</b></span>
			</div>
			

		</div>

	</div>
	<!-- Sign up box -->



	</div>

	<script src="script.js"></script>
	<script src="bootstrap.js"></script>
</body>

</html>