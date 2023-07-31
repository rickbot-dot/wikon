<?php
if (PHP_SAPI != "cli") {
  echo "This script is shell only.";
  exit;
}
// Get the user input from command line
echo "Enter username: ";
$username = trim(fgets(STDIN));
echo "Enter password: ";
$password = trim(fgets(STDIN));
echo "Enter server name: ";
$server = trim(fgets(STDIN));
echo "Enter database name: ";
$dbname = trim(fgets(STDIN));

// Create a connection object
$conn = new mysqli($server, $username, $password);

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . $conn->error . "\n";
}

// Create the user
$sql = "CREATE USER '$username'@'$server' IDENTIFIED BY '$password'";
if ($conn->query($sql) === TRUE) {
  echo "User created successfully\n";
} else {
  echo "Error creating user: " . $conn->error . "\n";
}

// Grant all privileges to the user
$sql = "GRANT ALL ON $dbname.* TO '$username'@'$server' WITH GRANT OPTION;";
if ($conn->query($sql) === TRUE) {
  echo "User granted all privileges\n";
} else {
  echo "Error granting privileges: " . $conn->error . "\n";
}

// Close the connection
$conn->close();
echo "\n";
?>
