<?php
session_start();
include("../database.php");  

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: login.php");
    exit;
}

$email = $_POST['username'];
$password = $_POST['password'];


$hashed_password = md5($password);  

// Check connection
if (!$conn || $conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}
$stmt->bind_param("ss", $email, $hashed_password);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['email'] = $user['email'];

    header("Location: dashboard.php");
    exit;
} else {
    $_SESSION['login_error'] = "Invalid email or password.";
    header("Location: login.php");
    exit;
}
