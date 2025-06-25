<?php
session_start();
include("database.php");

$user_id = $_SESSION['user_id'];
$old = $_POST['old_password'];
$new = $_POST['new_password'];

$sql = "SELECT password FROM users WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($current_pass);
$stmt->fetch();
$stmt->close();

if ($old === $current_pass) {
    $sql = "UPDATE users SET password=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new, $user_id);
    if ($stmt->execute()) {
        echo "Password changed successfully.";
    } else {
        echo "Error updating password.";
    }
} else {
    echo "Old password is incorrect.";
}
