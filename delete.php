<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: signin.php");
    exit();
}

include 'connections.php';

// Check if 'id' is passed in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the delete SQL query
    $sql = "DELETE FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // Redirect back to the dashboard after successful deletion
            echo "<script>
                    alert('News deleted successfully!');
                    window.location.href = 'admin_dashboard.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error deleting news: " . $stmt->error . "');
                    window.history.back();
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Error preparing delete statement: " . $conn->error . "');
                window.history.back();
              </script>";
    }

    $conn->close();
} else {
    echo "<script>
            alert('Invalid or missing news ID!');
            window.history.back();
          </script>";
}
?>
