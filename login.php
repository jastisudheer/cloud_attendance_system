<?php
// Set up database connection
$servername = "localhost";
$username = "chandu";
$password = "chandu@1234567890";
$dbname = "eattendo";

$conn = new mysqli($servername,$username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the submitted login form data
$regno = $_POST['regno'];
$password = $_POST['password'];

// Check if the user is a faculty member
$sql = "SELECT * FROM faclogin WHERE regno = '$regno' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // User is a faculty member
  header("Location: faculty.html");
} else {
  // Check if the user is a student
  $sql = "SELECT * FROM studentlogin WHERE regno = '$regno' AND password = '$password'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // User is a student
    header("Location: student.html");
  } else {
    // Invalid login credentials
    echo "Invalid login credentials.";
  }
}

// Close database connection
mysqli_close($conn);
?>
