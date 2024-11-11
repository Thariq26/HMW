<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/img/profiles/Universitas_Mercu_Buana.png">
    <title>Hotel Mercubuana</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .background {
            width: 100%;
            height: 80vh;
            background-size: cover;
            background-position: center;
            filter: brightness(0.7);
        }

        .container {
            position: relative;
            text-align: center;
            color: white;
        }

        .content {
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .content h1 {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .title {
            display : flex;
            align-items : center;
            justify-content : center;
        }

        .title .fa-star {
            font-size: 20px; /* Adjust icon size relative to the text */
            color: #FFA500; /* Optional: Color for the star */
            margin-left: 10px; /* Optional: Space between text and icon */
            margin-right: 10px; /* Optional: Space between text and icon */
        }
        
        .content p {
            font-size: 24px;
            margin-bottom: 150px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 800px;
            gap: 10px;
        }

        .form-container div {
            display : flex;
            flex-wrap: wrap;
            flex-direction: row;
        }

        .form-container label {
            font-size: 14px;
            margin-bottom: 5px;
            color: black;
        }

        .form-container input {
            padding: 10px;
            width: 150px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container button {
            margin-top: 23px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        /* enStyle view-index*/

        /* Style Section Title kamar*/
        .section-title {
            text-align: center;
            margin: 50px 0;
            color : yellow left 50%;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: bold;
            margin: 0;
        }

        .section-title p {
            font-size: 18px;
            color: #777;
            max-width: 700px;
            margin: 10px auto;
        }

        .rooms-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            max-width: 1200px;
            margin: 50px auto;
            padding: 0 20px;
            flex-wrap: wrap;
        }

        .room-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            width: 300px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .room-card:hover {
            transform: translateY(-5px);
        }

        .room-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .room-info {
            padding: 20px;
        }

        .room-info h3 {
            font-size: 24px;
            margin: 10px 0 5px;
        }

        .room-info p {
            font-size: 16px;
            color: #FFA500; /* orange color for the price */
            margin: 5px 0 0;
        }

        /* end section rooms*/
        


        /* Navbar styling */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 2rem;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .navbar .logo {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        .navbar .logo span {
            color: #28a745;
        }
        .navbar nav {
            display: flex;
            gap: 5rem;
            align-items : center;
        }
        .navbar nav a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
            margin-left : 40px;
            justify-content: space-between;
        }
        .navbar nav a:hover {
            color: #28a745;
        }
        .navbar .location, .navbar .user-profile {
            display: flex;
            align-items: center;
            font-weight: 400;
        }
        .navbar .location i {
            color: #e74c3c;
            margin-right: 0.5rem;
        }
        .navbar .user-profile img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #28a745;
            margin-right: 0.5rem;
        }
        .navbar .user-profile i {
            color: #28a745;
            margin-left: 0.3rem;
        }

        /* Hide the nav links and show the hamburger icon on smaller screens */
        .navbar .nav-links {
            display: flex;
            align-items: center;
        }
        .navbar .hamburger {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .navbar nav {
                display: none; /* Hide navigation links initially */
                flex-direction: column;
                position: absolute;
                top: 70px; /* Adjust according to navbar height */
                right: 2rem;
                background-color: #fff;
                width: 200px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                border-radius: 8px;
                padding: 1rem;
            }
            .navbar nav.show {
                display: flex; /* Show navigation links when menu is open */
            }
            .navbar .hamburger {
                display: block; /* Show hamburger icon */
            }
            .navbar .location, .navbar .user-profile {
                display: none; /* Hide location and profile initially */
            }
        }

        @media (max-width: 480px) {
            .navbar .logo {
                font-size: 1.2rem;
            }
            .navbar .hamburger i {
                font-size: 1.5rem;
            }
        }
        /* Wrapper untuk membuat kartu-kartu ruangan dalam satu baris */
        .room-container {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            justify-content: center;
            padding: 16px;
        }

        .room-card {
            display: flex;
            flex-direction: column;
            width: 330px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            font-family: Arial, sans-serif;
        }

        .room-image {
            width: 100%;
            height: 200px;
            background-size: cover;
            background-position: center;
        }

        .room-info {
            padding: 10px;
            background-color: white;
            flex-grow: 1; /* Allows room-info to take up available space */
        }

        .room-info h3 {
            margin: 0;
            font-size: 1.5em;
            color: #333;
        }

        .room-price {
            font-size: 1em;
            color: #009688;
            font-weight: bold;
            margin: 8px 0;
        }

        .room-link {
            font-size: 0.9em;
            color: #009688;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .room-link:hover {
            text-decoration: underline;
        }

        .room-link span {
            margin-left: 4px;
            font-size: 1.2em;
        }

        .room-details {
            display: flex;
            justify-content: space-between;
            background-color: #009688;
            color: white;
            padding: 12px;
            font-size: 0.9em;
            text-align: center;
            margin-top: auto; /* Forces .room-details to align at the bottom */
        }

        .room-details div {
            flex: 1;
        }

        .room-details div:not(:last-child) {
            border-right: 1px solid rgba(255, 255, 255, 0.5);
        }

        
    </style>
</head>


<body>

    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="logo">Hotel Mercubuana <span>4</span>
            
            </div>
            
            <!-- Hamburger Icon -->
            <div class="hamburger" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
            
            <!-- Navigation Links -->
            <nav id="navLinks">
                <a href="#room">Our Room</a>
                <a href="Room">Room</a>
                <a href="#contact">Our Contact</a>
                <div class="location">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Jakarta Barat, Meruya Selatan</span>
                </div>
                <div class="user-profile">
                    <img src="https://via.placeholder.com/30" alt="User profile">
                    <span>Username</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </nav>
        </div>
    </header>
    
    <main role="main" class="flex-shrink-0">
      <?= $this->renderSection('content') ?>
  </main>

    <script>
        // Function to toggle the menu visibility
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('show');
        }
    </script>

