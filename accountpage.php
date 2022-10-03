<?php 
    require_once("includes/connection.php");

    // if(!isset($_SESSION['login']))
    // {
    //     header("location: ../login.php");
    // }
    // else 
    // {

    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Book Store</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="includes/bootstrap-5.2.1-dist/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    <?php include("includes/header.php"); ?>
    <section id="profileHome">
        <div class="profileContainer">
            <div class="profilebackImage " >
                <div class="profileImgContent">
                    <div class="title">
                        
                        <h1>My Account</h1>
                    </div>
                    <div class="subTitle">
                        <h4>Here you can manage, edit, view your account information.</h4>
                    </div>
                </div>
            </div>
            <div class="profileDetailsContent">
                <div class="pDataContainer">
                    <div class="leftSide">
                        <div class="container">
                            <div class="row"><a href="accountpage.php">Dashboard</a></div>
                            <div class="row"><a href="accountpage.php?profile=orders">Orders</a></div>
                            <div class="row"><a href="accountpage.php?profile=downloads">Downloads</a></div>
                            <div class="row"><a href="accountpage.php?profile=addresses">Addresses</a></div>
                            <div class="row"><a href="accountpage.php?profile=details">Account Details</a></div>
                            <div class="row"><a href="./logout.php">Logout</a></div>
                        </div>
                    </div>
                    <div class="rightSide">
                        <?php
                            if(isset($_SESSION['login']))
                            {
                                if(isset($_GET['profile']))
                                {
                                    if($_GET['profile'] == "details")
                                    {
                                        $query = mysqli_query($conn, "SELECT * FROM register");
                                        $user = mysqli_fetch_array($query);
                                        
                                        $fullname = $user['firstname']. " ". $user['lastname'];
                                        ?>
                                        <div class="rightContainer">
                                            <table>
                                                <tr>
                                                    <td>Username</td>
                                                    <td><?php echo $user['username']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?php echo $fullname; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $user['email']; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <?php
                                    } 
                                } 
                                else
                                {
                                    $query = mysqli_query($conn, "SELECT * FROM register");
                                    $user = mysqli_fetch_array($query);

                                    $fullname = $user['firstname']. " ". $user['lastname'];

                                    ?>
                                        <div class="rightContainer">
                                            <div class="rightHeading">
                                                <h1>Hello <b><?php echo $fullname; ?></b> (not <b><?php echo $user['username']; ?></b>? <a href="./logout.php">Log Out</a>)</h1>
                                            </div>
                                            <div class="rightPara">
                                                <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details</p>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            else 
                            {
                                ?>
                                    <div class="rightContainer">
                                        <div class="rightHeading">
                                            <h1>You are not logged in. Please (<a href="../logout.php">Log in</a>)</h1>
                                        </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include("includes/footer.php"); ?>
</body>
</html>