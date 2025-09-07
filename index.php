<?php
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "testdb";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    // Vulnerable SQL query (no sanitization)
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Username: " . $row["username"] . "<br>";
        }
    } else {
        echo "No user found.";
    }
}
?>
<form method="get">
    <input type="text" name="user" placeholder="Username">
    <input type="submit" value="Search">
</form>
