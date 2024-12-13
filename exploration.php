<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploration | EcoSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css_folder/exploration.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
<body>


<header class="header">
    <div class="logo-container">
        <img src="pics/logofront.png" alt="EcoSphere logo">
        <a href="landing_page.php">HOME</a>
    </div>

    <nav class="nav-container">
        <ul>
            <li><a href="infohub.php">INFO HUB</a></li>
            <li><a href="donation.php">DONATION</a></li>
        </ul>
    </nav>
</header>
   

    <aside class="sidebar">
        <div>
            <i class="fas fa-map-marker-alt" style="color: blue;"></i>
            <span>MAMMALS</span>
        </div>
        <div>
            <i class="fas fa-map-marker-alt" style="color: brown;"></i>
            <span>REPTILES</span>
        </div>
        <div>
            <i class="fas fa-map-marker-alt" style="color: yellow;"></i>
            <span>BIRDS</span>
        </div>
        <div>
            <i class="fas fa-map-marker-alt" style="color: green;"></i>
            <span>AMPHIBIANS</span>
        </div>
    </aside>

    <main class="map-container">
        
        <div id="map"></div>
        <div class="dropdown">
            <button class="dropdown-btn"><i class="fas fa-arrow-down"></i> Select Category</button>
            <div class="dropdown-content">
                <a href="#" data-value="ALL">
                    <i class="fas fa-map-marker-alt" style="color: gray;"></i> ALL
                </a>
                <a href="#" data-value="MAMMALS">
                    <i class="fas fa-map-marker-alt" style="color: blue;"></i> MAMMALS
                </a>
                <a href="#" data-value="REPTILES">
                    <i class="fas fa-map-marker-alt" style="color: brown;"></i> REPTILES
                </a>
                <a href="#" data-value="BIRDS">
                    <i class="fas fa-map-marker-alt" style="color: yellow;"></i> BIRDS
                </a>
                <a href="#" data-value="AMPHIBIANS">
                    <i class="fas fa-map-marker-alt" style="color: green;"></i> AMPHIBIANS
                </a>
            </div>
        </div>
    </main>

    <footer>
            <h2 class="title">For educational purposes only.</h2>
            <div class="foot-logo-container">
                <img src="pics/logofront.png" alt="EcoSphere logo">
                <p>"A Biodiversity Platform For Critically Endangered Animal Species in the Philippines "</p>
            </div>
    </footer>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="map.js"></script>
   
</body>
</html>
