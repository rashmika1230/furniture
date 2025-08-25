<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture-Admin login</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="styles.css">
	<link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
</head>
<body class="adminsign_body">

<div class="adminSignbox col-4 border rounded-4">

				<h2 class="text-center">Sign In</h2>
		
				<div class="mt-2">
					<label for="form-label"><b>Username:</b></label>
					<input type="text" class="form-control" id="un" value="">
				</div>
		
				<div class="mt-2">
					<label for="form-label"><b>Password:</b></label>
					<input type="password" class="form-control" id="pw" value="">
				</div>
		
				<div class="d-none" id="msgDiv2">
					<div class="alert alert-danger" id="msg2">
					</div>
				</div>
		
		
				<div class="mt-4 d-flex justify-content-center">
					<button class="btn btn-success col-6" onclick="AdminLogin();">Log In</button>
				</div>		
		
			</div>

            <script src="script.js"></script>
    
</body>
</html>