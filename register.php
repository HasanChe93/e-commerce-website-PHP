
<?php 
    include "../includes/connection.php";
    include "./includes/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Book Store</title>

    <link href="../css/style.css" rel="stylesheet">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <script>
        function pass()
        {
            var firstpass = document.form.pass.value;
            var secondpass = document.form.cpass.value;
            if(firstpass == secondpass)
            {
                return true;
            }
            else
            {
                alert("Passwords doesn't match.\n Please check and Re-Enter the password");
                return false;
            }
        }
    </script>
</head>
<body>
    <section id="registerHome">
        <div class="registerContainer">
        <div class="container">
            <div class="Title"><h2>Register</h2></div>
                <form class="registerForm" action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter your First Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address" aria-describedby="emailHelp" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" title="Example: name@email.com" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" name="pass" placeholder="Your Password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="One Uppercase, One Lowercase, One special Character, at least 8 digits" required>
                    </div>
                    <div class="mb-3">
                        <label for="cpassword" class="form-label">Password</label>
                        <input type="password" id="cpassword" class="form-control" name="cpass" placeholder="Confirm Password" required>
                    </div>
                    <button onclick="pass()" type="submit" class="btn btn-primary">Register</button>
                    <a class="btn btn-secondary" href="login.php">Login</a>
                </form>
            </div>
        </div>
        <?php
            if(isset($_POST['email'])) 
            {
                $username = $_POST['username'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $role = "user";
            }

            if(mysqli_connect_error())
            {
                die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
            }
            else
            {
                $SELECT = "SELECT email FROM register WHERE email = ? LIMIT 1";
                $INSERT = "INSERT INTO register (username, firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
            }

            // Prepare Statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if($rnum==0)
            {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("ssssss", $username, $fname, $lname, $email, $pass, $role);
                $stmt->execute();
                
                ?>
                <script>
                    window.alert("Registered Successfully");
                    window.location.href = "login.php";
                </script>
                <?php
            }
            
            else 
            {
                ?>
                <script>
                    window.alert("Someone already have with this email, please Try an different email");
                    setTimeout(function(){ window.location.href = "register.php"; }, 2000);           
                </script>

                <?php
            } 
            $stmt->close();
            $conn->close();
        ?>
    </section>
</body>
</html>













<?php 
include "./includes/footer.php";
?>