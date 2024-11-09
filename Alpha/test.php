<?php
require '../connection/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../node_modules/bootswatch/dist/vapor/bootstrap.min.css">
    <title>Document</title>

    <style>
        /* Additional styling */
        body {
            background-color: #1b1b1b;
            color: #d6d6d6;
            display: flex;
        }

        /* Side nav styling */
        .side-nav {
            width: 90px;
            background-color: #18042c;
            position: fixed;
            height: 100vh;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
        }

        .side-nav a {
            font-size: 20px;
            text-align: center;
            width: 100%;
            padding: 10px 0;
            transition: background 0.3s;
            padding: 1rem;
            border:#1b1b1b;
            box-shadow: none;
        }
        
        .side-nav a i {
            display: block;
            font-size: 24px;
        }

        /* Main content styling */
        .main-content {
            margin-left: 80px;
            width: 100%;
            padding: 20px;
        }

        .category-tabs button {
            margin: 10px;
            font-size: 1.12rem;
        }

        .art-grid, .music-grid {
            display: grid;
            gap: 10px;
        }

        .art-grid {
            grid-template-columns: repeat(3, 1fr);
            padding: 20px 0;
        }

        .art-thumbnail, .music-thumbnail {
            background-color: #333;
            border-radius: 10px;
            aspect-ratio: 1/1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            color: #888;
        }

        .music-section .genre-tabs {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            padding: 10px 0;
        }

        .music-thumbnail, .artist-profile {
            text-align: center;
        }

        .footer {
            background-color: #333;
            padding: 20px;
            color: #888;
        }
        
    </style>
</head>

<body>

    <!-- Side Nav -->
    <div class="side-nav">
        <a href="" class=""><i class=""></i></a>
        <a href="" class=""><i class=""></i></a>
        <a href="#" class="btn btn-outline-primary"><i class="fas fa-home"></i></a>
        <a href="#" class="btn btn-outline-primary"><i class="fas fa-bolt"></i></a>
        <a href="#" class="btn btn-outline-primary"><i class="fas fa-palette"></i></a>
        <a href="#" class="btn btn-outline-primary"><i class="fas fa-music"></i></a>
        <a href="#" class="btn btn-outline-primary"><i class="fas fa-users"></i></a>
        <a href="#" class="btn btn-outline-primary"><i class="fas fa-cog"></i></a>
    </div>

    <!-- Main content -->
    <div class="container-fluid px-0">
        <?php include 'Components/navbar.php'; ?>

        <div class="container mt-3 category-tabs">
            <button class="btn btn-outline-secondary btn-sm">All Art</button>
            <button class="btn btn-outline-secondary btn-sm">Fantasy</button>
            <button class="btn btn-outline-secondary btn-sm">Character Design</button>
            <button class="btn btn-outline-secondary btn-sm">Cosplay</button>
        </div>

        <!-- Art Section -->
        <div class="container art-section">
            <div class="art-grid">
                <div class="art-thumbnail"><i class="fas fa-image"></i></div>
                <div class="art-thumbnail"><i class="fas fa-image"></i></div>
                <div class="art-thumbnail"><i class="fas fa-image"></i></div>
                <div class="art-thumbnail"><i class="fas fa-image"></i></div>
                <div class="art-thumbnail"><i class="fas fa-image"></i></div>
                <div class="art-thumbnail"><i class="fas fa-image"></i></div>
            </div>
        </div>

        <!-- Music Section -->
        <div class="container music-section mt-4">
            <div class="genre-tabs category-tabs">
                <button class="btn btn-outline-secondary btn-sm">POP</button>
                <button class="btn btn-outline-secondary btn-sm">Rap</button>
                <button class="btn btn-outline-secondary btn-sm">Jazz</button>
                <button class="btn btn-outline-secondary btn-sm">Rock</button>
                <button class="btn btn-outline-secondary btn-sm">Electronic</button>
            </div>

            <div class="music-grid mt-2 d-flex justify-content-between">
                <div class="music-thumbnail"><i class="fas fa-music"></i><p>Song Name</p></div>
                <div class="music-thumbnail"><i class="fas fa-music"></i><p>Song Name</p></div>
                <div class="music-thumbnail"><i class="fas fa-music"></i><p>Song Name</p></div>
                <div class="music-thumbnail"><i class="fas fa-music"></i><p>Song Name</p></div>
            </div>

            <div class="artist-profiles mt-3 d-flex justify-content-between">
                <div class="artist-profile">
                    <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px;"></div>
                    <p>Artist Name</p>
                </div>
                <div class="artist-profile">
                    <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px;"></div>
                    <p>Artist Name</p>
                </div>
                <div class="artist-profile">
                    <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px;"></div>
                    <p>Artist Name</p>
                </div>
                <div class="artist-profile">
                    <div class="rounded-circle bg-secondary" style="width: 50px; height: 50px;"></div>
                    <p>Artist Name</p>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center">
            <div class="container">
                <a href="#" class="text-decoration-none text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-decoration-none text-white mx-2"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-decoration-none text-white mx-2"><i class="fab fa-twitter"></i></a>
                <div class="mt-3">
                    <a href="#" class="text-white mx-2">About</a>
                    <a href="#" class="text-white mx-2">Contact</a>
                    <a href="#" class="text-white mx-2">Terms of Service</a>
                    <a href="#" class="text-white mx-2">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
