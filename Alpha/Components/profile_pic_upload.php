<?php
require '../../Connection/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['profile_picture']) && isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $targetDir = "../../Account/uploads/";
    $fileName = basename($_FILES['profile_picture']['name']);
    $targetFilePath = $targetDir . $fileName;

    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFilePath)) {
        // Update profile picture URL in the database
        $stmt = $conn->prepare("UPDATE users SET profile_picture_url = ? WHERE id = ?");
        $profilePictureUrl = "uploads/" . $fileName;
        $stmt->bind_param("si", $profilePictureUrl, $userId);
        $stmt->execute();
        $stmt->close();

        header("Location: ../profile.php");
        exit();
    } else {
        echo "Failed to upload the profile picture.";
    }
}
?>
