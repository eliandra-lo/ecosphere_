<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> 
    <title>Welcome | EcoSphere</title>
    <link rel="stylesheet" href="css_folder/landing_page.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* Button appearance */
        .title {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #388e3c; /* Dark green */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            text-decoration: none; /* Removes underline */
            transition: background-color 0.3s ease;
        }

        .title:hover {
            background-color: #2e7d32; /* Darker green */
        }

        /* Styles for the green container */
        .green-container {
            background-color: #4caf50; /* Green background */
            color: white; /* White text */
            padding: 40px 20px; /* Padding for spacing */
            text-align: center; /* Centered content */
            margin-top: 20px; /* Space from previous section */
            border-top: 5px solid #388e3c; /* Top border for design */
        }

        .green-container h2 {
            font-size: 24px;
            margin-bottom: 10px; /* Space below the heading */
        }

        .green-container p {
            font-size: 16px;
            line-height: 1.6; /* Improve text readability */
        }

        .green-container a {
            color: white; /* White text for links */
            font-weight: bold;
            text-decoration: underline; /* Underline for emphasis */
            transition: color 0.3s ease; /* Smooth hover effect */
        }

        /* Unified hover effect */
        .green-container a:hover, 
        .title:hover {
            color: #c8e6c9; /* Light green */
            background-color: #2e7d32; /* Darker green for buttons */
        }

        /* Page background consistency */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e8f5e9; /* Light green background */
        }
    </style>
</head>

<body>
    <div class="scroll-container">
        <div class="body-index" id="landingPageSection">
            <div class="logo-container">
                <a href="signin.php">
                    <img src="pics/logofront.png" alt="EcoSphere Logo" class="logo">
                </a>
            </div>
        </div>

        <div class="body-index2">
            <div class="header">
                <div class="logo">
                    <a href="#landingPageSection">
                        <img src="pics/logofront.png" alt="EcoSphere logo">
                    </a>
                </div>
            </div>

            <div class="container">
                <div class="card">
                    <div class="box">
                        <img src="pics/icon1.png" class="icon2" alt="">
                    </div>
                    <a href="infohub.php" class="title">
                        <i class="fas fa-info-circle"></i> INFO HUB
                    </a>
                    <div class="description">
                        Stay informed with info section that aggregates the latest updates, insights on biodiversity, causes, and organizations working to protect endangered animal species in PH.
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="pics/icon2.png" class="icon2" alt="">
                    </div>
                    <a href="exploration.php" class="title">
                        <i class="fas fa-binoculars"></i> EXPLORATION 
                    </a>
                    <div class="description">
                        Explore profiles of 47 critically endangered animals in PH species with habitat information in our interactive animal species profiles.
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <img src="pics/icon3.png" class="icon2" alt="">
                    </div>
                    <a href="donation.php" class="title">
                        <i class="fas fa-donate"></i> DONATION 
                    </a>
                    <div class="description">
                        Support conservation efforts by donating through our Gcash QR Code, with all contributions going directly to PH-based organizations dedicated to protecting critically endangered animal species from extinction.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- New Green Container -->
    <div class="green-container">
            <h2>Our References</h2>
            <p>Check out the <a href="reference.php">Reference Page</a>.</p>
    </div>
</body>
</html>
