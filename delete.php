<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fishstore"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM payments WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully'); window.location.href='admin.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    header("Location: admin.php");
    exit();
}

$conn->close();
?>