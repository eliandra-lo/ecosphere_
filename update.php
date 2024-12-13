<?php
session_start();
$conn = new mysqli("localhost", "root", "", "ecosphere");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the news item
    $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $news = $result->fetch_assoc();
    } else {
        die("No news found for this ID.");
    }
} else {
    die("Invalid or missing ID.");
}

// Handle form submission for update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $section_heading = $_POST['section_heading'];
    $description = $_POST['description'];
    $layout = $_POST['layout'];

    // Handle new image upload
    if (!empty($_FILES['image']['name'])) {
        $new_image = "uploads/" . uniqid() . "-" . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $new_image)) {
            $image = $new_image;
        } else {
            die("Failed to upload the new image.");
        }
    } else {
        $image = $news['image']; // Retain current image if none is uploaded
    }

    // Update the record in the database
    $stmt = $conn->prepare("UPDATE news SET title = ?, section_heading = ?, description = ?, layout = ?, image = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $title, $section_heading, $description, $layout, $image, $id);

    if ($stmt->execute()) {
        // Redirect to admin_dashboard.php after successful update
        header("Location: admin_dashboard.php");
        exit(); // Ensure no further code is executed after redirect
    } else {
        die("Error updating record: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>

    <!-- Froala Editor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css">

    <!-- Froala Editor JS -->
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f9e8;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #4caf50;
            text-align: center;
        }

        form {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border: 2px solid #8bc34a;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #388e3c;
        }

        input, select, textarea, button {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #8bc34a;
            border-radius: 4px;
        }

        button {
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #388e3c;
        }

        .current-image-container {
            text-align: center;
            margin: 20px 0;
        }

        .current-image {
            max-width: 200px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <h1>Edit News</h1>

    <form action="update.php?id=<?php echo htmlspecialchars($id); ?>" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($news['title']); ?>" required>

        <label for="section_heading">Section Heading:</label>
        <input type="text" id="section_heading" name="section_heading" value="<?php echo htmlspecialchars($news['section_heading']); ?>" required>

        <label for="image">Update Image:</label>
        <input type="file" id="image" name="image">
        <div class="current-image-container">
            <img src="<?php echo htmlspecialchars($news['image']); ?>" alt="Current News Image" class="current-image">
        </div>
        <p>Leave this field empty to retain the current image.</p>

        <label for="layout">Layout:</label>
        <select id="layout" name="layout" required>
            <option value="left-image" <?php echo $news['layout'] === 'left-image' ? 'selected' : ''; ?>>Left Image</option>
            <option value="right-image" <?php echo $news['layout'] === 'right-image' ? 'selected' : ''; ?>>Right Image</option>
            <option value="centered" <?php echo $news['layout'] === 'centered' ? 'selected' : ''; ?>>Centered</option>
            <option value="background-image" <?php echo $news['layout'] === 'background-image' ? 'selected' : ''; ?>>Background Image</option>
        </select>

        <label for="description">Description (Editable by Admin):</label>
        <textarea id="editor" name="description"><?php echo htmlspecialchars($news['description']); ?></textarea>

        <button type="submit">Save Changes</button>
    </form>

    <script>
        new FroalaEditor('#editor', {
            placeholderText: 'Edit the description here...',
            heightMin: 300,
            toolbarButtons: [
                'bold', 'italic', 'underline', 'strikeThrough', '|',
                'align', 'formatOL', 'formatUL', '|',
                'insertLink', 'insertImage', '|', 'clearFormatting', 'html'
            ]
        });
    </script>
</body>
</html>
