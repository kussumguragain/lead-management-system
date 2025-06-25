<?php
session_start();
include("../database.php"); // Update path if needed

// Check if user is logged in and is agent
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'agent') {
    header("Location: ../login/login.php");
    exit;
}

$agent_id = $_SESSION['user_id'];

// Fetch leads assigned to the agent
$sql = "SELECT * FROM leads WHERE assigned_to = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $agent_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agent Leads</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
        }
        .login-container {
            width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 10px gray;
        }
        input[type=email],
        input[type=password] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: blue;
            color: white;
            border: none;
        }
        button:hover {
            background: darkblue;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>

<h2>Your Assigned Leads</h2>
<table>
    <tr>
        <th>Lead ID</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Status</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= htmlspecialchars($row['contact']) ?></td>
        <td><?= htmlspecialchars($row['status']) ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
