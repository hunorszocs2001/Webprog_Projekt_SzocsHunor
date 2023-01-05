<!DOCTYPE html>
<html>
<body>
<?php
include("../../DBhandler.php");
$dbh = new DBhandler();
session_start();
$id = $_SESSION['userID'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webprojekt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT filename FROM storage WHERE id=$_GET[id]";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $filename = "uploads/" . $id . "/" . $row["filename"];
    }
} else {
    echo "0 results";
}

echo $filename;
header("Content-type: application/pdf");
header("Content-Length: " . filesize($filename));
readfile($filename);
$conn->close();
?>
</body>
</html>


