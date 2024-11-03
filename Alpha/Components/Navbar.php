<nav class="navbar navbar-expand-lg custom-navbar navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/P_Alpha/Alpha/index.php">My Website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
            </ul>

            <?php if (isset($_SESSION['id'])): ?>
                <?php 
                    $userId = $_SESSION['id'];
                    $username = $_SESSION['Username'];
                    $baseURL = "http://localhost/P_alpha/Account/";
                    
                    $stmt = $conn->prepare("SELECT profile_picture_url FROM users WHERE id = ?");
                    $stmt->bind_param("i", $userId);
                    $stmt->execute();
                    $stmt->bind_result($profileImage);
                    $stmt->fetch();
                    $stmt->close();
                    $profileImagePath = $baseURL . $profileImage;

                ?>
                <!-- Profile dropdown if user is logged in -->
                <div class="dropdown ms-auto">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-profile rounded-circle" src="<?php echo htmlspecialchars( $profileImagePath); ?>" alt="Profile" />
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="profile.php"><?php echo htmlspecialchars($username); ?></a></li>
                        <li><a class="dropdown-item" href="../Account/Logout.php">Logout</a></li>
                    </ul>
                </div>
            <?php else: ?>
                <!-- Login and Signup links if no session is active -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../Account/Login_v2.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Account/Login_v2.php">Signup</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<style>
    /* Adjust the profile image size */
    .img-profile {
        width: 40px;
        height: 40px;
        object-fit: cover;
    }
</style>
