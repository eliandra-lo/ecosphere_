<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>References - Info Hub</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9; /* Light background */
            color: #333;
        }

        h1 {
            color: #ffffff; /* White title for contrast */
        }

        /* Header Styles */
        .header {
            background-color: #4caf50; /* Green background */
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .header a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px; /* Bigger button */
            border-radius: 8px;
            background-color: #2c6e49; /* Dark green */
            transition: background-color 0.3s ease;
            font-size: 18px; /* Adjusted button text size */
            margin-left: -15px; /* Move button slightly to the left */
        }

        .header a:hover {
            background-color: #5cbf85; /* Light green on hover */
        }

        /* Main Content Styles */
        .main-content {
            margin-top: 80px; /* Prevent overlap with fixed header */
            padding: 20px;
        }

        .reference-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .reference-container h2 {
            color: #4caf50; /* Green section headers */
            margin-bottom: 15px;
        }

        ul {
            list-style-type: none; /* Remove bullets */
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        li a {
            color: white; /* White text for links */
            text-decoration: none;
            font-weight: bold;
        }

        li a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="header">
        <h1>References</h1>
        <a href="landing_page.php">Back to Home</a>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <?php
        // References array
        $references = [
            "Info Hub" => [
                [
                    "title" => "Endangered species in the Philippines - causes and conservation",
                    "author" => "Fran",
                    "date" => "2024, March 12",
                    "source" => "FutureLearn",
                    "url" => "https://www.futurelearn.com/info/futurelearn-international/endangered-species-philippines"
                ],
                [
                    "title" => "Philippines’ rich bird life is more threatened than we thought, study says",
                    "author" => "Carolyncowan",
                    "date" => "2021, July 14",
                    "source" => "Mongabay Environmental News",
                    "url" => "https://news.mongabay.com/2021/07/philippines-rich-bird-life-is-more-threatened-than-we-thought-study-says/"
                ]
            ],
            "Exploration" => [
                [
                    "title" => "Philippine Red List of Threatened Wild Fauna",
                    "author" => "Biodiversity Management Bureau – Department of Environment and Natural Resources",
                    "date" => "2020",
                    "source" => "Biodiversity PH",
                    "url" => "https://www.biodiversity.ph/wp-content/uploads/2020/08/PRLC-Book-vertebrates.pdf"
                ]
            ]
        ];

        // Loop through sections
        foreach ($references as $section => $items) {
            echo "<div class='reference-container'>";
            echo "<h2>$section</h2>";
            echo "<ul>";

            foreach ($items as $ref) {
                echo "<li>";
                echo "{$ref['author']} ({$ref['date']}). <i>{$ref['title']}</i> - {$ref['source']}. ";
                echo "<a href='{$ref['url']}' target='_blank'>Read more</a>";
                echo "</li>";
            }

            echo "</ul>";
            echo "</div>";
        }
        ?>
    </div>

</body>
</html>
