<?php
// Connecting to database...
require '..\connection\config.php';

// Collecting Signup page Data....
if (isset($_POST["submit"])) {
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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../Styles/style.css">
    <title>Registration</title>
  </head>
  <body>
    <div class="container">
      <div class="sub-container">
        <div class="form_header">
          <h2>Registration</h2>
        </div>  
        <div class="form_body">
          <form class="" action="" method="post" enctype="multipart/form-data" autocomplete="off">
            
            <!-- Username -->
            <label for="username">Username: </label>
            <input type="text" name="username" id="username" class="form-control" required value=""> 
            <br> 

            <!-- First Name (optional) -->
            <label for="firstName">First Name: </label>
            <input type="text" name="firstName" id="firstName" class="form-control" value=""> 
            <br> 

            <!-- Last Name (optional) -->
            <label for="lastName">Last Name: </label>
            <input type="text" name="lastName" id="lastName" class="form-control" value=""> 
            <br> 

            <!-- Email -->
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" class="form-control" required value=""> 
            <br>

            <!-- Password -->
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" class="form-control" required value=""> 
            <br>

            <!-- Confirm Password -->
            <label for="confirmpassword">Confirm Password: </label>
            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" required value=""> 
            <br>

            <!-- Profile Picture (optional) -->
            <label for="profile_picture">Profile Picture: </label>
            <input type="file" name="profile_picture" id="profile_picture" class="form-control">
            <br>

            <!-- Date of Birth (optional) -->
            <label for="dob">Date of Birth: </label>
            <input type="date" name="dob" id="dob" class="form-control">
            <br>

            <!-- Social Media Links (optional) -->
            <label for="social_links">Social Media Links: </label>
            <input type="text" name="social_links" id="social_links" class="form-control" placeholder="Enter your social media links (optional)">
            <br>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" name="submit">Register</button>
          </form>
          <br>
          <a href="Login.php">Already have an account?</a>
        </div>
      </div> 
    </div>
  </body>
</html>
