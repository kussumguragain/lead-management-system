<?php
session_start();
include("../database.php");  // Make sure this defines $conn and doesn't close it

// Check if form data exists
if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: login.php");
    exit;
}

$email = $_POST['username'];
$password = $_POST['password'];

// Hash password if stored hashed; otherwise use plain (NOT recommended)
$hashed_password = md5($password);  // Or use password_hash and password_verify

// Check connection
if (!$conn || $conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Prepare and execute query safely
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
