<?php
// Connecting to database...
require '..\..\connection\config.php';

// Collecting Signup page Data....
if (isset($_POST["submit"])) {
    // Debug: Check if form is submitting
    error_log("Form is submitting.");
    // Getting input values from form
    $username = $_POST["username"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $dob = $_POST["dob"];
    $social_links = $_POST["social_links"];

    // Handling profile picture upload
    $profile_picture = '';
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $profile_picture = 'uploads/' . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_picture);
    }

    // Checking if username or email already exists in the database
    $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script> alert('Username or Email Has Already Been Taken'); </script>";
    } else {
        // Check if passwords match
        if ($password == $confirmpassword) {
            // Hashing the password before storing it
            $hashed_password = md5($password);

            // Inserting data into the database
            $query = "INSERT INTO users (username, email, password_hash, firstName, lastName, date_of_birth, profile_picture_url, social_media_links)
            VALUES ('$username', '$email', '$hashed_password', '$firstName', '$lastName', '$dob', '$profile_picture', '$social_links')";
            
            if (mysqli_query($conn, $query)) {
                echo "<script> alert('Registration Successful'); </script>";
            } else {
                // Output any SQL errors
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script> alert('Password Does Not Match'); </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blocs Login</title>
    <link rel="stylesheet" href="HAHAH.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <!-- NAVBAR CREATION -->
    <header>
        <div class="nav_bar">
            <div class="nav_logo"><img src="Logo.png" alt="Logo"></div>
            <div class="nav_menu">
                <ul>
                    <li><a href="#">Log in</a></li>
                    <li><a href="#">Register</a></li>
                    <li>
                        <div class="dropdown_menu">
                            <button class="dropbtn">Language</button>
                            <div class="dropdown_content">
                                <a href="#">English</a>
                                <a href="#">Français</a>
                                <a href="#">Arabic</a>
                            </div>
                        </div>
                    </li>   
                    <li><button type="button">Dark/Light</button></li>
                </ul>
            </div>
        </div>
    </header>
    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"><i class='bx bxl-xing'></i>Blocs</h2>
            <div class="text-item">
                <h2>Welcome! <br><span>To Your Bloc!</span></h2>
                <p>Join the Community.</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-youtube'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-linkedin'></i></a>
                </div>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">
                <form action="" onsubmit="handleLogin(event)">
                    <h2>Sign In</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" id="login-email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" id="login-password" required>
                        <label>Password</label>
                        
                    </div>
                    <div class="remember-password">
                        <label><input type="checkbox">Remember Me</label>
                        <a href="#">Forget Password</a>
                    </div>
                    <div class="remember-password">
                        <label><input type="checkbox" id="show-password-login"> Show Password</label>
                    </div>
                    <button class="btn" type="submit">Login In</button>
                    <div class="create-account">
                        <p>Create A New Account? <a href="#" class="register-link">Sign Up</a></p>
                    </div>
                </form>
            </div>
            <!-- Signup Form -->
            <div class="form-box register">
            <form class="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <h2>Sign Up</h2>
                    <!-- Username -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="username" id="username" class="form-control" required value="">
                        <label>Username</label>
                    </div>
                    <!-- First Name -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="firstName" id="firstName" class="form-control" value="">
                        <label>First name</label>
                    </div>
                    <!-- Last Name -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" name="lastName" id="lastName" class="form-control" value="">
                        <label>Last name</label>
                    </div>
                    <!-- Email -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" id="email" class="form-control" required value="">
                        <label>Email</label>
                    </div>
                    <!-- Password -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="password" id="password" class="form-control" required value="">
                        <label>Password</label>
                    </div>
                    <!-- Confirm Password -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required value="">
                        <label>Confirm Password</label>
                    </div>
                    <!-- Profile Pic -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control">
                        <label for="profile_picture">Profile Picture: </label>
                    </div>
                    <!-- DOB -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="date" name="dob" id="dob" class="form-control">
                        <label for="dob">Date of Birth: </label>
                    </div>
                    <!-- DOB -->
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt'></i></span>
                        <input type="text" name="social_links" id="social_links" class="form-control" placeholder="Enter your social media links (optional)">
                        <label for="social_links">Social Media Links: </label>
                    </div>

    
                    <div class="remember-password">
                        <label><input type="checkbox">I agree with this statement</label>
                    </div>
                    <div class="remember-password">
                        <label>  <input type="checkbox" id="show-password-signup"> Show Password   </label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Register</button>
                    <div class="create-account">
                        <p>Already Have An Account? <a href="#" class="login-link">Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="javas.js"></script>
    <script>
        document.getElementById('show-password-login').addEventListener('change', function() {
    const loginPassword = document.getElementById('login-password');
    if (this.checked) {
        loginPassword.type = 'text';
    } else {
        loginPassword.type = 'password';
    }
});

document.getElementById('show-password-signup').addEventListener('change', function() {
    const signupPassword = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmpassword');
    if (this.checked) {
        signupPassword.type = 'text';
        confirmPassword.type = 'text';
    } else {
        signupPassword.type = 'password';
        confirmPassword.type = 'password';
    }
});
    </script>
</body>
</html>
