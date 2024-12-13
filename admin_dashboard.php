<?php
session_start(); // Ensure session is started
$conn = new mysqli("localhost", "root", "", "ecosphere");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle logout
if (isset($_GET['logout']) && $_GET['logout'] === 'true') {
    session_destroy();
    header("Location: signin.php");
    exit();
}

// Fetch articles
$result_articles = $conn->query("SELECT * FROM news ORDER BY created_at DESC");

// Fetch news links
$result_news = $conn->query("SELECT * FROM newslinks ORDER BY added_on DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin's Dashboard</title>
    <link rel="stylesheet" href="css_folder/admin_dashboard.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        header {
            background-color: #4caf50;
            color: #fff;
            padding: 15px;
            text-align: center;
        }

        .logout-btn {
            float: right;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            background-color: #388e3c;
            border-radius: 5px;
            margin-top: -25px;
        }

        .main-content {
            display: flex;
            margin: 20px;
        }

        .sidebar {
            width: 20%;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .sidebar h3 {
            color: #4caf50;
            margin-bottom: 15px;
        }

        .sidebar a {
            display: block;
            color: #333;
            text-decoration: none;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .manage-articles {
            width: 75%;
            margin-left: 5%;
        }

        .manage-articles h3 {
            color: #4caf50;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f1f1f1;
        }

        .actions a {
            margin-right: 10px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
            color: #fff;
        }

        .update-btn {
            background-color: #2196f3;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #c62828;
        }

        .update-btn:hover {
            background-color: #1976d2;
        }

        img {
            max-width: 100px;
            height: auto;
            display: block;
            
        }

        /* Zoom In Animation */
.img {
  transform: scale(1.1);
  transition: transform 0.3s ease-in-out; 
}
    </style>
</head>
<body>
    <header>
        <h2>Admin's Dashboard</h2>
        <a href="admin_dashboard.php?logout=true" class="logout-btn">Logout</a>
    </header>
    
    <p style="text-align: center;">Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</p>

    <div class="main-content">
        <!-- Sidebar for Article Management -->
        <div class="sidebar">
            <h3>Manage Articles</h3>
            <a href="create.php">Add Article</a>
        </div>

        <!-- Sidebar for News Management -->
        <div class="sidebar">
            <h3>Manage News</h3>
            <a href="pastenews.php">Add News</a>
        </div>
    </div>

    <!-- Articles Management -->
    <div class="manage-articles">
        <h3>Article Posts</h3>
        <table>
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result_articles->num_rows > 0) {
                while ($row = $result_articles->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Article Image'></td>";
                    echo "<td>" . substr(strip_tags($row['description']), 0, 50) . "...</td>";
                    echo "<td class='actions'>";
                    echo "<a href='update.php?id=" . htmlspecialchars($row['id']) . "' class='update-btn'>Update</a>";
                    echo "<a href='delete.php?id=" . htmlspecialchars($row['id']) . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this article?');\">Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No articles found</td></tr>";
            }
            ?>
        </table>
    </div>

    <!-- News Links Table -->
    <div class="manage-articles">
    <h3>News Posts</h3>
    <table>
        <tr>
            <th>Title</th>
            <th>Link</th>
            <th>Date Added</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result_news->num_rows > 0) {
            while ($row = $result_news->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                echo "<td><a href='" . htmlspecialchars($row['link']) . "' target='_blank'>View News</a></td>";
                echo "<td>" . htmlspecialchars($row['added_on']) . "</td>";
                echo "<td class='actions'>";
                echo "<a href='updatenews.php?id=" . htmlspecialchars($row['id']) . "' class='update-btn'>Update</a>";
                echo "<a href='deletenews.php?id=" . htmlspecialchars($row['id']) . "' class='delete-btn' onclick=\"return confirm('Are you sure you want to delete this news?');\">Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' style='text-align: center;'>No news links added</td></tr>";
        }
        ?>
    </table>
</div>


</body>
</html>

<?php
// Close the database connection
$conn->close();
?>