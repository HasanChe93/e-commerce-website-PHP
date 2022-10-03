<!DOCTYPE html>
<html lang="en">

<head>
    <title>SHOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./includes/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img class="rounded-circle" height="40" src="./image/bookstore.png" height="15" alt="book Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Baghdad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact-us</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Notifications -->
                    <div class="dropdown">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span><img class="rounded-circle" height="25" src="./image/icon.png"> </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="./image/user.png" class="rounded-circle" height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->
            </div>
            <!-- Container wrapper -->
        </nav>
    </header>
    <div class="container-fluid bg-light">
        <div class="row pt-5 products-grid ">
            <div class=" col-md-3 filter">
                <div class="row g-0 mt-5">
                    <div class="col-12 ">
                        <form action="" method="get" class="d-flex gap-2 ">
                            <input type="text" name="" id="" placeholder="Search products.." class="w-100">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-caret-right-fill"></i>
                            </button>
                        </form>
                    </div>
                    <div class="col-12 mt-5">
                        <h3>Filter by price</h3>

                        <br />
                        <h2 text-align="center">Product Filters Price Range</h2>
                        <br />
                        <div class="col-md-3">
                            <div class="list-group">
                                <h3>Price</h3>
                                <input type="hidden" id="hidden_minimum_price" value="0" />
                                <input type="hidden" id="hidden_maximum_price" value="65000" />
                                <p id="price_show">10 - 5000</p>
                                <div id="price_range"></div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br />
                            <div class="row filter_data">
                            </div>
                        </div>

                    </div>
                    <?php include "./includes/category_widget.php"; ?>
                </div>
            </div>
            <div class="col-8 mt-5">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 ">
                    <?php
                    include "./includes/dbcon.php";
                    $sql = "SELECT products.id , name,image,author,price,category.category_name FROM products INNER JOIN category on products.category = category.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col">
                                <div class="card  h-100 " style="    justify-content: space-between;">
                                    <div class="text-center">
                                        <a href="./category.php?category_name=<?php echo $row['category_name']; ?>">
                                            <img src="<?php echo "admin\\images\\" . $row['image']; ?>" style="width:200px; height:350px;" class="w-100">
                                        </a>
                                    </div>
                                    <div class="text-center">
                                        <h5 class="px-2 py-3"><?php echo $row['name']; ?></h5>

                                        <div class="my-2 fs-4 ">

                                            category: <a href="./category.php?category_name=<?php echo $row['category_name']; ?>"><?php echo $row['category_name']; ?>
                                            </a>
                                        </div>

                                        <div class="price md-2"><?php echo "$" . $row['price'] ?></div>
                                    </div>
                                    <div class="cart-btn w-100 price">ADD TO CART</div>
                                </div>
                            </div>


                    <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    ?>

                </div>
            </div>
            <footer class="bg-dark text-center text-white mt-5 order-last">
                <!-- Grid container -->
                <div class="container p-4">
                    <!-- Section: Social media -->
                    <section class="mb-4">
                        <!-- Facebook -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg><i class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg><i class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                            </svg><i class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                            </svg><i class="fab fa-instagram"></i></a>

                        <!-- Linkedin -->
                        <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                            </svg><i class="fab fa-linkedin-in"></i></a>



                    </section>
                    <!-- Section: Social media -->

                    <!-- Section: Form -->
                    <section class="">
                        <form action="">
                            <!--Grid row-->
                            <div class="row d-flex justify-content-center">
                                <!--Grid column-->
                                <div class="col-auto">
                                    <p class="pt-2">
                                        <strong>Sign up for our book shop</strong>
                                    </p>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-5 col-12">
                                    <!-- Email input -->
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="form5Example21" class="form-control" />
                                        <label class="form-label" for="form5Example21">Email address</label>
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-auto">
                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-outline-light mb-4">
                                        Subscribe
                                    </button>
                                </div>
                                <!--Grid column-->
                            </div>
                            <!--Grid row-->
                        </form>
                    </section>
                    <!-- Section: Form -->

                    <!-- Section: Text -->
                    <section class="mb-4">

                    </section>
                    <!-- Section: Text -->

                    <!-- Section: Links -->
                    <section class="">
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Quick Links</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#!" class="text-white">Home</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">My account</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Cart</a>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Adults</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#!" class="text-white">Comedy</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Crime and Mystery</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Horror</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Thrillel</a>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                                <h5 class="text-uppercase">Category</h5>

                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#!" class="text-white">Biography</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Humor</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Picture Books</a>
                                    </li>
                                    <li>
                                        <a href="#!" class="text-white">Mystery</a>
                                    </li>
                                </ul>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->

                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                    </section>
                    <!-- Section: Links -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2022 Copyright:
                    <a class="text-white" href="https://mdbootstrap.com/">Baghdad.com</a>
                </div>
            </footer>
            <style>
                #loading {
                    text-align: center;
                    background: url('images/loading.gif') no-repeat center;
                    height: 150px;
                }
            </style>
            <script>
                $(document).ready(function() {
                    filter_data();

                    function filter_data() {
                        $('.filter_data').html('<div id="loading" style="" ></div>');
                        var action = 'fetch_data';
                        var minimum_price = $('#hidden_minimum_price').val();
                        var maximum_price = $('#hidden_maximum_price').val();
                        $.ajax({
                            url: "fetch_data.php",
                            method: "POST",
                            data: {
                                action: action,
                                minimum_price: minimum_price,
                                maximum_price: maximum_price
                            },
                            success: function(data) {
                                $('.filter_data').html(data);
                            }
                        });
                    }
                    $('#price_range').slider({
                        range: true,
                        min: 50,
                        max: 5000,
                        values: [50, 5000],
                        step: 50,
                        stop: function(event, ui) {
                            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                            $('#hidden_minimum_price').val(ui.values[0]);
                            $('#hidden_maximum_price').val(ui.values[1]);
                            filter_data();
                        }
                    });
                });
            </script>
</body>