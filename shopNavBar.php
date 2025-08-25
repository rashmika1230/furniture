<nav class="custom-navbar navbar navbar navbar-expand-md text-light" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand text-light" href="index.php">Shehan Furniture<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="active"><a class="nav-link" href="shop.php">Shop</a></li>
                <li><a class="nav-link" href="index.php">About us</a></li>
                <li><a class="nav-link" href="index.php">Services</a></li>
                <li><a class="nav-link" href="contact.php">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li><a class="nav-link" href="userProfile.php"><img src="images/user.svg"></a></li>
                <li><a class="nav-link" href="cart.php"><img src="images/cart.svg"></a></li>
                <li><a class="nav-link" onclick="veiwSearch();"><img src="images/search.svg"></a></li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->

<!-- Start Hero Section -->
<div class="d-none" id="navSearch">
    <div class="hero">
        <div class="container-fluid">
            <div class="row">
                <!-- Search Bar -->
                <div class="col-12 col-md-6 d-flex justify-content-center align-items-center  border-end">
                    <div class="search-container">
                        <div class="search-box">
                            <input type="text" placeholder="Search for..." id="product">
                            <div class="search-icon">
                                <!-- <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 21L15 15" stroke="#000" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M10 18C13.866 18 17 14.866 17 11C17 7.13401 13.866 4 10 4C6.13401 4 3 7.13401 3 11C3 14.866 6.13401 18 10 18Z"
                                        stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> -->
                                <button class="btn btn-outline-danger" onclick="searchProduct(0);"> search</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- advance Options -->


                <div class="col-12 col-md-6 p-5 ">
                    <div class="row">


                        <?php include "connection.php";    ?>


                            <div class="col-12 col-sm-6 ">
                                <label for="color" class="form-label">Color:</label>
                                <select class="form-select" id="color">
                                    <option value="0">Select Color</option>

                                    <?php 
                                    
                                    $rs = Database::search("SELECT * FROM `color`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo($d["color_id"]); ?>"><?php echo($d["color_name"]); ?></option>
                                        <?php

                            }

                        ?>

                                    

                                    

                                </select>
                            </div>
                            
                        


                        <div class="col-12 col-sm-6 mb-2">
                            <label for="cat" class="form-label">Category:</label>
                            <select class="form-select" id="cat">
                                <option value="0">Select Category</option>

                                <?php 
                                    
                                    $rs = Database::search("SELECT * FROM `category`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo($d["cat_id"]); ?>"><?php echo($d["cat_name"]); ?></option>
                                        <?php

                            }

                        ?>


                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-2">
                            <label for="brand" class="form-label">Material:</label>
                            <select class="form-select" id="wood">
                                <option value="0">Select Material</option>

                                <?php 
                                    
                                    $rs = Database::search("SELECT * FROM `wood`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo($d["wood_id"]); ?>"><?php echo($d["wood_name"]); ?></option>
                                        <?php

                            }

                        ?>

                            </select>
                        </div>
                        <div class="col-12 col-sm-6 mb-2">
                            <label for="size" class="form-label">Location:</label>
                            <select class="form-select" id="place">
                                <option value="0">Select Location</option>

                                <?php 
                                    
                                    $rs = Database::search("SELECT * FROM `place`");
                        $num = $rs->num_rows;

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo($d["place_id"]); ?>"><?php echo($d["place_name"]); ?></option>
                                        <?php

                            }

                        ?>

                            </select>
                        </div>
                    </div>

                    <div class="row mt-3 d-flex justify-content-center">
                        <div class="col-sm-5 mb-2">
                            <input type="text" class="form-control" placeholder="Min Price" id="min">
                        </div>
                        <div class="col-sm-5 mb-2">
                            <input type="text" class="form-control" placeholder="Max Price" id="max">
                        </div>

                    </div>
                    <div class="col-12">
                        <button class="btn btn-outline-light w-100" onclick="advSearchProduct(0);">Search</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- End Hero Section -->