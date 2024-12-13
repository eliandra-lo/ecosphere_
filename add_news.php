<?php
// Include the HTMLPurifier library
require_once 'vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $section_heading = $_POST['section_heading'];
    $description = $_POST['description']; // Raw HTML from WYSIWYG editor
    $layout = $_POST['layout'];

    // Handle the image upload
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/' . uniqid() . '-' . $image; // Unique name for uploaded file

    if (move_uploaded_file($image_tmp, $image_folder)) {
        // Connect to the database
        $conn = new mysqli("localhost", "root", "", "ecosphere");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use HTMLPurifier for sanitizing description
        $config = HTMLPurifier_Config::createDefault();
        $purifier = new HTMLPurifier($config);
        $sanitized_description = $purifier->purify($description);

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO news (title, section_heading, description, layout, image) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssss", $title, $section_heading, $sanitized_description, $layout, $image_folder);

            if ($stmt->execute()) {
                // Redirect to a success page
                echo "<script>
                        alert('News added successfully!');
                        window.location.href = 'admin_dashboard.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error adding news: " . $stmt->error . "');
                        window.history.back();
                      </script>";
            }

            $stmt->close();
        } else {
            echo "<script>
                    alert('Error preparing database statement: " . $conn->error . "');
                    window.history.back();
                  </script>";
        }

        $conn->close();
    } else {
        echo "<script>
                alert('Failed to upload image.');
                window.history.back();
              </script>";
    }
} else {
    header("Location: add_news_form.php");
    exit();
}
?>
