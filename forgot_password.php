<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ecosphere | Forgot Password</title>
  <style>
    body {
      background: url('pics/background1.png') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    * {
      font-family: Arial, sans-serif;
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    /* Green Header */
    .contact_border {
      width: 100%;
      height: 80px;
      background-color: #2e7d32; /* Green color */
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      position: absolute;
      top: 0;
      left: 0;
    }

    /* Back Button */
    .back_button {
      color: white;
      background-color: #4caf50; /* Green background for back button */
      border: none; /* No border */
      border-radius: 5px; /* Rounded corners */
      font-size: 20px; /* Larger text size */
      cursor: pointer;
      padding: 10px 20px; /* Padding for button */
      transition: background-color 0.3s ease; /* Smooth background transition */
      text-decoration: none; /* No underline */
      display: flex;
      align-items: center; /* Center text vertically */
    }

    .back_button:hover {
      background-color: #388e3c; /* Darker green on hover */
    }

    /* Title */
    .title {
      text-align: center;
      font-weight: bold;
      font-size: 40px;
      color: white; /* White color */
      margin-bottom: 30px; /* Space below the title */
    }

    /* Form Styling */
    form {
      width: 800px;
      border: 2px solid #2e7d32; /* Green border */
      padding: 30px;
      background: rgba(255, 255, 255, 0.9); /* Slightly transparent white background */
      border-radius: 15px;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Slight shadow */
    }

    /* Action Container */
    .action-container {
      display: flex;
      justify-content: center;
      align-items: center; /* Center vertically */
      margin-top: 20px;
    }

    /* Single contact container */
    .pic_contact {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: rgba(232, 245, 233, 0.9); /* Light green background with slight transparency */
      border-radius: 5px;
      padding: 15px;
      color: #000;
      font-size: 14px;
      width: 220px;
      box-sizing: border-box;
    }

    /* Image Styling */
    .pic_contact img {
      width: 200px;
      height: 200px;
      border-radius: 5px;
      margin-bottom: 10px;
    }

    .pic_contact:hover {
      background-color: #a5d6a7; /* Lighter shade of green on hover */
      transform: scale(1.05); /* Slight zoom */
    }

    /* Email Styling */
    .email {
      text-align: center;
      font-size: 14px;
      color: #333;
      text-decoration: none;
    }

    .email a {
      text-decoration: none;
      color: inherit;
    }
  </style>
</head>
<body>

  <!-- Green header with Back button -->
  <div class="contact_border">
    <a href="landing_page.php" class="back_button">Back</a> <!-- Back button -->
    <p style="color: white; font-size: 24px;">Forgot password?</p>
  </div>

  <div class="title">
    <p>Contact:</p>
  </div>

  <form action="none">
    <div class="action-container">
      <div class="pic_contact">
        <a href="mailto:elizamakalintal@gmail.com">
          <img src="pics/gmail.png" alt="Contact Image">
        </a>

        <p class="email">Email: <br>
          <a href="mailto:elizamakalintal@gmail.com">elizamakalintal@gmail.com</a>
        </p>
      </div>
    </div>
  </form>

</body>
</html>