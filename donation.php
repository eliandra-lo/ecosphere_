<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation | EcoSphere</title>

<style>
    body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #e7f5d2; /* Light green background */
    color: #2b4d29; /* Dark green text */
}
html, body {
    height: 100%;
    overflow-y: scroll;
}

/* Header styling */
.header {
    background-color: #2c6e49; /* Dark green */
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px; /* Adjusted padding */
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1000; /* Ensures the header stays on top */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

/* Logo container */
.logo-container {
    display: flex;
    align-items: center;
    gap: 10px; /* Space between logo and text */
}

.logo-container img {
    height: 60px; /* Adjusted size for better alignment */
    width: auto;
}

.logo-container a {
    font-size: 20px;
    font-weight: bold;
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;
}

.logo-container a:hover {
    color: #5cbf85; /* Light green on hover */
}

/* Navigation menu styling */
/* Navigation styling */
.header nav ul {
  list-style: none; /* Remove default bullets */
  display: flex; /* Align items horizontally */
  padding: 0;
  margin: 0;
}

.header nav ul li {
  margin: 0 10px; /* Space between links */
}

.header nav ul li a {
  display: block; /* Keep block for hover area */
  color: white;
  padding: 10px 45px; /* Add inner spacing */
  text-decoration: none;
  font-size: 22px;
  font-weight: bold;
  background-color: #2c6e49; /* Match header background */
  border-radius: 5px; /* Rounded corners for links */
  transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hover effects for links */
.header nav ul li a:hover {
  background-color: #5cbf85; /* Light green hover color */
  color: white;
}


/* Images Section */
.images-section {
    display: flex;
    justify-content: center;
    gap: 20px;
    padding: 20px;
    background-color: #c2e4b6; /* Soft green */
    margin-top: 120px; /* Adjust for fixed header */
}
.images-section .animal-image {
    width: 300px;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Main Container */
.container {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 40px 20px;
    gap: 40px;
    background-color: #d9f0c3; /* Pale green */
}
.gcash-card img {
    width: 250px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.message {
    max-width: 600px;
    text-align: center;
}
.message h1 {
    font-size: 36px;
    color: #397d35; /* Forest green */
}
.message h1 span {
    color: #2b4d29; /* Darker green */
}
.message p {
    font-size: 18px;
    line-height: 1.6;
    color: #2b4d29;
    margin: 15px 0; /* Added margins for better spacing */
}

/* Organization Section */
.org-section {
    display: flex;
    flex-direction: row;
    gap: 20px;
    align-items: flex-start;
    margin: 20px auto;
    max-width: 900px;
    background-color: #e7f5d2; /* Light green */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
.org-image {
    width: 150px;
    height: auto;
    border-radius: 10px;
    float: left; /* Allows text wrapping */
    margin-right: 20px; /* Adds spacing between image and text */
}
.org-text {
    flex: 1;
}
.org-text h2 {
    font-size: 24px;
    color: #397d35;
    margin-bottom: 10px;
}
.org-text p {
    font-size: 16px;
    line-height: 1.6;
    margin: 10px 0;
}
.org-text a {
    color: #2b4d29;
    font-weight: bold;
}
.org-text a:hover {
    text-decoration: underline;
}

/* Universal Reset */
body, h1, h2, h3, p, ul, li, a {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* General Container Styling */
.container, .org-section, .donation-container, .trust-container, .allocation-container {
    max-width: 1100px;
    margin: 20px auto;
    background-color: #f9ffe5; /* Subtle light green */
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

/* Content Alignment */
.container, .content {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
    align-items: flex-start;
}

/* Title Styling */
h1, h2, h3 {
    color: #397d35; /* Forest green */
    font-weight: bold;
    margin-bottom: 15px;
}

/* Paragraph Styling */
p {
    font-size: 16px;
    line-height: 1.6;
    color: #2b4d29; /* Dark green */
}

/* Image Styling */
.org-image, .image, .side-image {
    width: 200px;
    height: auto;
    border-radius: 8px;
    margin-right: 20px;
    flex-shrink: 0;
}

/* Links */
a {
    color: #397d35;
    text-decoration: none;
    font-weight: bold;
}

/* Columns */
.left-column, .right-column {
    flex: 1;
    min-width: 300px;
}

.content .left-column {
    padding-right: 20px;
}

.content .right-column {
    border-left: 2px solid #c2e4b6;
    padding-left: 20px;
}

/* List Styling */
ul {
    list-style: disc;
    padding-left: 20px;
    margin-bottom: 15px;
}

/* Text Section Styling */
.text-section {
    max-width: 800px;
    margin: 40px auto; /* Centers the section with space around it */
    text-align: center; /* Centers the text content */
    padding: 20px;
    background-color: #f9ffe5; /* Light green background */
    border-radius: 10px; /* Smooth rounded edges */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

.text-section .divider {
    border: none;
    height: 2px;
    background-color: #c2e4b6; /* Soft green */
    margin: 10px 0 20px; /* Creates spacing around the line */
}

.text-section .quote {
    font-size: 24px;
    font-style: italic;
    color: #397d35; /* Forest green */
    margin-bottom: 10px;
}

.text-section .subheading {
    font-size: 20px;
    font-weight: bold;
    color: #2b4d29; /* Darker green */
    margin-bottom: 15px;
}

.text-section .description {
    font-size: 16px;
    line-height: 1.6;
    color: #2b4d29; /* Darker green */
    margin: 0 0 10px;
}

/* Impact Section Styling */
.impact-container {
    max-width: 800px;
    margin: 30px auto; /* Centers the section with less vertical space */
    padding: 15px;
    background-color: #f0fae6; /* Light green background */
    border-radius: 10px; /* Rounded corners for a polished look */
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    text-align: center; /* Centers the text content */
}

.impact-container .title {
    font-size: 24px; /* Slightly smaller title font size */
    font-weight: bold;
    color: #397d35; /* Forest green for emphasis */
    margin-bottom: 10px; /* Space below the title */
}

.impact-container .intro-text {
    font-size: 16px; /* Reduced font size for smaller text */
    line-height: 1.4; /* Maintains good readability with tighter spacing */
    color: #2b4d29; /* Darker green */
    margin: 0 auto; /* Ensures text is centered */
    max-width: 700px; /* Keeps the text block narrow and focused */
}

/* Footer Styling */
.footer {
    background-color: #397d35; /* Dark green background */
    color: white; /* White text */
    display: flex; /* Use flexbox for layout */
    justify-content: space-between; /* Space elements evenly */
    align-items: center; /* Center items vertically */
    padding: 20px 30px; /* Increased padding for a larger footer */
    margin-top: 20px; /* Space above the footer */
    border-radius: 0 0 12px 12px; /* Rounded corners at the bottom */
    box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2); /* Optional shadow for depth */
    font-size: 16px; /* Increased font size for better readability */
}

/* Footer Content Alignment */
.footer-left, .footer-right {
    display: flex;
    align-items: center;
}

/* Footer Links */
.footer-right a {
    color: white; /* White text for links */
    margin-left: 20px; /* Increased space between links */
    text-decoration: none; /* Remove underline */
    font-size: 16px; /* Consistent font size for links */
}

    </style>
</head>
<body>
    <!-- Header -->
<header class="header">
    <div class="logo-container">
        <img src="pics/logofront.png" alt="EcoSphere logo">
        <a href="landing_page.php">HOME</a>
    </div>

    <nav class="nav-container">
        <ul>
            <li><a href="exploration.php">EXPLORATION</a></li>
            <li><a href="infohub.php">INFO HUB</a></li>
        </ul>
    </nav>

</header>
    

    <!-- Images Section -->
    <section class="images-section">
        <img src="pics/Dugong.png" alt="Dugong" class="animal-image">
        <img src="pics/Eagle.png" alt="Philippine Eagle" class="animal-image">
        <img src="pics/Tamarraw.png" alt="Tamaraw" class="animal-image">
    </section>

    <!-- Main Container -->
    <div class="container">
        <div class="gcash-card">
            <img src="pics/Gkas.jpg" alt="GCash Card">
        </div>
        <div class="message">
            <h1>Our Promise:</h1>
            <p>
                By donating through us, you can be confident that your generosity is supporting 
                a balanced and effective approach to wildlife conservation. Thank you for being a 
                part of this important effort!
            </p>
            <h1><span>Thank YOU</span> for donating!</h1>
        </div>
    </div>

    <!-- Text Section -->
    <section class="text-section">
        <hr class="divider">
        <div class="text-container">
            <h1 class="quote">“A drive for a change....”</h1>
            <h2 class="subheading">Support Conservation Efforts</h2>
            <p class="description">
                Join EcoSphere in the vision to protect critically endangered animal species in the Philippines.
                Your generous contributions will directly support organizations dedicated to conservation efforts,
                research, and habitat preservation.
            </p>
        </div>
    </section>

    <!-- Impact Section -->
    <div class="impact-container">
        <h1 class="title">Impacts Of Your Donations</h1>
        <p class="intro-text">
            Your contributions play a vital role to protect critically endangered animal species in the Philippines. 
            Your support makes a difference in the projects of the following organizations:
        </p>
    </div>

        <div class="org-section">
            <img src="pics/EadleIcon.png" alt="Philippine Eagle" class="org-image">
            <div class="org-text">
                <h2 class="org-title">1. Philippine Eagle Foundation</h2>
                <p class="org-description">
                    The Philippine Eagle Foundation is a non-profit organization dedicated to saving the endangered Philippine Eagle and its rainforest habitat.
                </p>
                <p class="org-description">
                    Organized in 1987, it had before that time been operating as a project undertaking research, rehabilitation, and captive breeding. 
                    Staffed by highly trained and dedicated personnel, it has today evolved into the country’s premiere organization for the conservation of raptors.
                </p>
                <p class="website-link">
            Visit their website: <a href="https://www.philippineeaglefoundation.org/pef" target="_blank">https://www.philippineeaglefoundation.org/pef</a>
        </p>
            </div>
        </div>

    <!-- PhilBio Section -->
    <div class="org-section">
        <img src="pics/Philbiopic.png" alt="PhilBio Image" class="image">
        <div class="text">
            <h2>2. PhilBio</h2>
            <p>
                PhilBio was established for the specific purpose of furthering the biodiversity conservation activities of the 
                ‘Philippines Biodiversity Conservation Programme (PBCP)’ initiated in the 1990’s. PhilBio endeavors to provide 
                increased technical assistance to local partners (whether governmental or non-governmental) and enable the 
                conservation of the Philippines’ unique and threatened environment, biodiversity and natural resources into 
                perpetuity.
            </p>
            <p>
                It is envisioned that the only realistic means of achieving such a goal is via the establishment of integrated, 
                long-term and locally-based biodiversity conservation and development programs, that includes improved 
                dissemination of knowledge, enhanced management practices and the active participation and collaboration of 
                relevant stakeholders, particularly those most dependent upon the natural resources of each region.
                <p class="website">
                Visit their website: <a href="https://www.philbio.org.ph/" target="_blank">https://www.philbio.org.ph/</a>
            </p>
            </p>
        </div>
    </div>

    <!-- Marine Conservation Section -->
    <div class="org-section">
        <img src="pics/MarineLogo.png" alt="Marine Conservation Philippines Logo" class="side-image">
        <div class="text">
            <h3>3. Marine Conservation Philippines</h3>
            <p>
                Marine Conservation Philippines is registered with the Philippines Securities and Exchange Commission as a non-stock, non-profit organization, under reg. no. CN201506332 and is audited by an external certified public accountant. Marine Conservation Philippines is formally registered under the nomen “Marine Habitat Preservation of the Philippines inc.”
            </p>
            <p>
                Marine Conservation Philippines (MCP) is a registered non-governmental organization (NGO) dedicated to preserving and protecting coastal resources in the Philippines through education, volunteerism, and research. We engage local communities and policy makers and work to ensure solutions that will benefit both man and nature in the long run.
            </p>
            <p class="website">
                Visit their website: <a href="https://www.marineconservationphilippines.org/" target="_blank">https://www.marineconservationphilippines.org/</a>
            </p>
        </div>
    </div>

    <!-- New Section: Why Donate -->
    <div class="donation-container">
        <h1>Why Donate Through Us?</h1>
        <ol>
            <li>
                <strong>Streamlined Process:</strong> Donating through our GCash QR code offers a quick and convenient way to contribute without the hassle of navigating multiple platforms.
            </li>
            <li>
                <strong>Targeted Impact:</strong> By donating through us, you ensure that your funds are directed specifically to projects we oversee, maximizing their impact on critically endangered species in the Philippines.
            </li>
            <li>
                <strong>Transparency and Accountability:</strong> We provide clear updates and reports on how your donations are being used, so you can see the direct results of your support.
            </li>
            <li>
                <strong>Collective Strength:</strong> Your contributions, combined with those from other supporters, allow us to undertake larger, more impactful projects that can drive significant change.
            </li>
        </ol>
        <p>
            By choosing to donate through our GCash platform, you’re not just making a donation; you’re becoming part of a movement dedicated to wildlife conservation. Thank you for your support!
        </p>
    </div>

    <!-- New Section: Your Trust Matters -->
    <div class="trust-container">
        <h1>Your Trust Matters</h1>
        <p>
            We understand that trust is essential when it comes to donations. We want to assure you that:
        </p>
        <ul>
            <li>
                <strong>Transparency:</strong> We are committed to full transparency regarding how your contributions are utilized. Regular reports will be provided to show the impact of your donations.
            </li>
            <li>
                <strong>Dedicated to Our Mission:</strong> Every peso you donate goes directly to our conservation efforts.
            </li>
            <li>
                We prioritize funding initiatives that protect critically endangered species and their habitats.
            </li>
            <li>
                <strong>Accountability:</strong> Our organization adheres to strict ethical standards and is accountable to our supporters. We undergo regular audits to ensure your donations are used responsibly.
            </li>
            <li>
                <strong>Community Focused:</strong> We work closely with conservation partners to ensure that the funds contribute directly to impactful projects and initiatives.
            </li>
        </ul>
        <p>
            Your support empowers us to make a real difference, and we are dedicated to using your donations wisely and ethically. Thank you for trusting us with your contribution!
        </p>
    </div>

    <div class="allocation-container">
        <h1>Equal Allocation:</h1>
        <div class="content">
            <div class="left-column">
                <p>
                    • Every donation received through our GCash platform will be divided equally among the three organizations dedicated to conservation efforts. This means that each organization will receive one-third of your contribution.
                </p>
                <h2>Formula for Equal Distribution of Donations</h2>
                <p>
                    Let:
                </p>
                <ul>
                    <li>D = Total Donation Amount</li>
                    <li>O1 = Amount allocated to Organization 1</li>
                    <li>O2 = Amount allocated to Organization 2</li>
                    <li>O3 = Amount allocated to Organization 3</li>
                </ul>
                <p>The formula for equal distribution is:</p>
                <p><strong>O1 = O2 = O3 = D / 3</strong></p>
            </div>
            <div class="right-column">
                <h2>Example Calculation</h2>
                <p>
                    If the total donation amount (D) is ₱300, the allocation would be:
                </p>
                <p><strong>O1 = O2 = O3 = 300 / 3 = ₱100</strong></p>
                <ul>
                    <li>Each organization will receive one-third of the total donation amount.</li>
                    <li>
                        This ensures that your contribution is equally supporting all three organizations dedicated to conservation efforts.
                    </li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
