<?php
session_start();
include('connections.php'); // Ensure database connection

// Check if ID is provided and fetch the news record
if (isset($_GET['id'])) {
    $news_id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT title, link FROM newslinks WHERE id = ?");
    $stmt->bind_param("i", $news_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
    } else {
        $_SESSION['error_message'] = "No news found with the provided ID.";
        header("Location: admin_dashboard.php");
        exit();
    }
    $stmt->close();
} else {
    $_SESSION['error_message'] = "No news ID provided.";
    header("Location: admin_dashboard.php");
    exit();
}

// Update the news record
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $news_title = trim($_POST['newslinks_title']);
    $news_link = trim($_POST['newslinks_link']);

    if (!empty($news_title) && !empty($news_link)) {
        $stmt = $conn->prepare("UPDATE newslinks SET title = ?, link = ? WHERE id = ?");
        $stmt->bind_param("ssi", $news_title, $news_link, $news_id);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "News updated successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to update news. Please try again.";
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Both fields are required.";
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News Link</title>
    <link rel="stylesheet" href="css_folder/admin_dashboard.css">
    <style>
        /* Include your existing CSS styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4caf50;
            color: white;
            padding: 15px 20px;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 3px solid #388e3c;
        }

        header h1 {
            font-size: 1.8rem;
        }

        .back-button {
            background-color: #388e3c;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2e7d32;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }

        .container h2 {
            font-size: 1.8rem;
            color: #388e3c;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="url"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
            outline: none;
        }

        input[type="text"]:focus,
        input[type="url"]:focus {
            border-color: #4caf50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        button {
            padding: 10px 15px;
            background-color: #388e3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2e7d32;
        }

        .error {
            color: #d32f2f;
            font-size: 0.9rem;
            margin: 10px 0;
        }

        .success {
            color: #388e3c;
            font-size: 0.9rem;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Update News Link</h1>
        <a href="admin_dashboard.php" class="back-button">Back to Dashboard</a>
    </header>

    <div class="container">
        <h2>Update News Link</h2>
        <?php if (isset($_SESSION['error_message'])): ?>
            <div class="error"><?php echo $_SESSION['error_message']; ?></div>
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>

        <form method="post" action="">
            <input type="text" name="newslinks_title" placeholder="Enter News Title" value="<?php echo htmlspecialchars($news['title']); ?>" required>
            <input type="url" name="newslinks_link" placeholder="Paste News Link" value="<?php echo htmlspecialchars($news['link']); ?>" required>
            <button type="submit">Update News</button>
        </form>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="success"><?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
    </div>
</body>
</html>
