<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>

    <!-- Link to Froala Editor CSS -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css">

    <!-- Link to Froala Editor JS -->
    <script src="https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js"></script>

    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f9e8; /* Light green background */
            color: #333; /* Dark text for contrast */
            margin: 0;
            padding: 0;
        }

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
            margin: 0;
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

        /* Form Styles */
        form {
            max-width: 800px; /* Increased width for the form */
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff; /* White background for the form */
            border: 2px solid #8bc34a; /* Green border */
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #388e3c; /* Medium green for labels */
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #8bc34a; /* Green border for inputs */
            border-radius: 4px;
            box-sizing: border-box; /* Include padding and border in width */
        }

        button {
            background-color: #4caf50; /* Green button */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%; /* Full width button */
            margin-bottom: 10px; /* Space between buttons */
        }

        button:hover {
            background-color: #388e3c; /* Darker green on hover */
        }

        textarea {
            min-height: 200px; /* Minimum height for the textarea */
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px; /* Space between buttons */
        }
    </style>
</head>
<body>
    <header>
        <h1>Add Article</h1>
        <a href="admin_dashboard.php" class="back-button">Back to Dashboard</a>
    </header>

    <!-- Form for adding new news -->
    <form action="add_news.php" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="section_heading">Section Heading:</label>
        <input type="text" id="section_heading" name="section_heading" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required>

        <label for="layout">Layout:</label>
        <select id="layout" name="layout" required>
            <option value="left-image">Left Image</option>
            <option value="right-image">Right Image</option>
            <option value="centered">Centered</option>
            <option value="background-image">Background Image</option>
        </select>

        <!-- Froala Editor Textarea -->
        <label for="description">Description (Editable by Admin):</label>
        <textarea id="editor" name="description" required></textarea>

        <div class="button-container">
            <button type="submit">Add News</button>
            <button type="button" onclick="resetForm()">Reset</button>
        </div>
    </form>

    <script>
        new FroalaEditor('#editor', {
            imageUploadURL: 'http://localhost/Ecosphere/upload.php',
            imageUploadParams: { id: 'editor' },
            placeholderText: 'Enter your description here...',
            heightMin: 300,
            toolbarButtons: [
                'bold', 'italic', 'underline', 'strikeThrough', '|',
                'fontSize', 'color', 'align', 'formatOL', 'formatUL', '|',
                'insertLink', 'insertImage', 'insertHR', '|',
                'clearFormatting', 'selectAll', 'html'
            ],
            events: {
                'contentChanged': function () {
                    // Your content change logic if necessary
                }
            }
        });

        function resetForm() {
            document.querySelector('form').reset(); // Reset the form fields
        }
    </script>
</body>
</html>
