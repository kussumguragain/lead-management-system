<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'agent') {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agent Dashboard</title>
</head>
<body>
    <h2>Welcome, Agent!</h2>
    <p><a href="agent_leads.php">View My Leads</a></p>
    <p><a href="change_password.php">Change Password</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
