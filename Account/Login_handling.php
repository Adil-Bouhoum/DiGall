<?php
require '../connection/config.php';
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Blocs Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="HAHAH.css">
</head>

<body>

</body>

</html>
<?php
// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Debugging: Confirm form submission
    error_log("Form submission received.");

    // Collect and log form data
    $usernameemail = $_POST["login-email"];
    $passwordtxt = $_POST["login-password"];
    error_log("Username/Email: $usernameemail, Password: $passwordtxt");

    // Hash the password and confirm it matches the expected format
    $password = md5($passwordtxt);
    error_log("Password (hashed): $password");

    // Execute query to find the user
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");

    if (!$result) {
        error_log("SQL query error: " . mysqli_error($conn));
        echo "Form submission failed. Please try again.";
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) > 0) {
        // Debug: Check if password matches
        if ($password == $row['password_hash']) {
            error_log("Password match successful. Logging in user.");
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["Username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $_SESSION["firstname"] = $row["firstName"];
            $_SESSION["lastname"] = $row["lastName"];
            header("Location: ../Alpha/index.php");
            exit;
        } else {
            error_log("Password mismatch.");
            echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'Authentication Failed',
                    text: 'Invalid Password or Username',
                });
                </script>";
        }
    } else {
        error_log("No user found with that username/email.");
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Authentication Failed',
                text: 'Invalid Password or Username',
            });
            </script>";
    }
}
?>