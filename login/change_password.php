<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<form method="POST" action="update_password.php">
  <label>Old Password:</label>
  <input type="password" name="old_password" required><br>
  <label>New Password:</label>
  <input type="password" name="new_password" required><br>
  <button type="submit">Change Password</button>
</form>
