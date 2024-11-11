<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Responsive Hotel Navbar</title>
<style>
    /* Basic Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: Arial, sans-serif;
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

     /* Navbar Styling */
     .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        color: #333;
    }

    .logo span {
        color: #28a745;
    }

    .nav-links {
        display: flex;
        gap: 40px;
        list-style: none;
    }

    .nav-links li {
        font-size: 16px;
        color: #333;
        cursor: pointer;
    }

    .nav-links li:hover {
        color: #000;
    }

    .hamburger,
    .sign-in {
        font-size: 16px;
        border: 1px solid #333;
        border-radius: 25px;
        padding: 8px 16px;
        text-align: center;
        color: #28a745;
        cursor: pointer;
    }

    .hamburger {
        border: none;
        font-size: 24px;
        padding: 5px 10px;
        display: none; /* Hidden by default */
    }

    .hamburger:hover,
    .sign-in:hover {
        color: #000;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
        .nav-links {
            display: none; /* Hide nav links on smaller screens */
            flex-direction: column;
            position: absolute;
            top: 70px;
            right: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 10px 20px;
            gap: 10px;
        }

        .nav-links li {
            font-size: 18px;
        }

        .hamburger {
            display: inline-block; /* Show hamburger icon on smaller screens */
        }
    }

    /* Show nav-links when active */
    .nav-links.active {
        display: flex;
    }
</style>
</head>
<body>
    <header>
        <nav class="navbar">
            <!-- Logo -->
            <div class="logo">
                Hotel Mercubuana <span>4</span>
            </div>

            <!-- Navigation Links -->
            <ul class="nav-links">
                <li>Booking</li>
                <li>Facilities</li>
                <li>Support</li>
                <li>Rooms</li>
                <li>Reviews</li>
                <li>Blog</li>
            </ul>

            <!-- Sign In Button & Hamburger Menu -->
            <div class="controls">
                <span class="hamburger" onclick="toggleMenu()">&#9776;</span>
                <span class="sign-in">Sign In</span>
            </div>
        </nav>
    </header>
    <main role="main" class="flex-shrink-0">
      <?= $this->renderSection('content') ?>
  </main>

<script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active');
    }
</script>

