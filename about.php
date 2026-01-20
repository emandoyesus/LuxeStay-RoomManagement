<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - LuxeStay</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="logo">LuxeStay</a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="about.php" class="active">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="members.php">Team</a></li>
            </ul>
        </nav>
    </header>

    <main class="container animate-fade-in">
        <section class="hero">
            <h1>About LuxeStay</h1>
            <p>Redefining hospitality with kindness and technology.</p>
        </section>

        <section class="card">
            <h2>Our Story</h2>
            <p style="margin-bottom: 1rem; color: var(--text-muted);">
                Founded in 2024, LuxeStay began with a simple mission: to provide a home away from home for travelers
                worldwide.
                What started as a small guesthouse has grown into a premier hotel management brand, known for our
                attention to detail and personalized service.
            </p>
            <p style="color: var(--text-muted);">
                We believe that technology should enhance the human experience, not replace it. Our state-of-the-art
                management system ensures that every guest request is handled with speed and precision, allowing our
                staff to focus on what matters most: you.
            </p>
        </section>

        <section class="card" style="margin-top: 2rem;">
            <h2>Our Mission</h2>
            <ul style="margin-left: 1.5rem; color: var(--text-muted); margin-top: 1rem;">
                <li style="margin-bottom: 0.5rem;">To deliver exceptional guest experiences through innovation.</li>
                <li style="margin-bottom: 0.5rem;">To maintain the highest standards of cleanliness and meaningful
                    design.</li>
                <li>To create a sustainable and inclusive environment for guests and staff alike.</li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> LuxeStay Hotel Management System. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>