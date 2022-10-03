<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./includes/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
    <title>Contact us</title>

</head>

<body>

    <?php
    include "./includes/header.php";
    ?>
    <div class="contact-img">
        <h1 class="container">Contact us</h1>
    </div>
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h2>You tell us. We listen.</h2>
                <br>
                <h5><i class="bi bi-envelope"></i> info@bookatter.com</h5>
                <br>
                <h5><i class="bi bi-telephone"></i> +962777777777</h5>
                <br>
                <h5><i class="bi bi-clock"></i> Monday to Saturday - 9:00 am to 7:00 pm</h5>
                <br>

                <h5><i class="bi bi-clock"></i> Sunday - 10:00 am to 5:00 pm</h5>
                <br>
                <h5> need Help? Call Us. +962777777777</h5>

            </div>
            <div class="col">

                <div class="container">
                    <div class="row">
                        <div class="col-md-16">
                            </di>
                            <div class="col-md-16">
                                <div class="rectable">
                                    <br>

                                    <div class="border border-contact">
                                        <h3>Have any Queries? We're here to help.</h3>
                                        <br>
                                        <?php session_start(); ?>
                                        <?php if (isset($_SESSION['res'])) ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php echo $_SESSION['res']; ?>
                                        </div>


                                        <form role="form" action="contact-data.php" method="post">
                                            <div class=" row ">
                                                <div class="col-md-12">
                                                    <div class=" form-group ">
                                                        <input type="text" class="form-control" name="name" placeholder="Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class=" row ">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="contact-email" placeholder="E-mail">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">

                                                <div class=" col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject" placeholder="Subject">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" rows="5" name="msg" placeholder="msg">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <button type="submit" class="btn btn-success"> Send a message
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <br><br><br>
        <div>
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <h4>Worldwide</h4>
                        <p>It elit tellus, luctus nec ullamcorper mattis,pulvinar</p>
                    </div>
                    <div class="col">
                        <h4>Best Quality</h4>
                        <p>It elit tellus, luctus nec ullamcorper mattis,pulvinar</p>
                    </div>
                    <div class="col">
                        <h4>Best Offers</h4>
                        <p>It elit tellus, luctus nec ullamcorper mattis,pulvinar</p>
                    </div>
                    <div class="col">
                        <h4>secure Payments</h4>
                        <p>It elit tellus, luctus nec ullamcorper mattis,pulvinar</p>
                    </div>
                </div>

            </div>

            <?php
            include "./includes/footer.php";
            ?>

</body>

</html>