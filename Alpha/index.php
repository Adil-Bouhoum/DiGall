<?php
require '../connection/config.php';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'Components/head.php'; ?>
    <style>
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
        <?php include 'Components/sidenav.php'; ?>
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
