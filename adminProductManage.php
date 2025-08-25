<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture-Product Management</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">

</head>

<body onload="loadUser();">
<?php include "adminNav.php"; ?>
    <?php include "adminNavSideBar.php"; ?>

    <div class="content admin_conetent_body">
        

        <div class="d-flex justify-content-center align-items-center">
    <div class="container-fluid mt-5">
        <div class="container mt-4">
            <h2>Product Management</h2>
            <hr>

            <div class="container-fluid pcon1">
                <div class="row">


                    <div class="col-md-6 bordered">

                        <!-- Place -->
                        <div class="form-group col-md-12">
                            <label for="placeName"><b>Location</b></label>
                            <input type="text" class="form-control mb-3" id="placeName" placeholder="Enter Location name">

                            <div class="d-none" id="msgDiv1">
                                <div class="row justify-content-center ">
                                    <p class="alert alert-danger col-7" id="msg1"></p>
                                    <button type="button" class="btn-close col-3 ms-3" data-bs-dismiss="alert" aria-label="Close" onclick="reload();"></button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-success mt-2 col-4 " onclick="addPlaceName();">Add</button>
                            </div>

                        </div>
                        <!-- Category -->
                        <div class="form-group col-md-12 mt-2">
                            <label for="categoryName"><b>Category</b></label>
                            <input type="text" class="form-control mb-2" id="catName" placeholder="Enter category name">

                            <div class="d-none" id="msgDiv2">
                                <div class="row justify-content-center ">
                                    <div class="alert alert-danger col-7" id="msg2"></div>
                                    <button type="button" class="btn-close col-3 ms-3" data-bs-dismiss="alert" aria-label="Close" onclick="reload();"></button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-success mt-2 col-4 " onclick="addCatName();">Add</button>
                            </div>
                        </div>
                        
                        <!-- Wood -->

                        <div class="form-group col-md-12 mt-2">
                            <label for="woodType"><b>Material</b></label>
                            <input type="text" class="form-control mb-2" id="woodName" placeholder="Enter Material">

                            <div class="d-none" id="msgDiv3">
                                <div class="row justify-content-center ">
                                    <div class="alert alert-danger col-7" id="msg3"></div>
                                    <button type="button" class="btn-close col-3 ms-3" data-bs-dismiss="alert" aria-label="Close" onclick="reload();"></button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-success mt-2 col-4" onclick="addWoodName();">Add</button>
                            </div>
                        </div>

                        <!-- Color -->

                        <div class="form-group col-md-12 mt-2">
                            <label for="colorName"><b>Color</b></label>
                            <input type="text" class="form-control mb-2" id="colorName" placeholder="Enter color">

                            <div class="d-none" id="msgDiv4">
                                <div class="row justify-content-center ">
                                    <div class="alert alert-danger col-7" id="msg4"></div>
                                    <button type="button" class="btn-close col-3 ms-3" data-bs-dismiss="alert" aria-label="Close" onclick="reload();"></button>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-success mt-2 col-4 " onclick="colorName();">Add</button>
                            </div>
                        </div>
                    </div>

                    <!-- product other -->
                    <div class="col-md-6 bordered row ms-1">
                        <div class="form-group mb-3">
                            <label for="productImage">Add Image</label>
                            <div class="image-preview">Image Preview</div>
                            <input type="file" class="form-control-file mt-2" id="imageUploder">
                        </div>

                        <div class="form-group mb-3">
                            <label for="productName" class="form-label mb-2">Type Product Name</label>
                            <input type="text" class="form-control" id="productName" placeholder="Enter product name">
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-6 mb-3">
                                <label for="selectPlace" class="form-label mb-2">Select Place</label>
                                <select class="form-control" id="selectPlace">
                                    <option value="0">Select</option>

                                    <?php
                                    $rs = Database::search("SELECT * FROM `place` ");
                                    $num = $rs->num_rows;

                                    for ($i=0; $i < $num; $i++) { 
                                        
                                        $data = $rs->fetch_assoc();

                                        ?>
                                        <option value="<?php echo($data["place_id"]); ?>"><?php echo($data["place_name"]); ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="selectCategory" class="form-label mb-2">Select Category</label>
                                <select class="form-control" id="selectCategory">
                                    <option value="0">Select</option>
                                    
                                    <?php
                                    
                                    $rs = Database::search("SELECT * FROM `category`");
                                    $num = $rs->num_rows;

                                    for ($i=0; $i < $num; $i++) { 
                                        
                                        $data = $rs->fetch_assoc();

                                        ?>
                                        <option value="<?php echo($data["cat_id"]); ?>"><?php echo($data["cat_name"]); ?></option>
                                        <?php
                                    }

                                    ?>


                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group col-md-6 mb-3">
                                <label for="selectWood" class="form-label mb-2">Select Wood</label>
                                <select class="form-control" id="selectWood">
                                    <option value="0">Select</option>
                                    
                                    <?php
                                    $rs = Database::search("SELECT * FROM `wood` ");
                                    $num = $rs->num_rows;

                                    for ($i= 0; $i < $num; $i++) {
                                        $data = $rs->fetch_assoc();

                                        ?>
                                        <option value="<?php echo($data["wood_id"]); ?>"><?php echo($data["wood_name"]); ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <label for="selectColor" class="form-label mb-2">Select Color</label>
                                <select class="form-control" id="selectColor">
                                    <option value="0">Select</option>
                                    
                                    <?php
                                    
                                    $rs = Database::search("SELECT * FROM `color`");
                                    $num = $rs->num_rows;

                                    for ($i= 0; $i < $num; $i++) {

                                        $data = $rs->fetch_assoc();

                                        ?>
                                        <option value="<?php echo($data["color_id"]);?>"><?php echo($data["color_name"]); ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        


                        <div class="mb-3">
                        <label for="form-label">Description</label>
                        <textarea class="form-control" rows="5" id="productDesc"></textarea>
                    </div>

                    <div class="d-none" id="msgDiv5">
                                <div class="row justify-content-center ">
                                    <div class="alert alert-danger col-7" id="msg5"></div>
                                </div>
                            </div>

                        <div class="d-grid">
                        <button type="button" class="btn btn-primary mt-3" onclick="productReg();">Add</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
    </div>
    </div>


<!-- Footer -->
<div class="col-12">
      <p class="text-center">&copy;
        <script>document.write(new Date().getFullYear());</script>
        ShehanFurniture.lk || All right Reseverd
      </p>
    </div>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>


</body>

</html>


    <?php

} else {
    header("Location: adminlogin.php");
    exit();
  }


