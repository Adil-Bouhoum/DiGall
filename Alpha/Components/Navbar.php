<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DiGal</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Art Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Song Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Shop</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Separated link</a>
          </div>
        </li>
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


      <!-- Profile Handeling Nav -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown ms-auto d-flex align-items-center">
            <a class="nav-link d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- Use Bootstrap's 'object-fit' to maintain aspect ratio and 'rounded-circle' for a circular image -->
                <img class="rounded-circle" src="<?php echo htmlspecialchars($profileImagePath); ?>" alt="Profile" style="width: 40px; height: 40px; object-fit: cover;">
                <span class="ms-2"><?php echo htmlspecialchars($username); ?></span> <!-- Display username next to the image -->
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item text-primary-emphasis" href="profile.php" style="font-size : 22px;"><?php echo htmlspecialchars($username); ?></a>
                <a class="dropdown-item" href="../Account/Logout.php">Logout</a>
            </div>
    </li>
    <li class="nav-item">
        <form class="d-flex ms-3 ">
            <input class="form-control me-sm-2" type="search" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </li>
</ul>
    

    <?php else: ?>
                <!-- Login and Signup links if no session is active -->
                <ul class="navbar-nav ms-auto" >
                    <li class="nav-item"><a class="nav-link" href="../Account/Login_v2.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Account/Login_v2.php">Signup</a></li>
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-sm-2" type="search" placeholder="Search">
                            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                        </form>   
                    </li>
                </ul>
            <?php endif; ?>
            
            
    </div>
  </div>
</nav>