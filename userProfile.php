<?php
session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();

    ?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Untree.co">
        <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
        <meta name="description" content="" />
        <meta name="keywords" content="bootstrap, bootstrap4" />

        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <link href="css/tiny-slider.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <title>Shehan Furniture</title>
    </head>

    <body class="bg-light">

        <?php include "header.php"; ?>

        <div class="container-fluid mt-2 d-flex justify-content-center align-items-center mb-5 my-5 bg-light p-2">
            <div class="row">


<div class="d-flex justify-content-end mb-2">
    <button class="btn-danger btn-sm border border-danger rounded rounded-2" onclick="signOut();">SignOut</button>
</div>


                <div class="col-md-3 p-3 border rounded border-2  border-end mypbg">
                    <div class=" border rounded border-3 p-5 mt-3">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <div class="d-flex justify-content-center">

                                <img src="
                            <?php
                            if (!empty($d["img_path"])) {
                                echo $d["img_path"];
                            } else {
                                echo ("rs/profile.png");
                            }
                            ?>" height="150px" id="i">
                            </div>



                            <input type="file" class="d-none" id="profileimage" />
                            <label for="profileimage">Select
                                Profile Image</label>
                            <button class="btn btn-primary mt-5" id="upPbtn" onclick="uploadImg();">Upload</button>

                        </div>
                    </div>
                </div>

                <div class="col-md-9 border border-3 rounded   ms-auto">
                    <div class="p-3 py-5">

                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <h4 class="fw-bold">Profile Settings</h4>
                        </div>

                        <div class="row mt-4">

                            <div class="col-6 ">
                                <label class="form-label">First Name</label>
                                <input id="fname" type="text" class="form-control" value="<?php echo ($d["fname"]); ?>" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Last Name</label>
                                <input id="lname" type="text" class="form-control" value="<?php echo ($d["lname"]); ?>" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Mobile</label>
                                <input id="mobile" type="text" class="form-control" value="<?php echo ($d["mobile"]); ?>" />
                            </div>



                            <div class="col-6">
                                <label class="form-label">Email</label>
                                <input id="email" class="form-control" value="<?php echo ($d["email"]); ?>" />
                            </div>

                            <div class="col-6">
                                <label class="form-label">Username</label>
                                <input class="form-control" readonly value="<?php echo ($d["username"]); ?>" />
                            </div>

                            <div class="col-6 mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input id="pw" type="password" class="form-control"
                                        value="<?php echo ($d["password"]); ?>" />
                                </div>
                            </div>
                            <div class="d-none d-flex justify-content-center" id="alertDiv">
                                <div class="alert alert-danger" role="alert" id="alert1">
                                    
                                </div>
                            </div>


                            <div class="row mt-3 ms-auto">
                                <div class="d-flex justify-content-center">
                                    <h5>Shiping Details</h5>
                                </div>


                                <div class="col-6 ">
                                    <label class="form-label">No:</label>
                                    <input id="no" type="text" class="form-control" value="<?php echo ($d["no"]); ?>" />
                                </div>

                                <div class="col-6 ">
                                    <label class="form-label">Adress Line 01:</label>
                                    <input id="line1" type="text" class="form-control"
                                        value="<?php echo ($d["line1"]); ?>" />
                                </div>

                                <div class="col-6 ">
                                    <label class="form-label">Adress Line 02:</label>
                                    <input id="line2" type="text" class="form-control"
                                        value="<?php echo ($d["line2"]); ?>" />
                                </div>

                                <div class="col-6 ">
                                    <label class="form-label">Main City:</label>
                                    <input id="city" type="text" class="form-control" value="<?php echo ($d["city"]); ?>" />
                                </div>


                            </div>









                            <div class="col-12 d-grid mt-4">
                                <button class="btn btn-primary " id="upbtn" onclick="updateProfile();">Update My Profile</button>
                            </div>

                        </div>

                    </div>
                </div>








            </div>
        </div>
        <!-- End Blog Section -->

        <!-- Start Footer Section -->
        <?php include "footer.php"; ?>
        <!-- End Footer Section -->


        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/tiny-slider.js"></script>
        <script src="js/custom.js"></script>
        <script src="script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    </body>

    </html>

    <?php






} else {
    header("Location: signIn.php");
    exit();
}


?>