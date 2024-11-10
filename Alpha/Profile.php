<?php
require '../Connection/config.php'; 

if (!isset($_SESSION['id'])) {
    header("Location: ../Account/Login_v2.php");
    exit();
}

$baseURL = "http://localhost/P_alpha/Account/";
$userId = $_SESSION['id'];

$stmt = $conn->prepare("SELECT username, email, firstName, lastName, date_of_birth, profile_picture_url FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username, $email, $firstName, $lastName, $dateOfBirth, $profilePictureUrl);
$stmt->fetch();
$stmt->close();

$profileImagePath = $baseURL . $profilePictureUrl;
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'Components/head.php'; ?>

<?php include 'Components/sidenav.php'; ?>

<div class="container-fluid px-0">
<?php include "Components/navbar.php"; ?>

<div class="container mt-5">
    <div class="card shadow-lg" style="max-width: 600px; margin: auto;">
        <div class="card-header bg-primary text-white text-center">
            <h2 class="mb-0">User Profile</h2>
        </div>
        <div class="card-body text-center">
            <!-- Profile Picture with File Input -->
            <form action="Components/profile_pic_upload.php" method="POST" enctype="multipart/form-data" id="profilePicForm">
                <label for="profilePictureInput">
                    <img src="<?php echo htmlspecialchars($profileImagePath); ?>" alt="Profile Picture" class="rounded-circle border border-3" style="width: 150px; height: 150px; object-fit: cover; cursor: pointer;">
                </label>
                <input type="file" name="profile_picture" id="profilePictureInput" class="d-none" accept="image/*" onchange="document.getElementById('profilePicForm').submit();">
            </form>
            
            <h4 class="text-center mb-1"><?php echo htmlspecialchars($firstName) . " " . htmlspecialchars($lastName); ?></h4>
            <p class="text-center text-muted mb-3">@<?php echo htmlspecialchars($username); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($dateOfBirth); ?></p>
        </div>
        <div class="card-footer text-center">
            <a href="../Account/Edit_profile.php" class="btn btn-outline-primary me-2">Modify Profile</a>
            <a href="../Account/Change_password.php" class="btn btn-outline-secondary">Change Password</a>
            <a href="../Account/Logout.php" class="btn btn-outline-dark">Logout from Account</a>
        </div>
        
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
</html>
