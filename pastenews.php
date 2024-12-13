<?php
session_start();
include('connections.php'); // Ensure database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input
    $news_title = trim($_POST['newslinks_title']);
    $news_link = trim($_POST['newslinks_link']);

    // Validate input
    if (!empty($news_title) && !empty($news_link)) {
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO newslinks (title, link, added_on) VALUES (?, ?, CURRENT_DATE)");
        $stmt->bind_param("ss", $news_title, $news_link);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "News link added successfully.";
        } else {
            $_SESSION['error_message'] = "Failed to add news link. Please try again.";
        }
        $stmt->close();
    } else {
        $_SESSION['error_message'] = "Both fields are required.";
    }

    // Redirect back to admin dashboard
    header("Location: admin_dashboard.php");
    exit();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add News Link</title>
    <link rel="stylesheet" href="css_folder/admin_dashboard.css">
    <style>
        /* Header */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #4caf50; /* Dark green */
            color: white;
            padding: 15px 20px;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 3px solid #388e3c; /* Darker green border */
        }

        header h1 {
            font-size: 1.8rem;
        }

        .back-button {
            background-color: #388e3c; /* Slightly darker than header */
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
            background-color: #2e7d32; /* Darker hover shade */
        }

        /* Back to Dashboard Button */
        .back-button {
            background-color: #388e3c; /* Slightly darker than header */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2e7d32; /* Slightly darker hover shade */
        }

        /* Container */
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
            color: #388e3c; /* Dark green matching the theme */
            margin-bottom: 20px;
        }

        /* Input fields */
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
            border-color: #4caf50; /* Lighter green focus border */
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        /* Buttons */
        button {
            padding: 10px 15px;
            background-color: #388e3c; /* Slightly darker than the header */
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2e7d32; /* Darker hover color */
        }

        /* Error and Success Messages */
        .error {
            color: #d32f2f; /* Red for errors */
            font-size: 0.9rem;
            margin: 10px 0;
        }

        .success {
            color: #388e3c; /* Dark green for success */
            font-size: 0.9rem;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Add a News Link</h1>
        <a href="admin_dashboard.php" class="back-button">Back to Dashboard</a>
    </header>

    <div class="container">
        <h2>Add a News Link</h2>
        <?php if (isset($error_message)): ?>
            <div class="error"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form method="post" action="pastenews.php">
            <input type="text" name="newslinks_title" placeholder="Enter News Title" required>
            <input type="url" name="newslinks_link" placeholder="Paste News Link" required>
            <button type="submit">Add News</button>
        </form>

        <?php if (isset($_SESSION['success_message'])): ?>
            <div class="success"><?php echo $_SESSION['success_message']; ?></div>
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
    </div>
</body>
</html>
