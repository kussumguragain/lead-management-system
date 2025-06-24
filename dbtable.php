<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Lead_Management_System"; 

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL to create users table
$sql_users = "CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  role ENUM('admin', 'agent')
)";
$sql_leads = "CREATE TABLE IF NOT EXISTS leads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(255),
  contact VARCHAR(255),
  address VARCHAR(255),
  status ENUM('new', 'contacted', 'converted', 'lost') DEFAULT 'new',
  assigned_to INT,
  created_at DATE
)";


// Execute queries
if ($conn->query($sql_users) === TRUE) {
  echo "Table 'users' created successfully.<br>";
} else {
  echo "Error creating 'users' table: " . $conn->error . "<br>";
}

if ($conn->query($sql_leads) === TRUE) {
  echo "Table 'leads' created successfully.";
} else {
  echo "Error creating 'leads' table: " . $conn->error;
}

$conn->close();
?>
