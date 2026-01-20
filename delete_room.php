<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepared statement for security
    $stmt = $conn->prepare("DELETE FROM rooms WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: rooms.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
} else {
    header("Location: rooms.php");
}
$conn->close();
?>