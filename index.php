<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuxeStay Hotel Management</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="logo">LuxeStay</a>
            <ul class="nav-links">
                <li><a href="index.php" class="active">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="members.php">Team</a></li>
            </ul>
        </nav>
    </header>

    <main class="container animate-fade-in">
        <section class="hero">
            <h1>Welcome to LuxeStay</h1>
            <p>Experience the future of room management. Seamlessly manage bookings, rooms, and guests with our premium
                dashboard.</p>
            <div style="display: flex; gap: 1rem; justify-content: center;">
                <a href="rooms.php" class="btn">View Rooms</a>
                <a href="add_room.php" class="btn btn-secondary">Add New Room</a>
            </div>
        </section>

        <section class="card">
            <h2 style="margin-bottom: 1.5rem; color: var(--text-main);">Quick Stats</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                <div
                    style="padding: 1.5rem; background: rgba(255,255,255,0.05); border-radius: 0.5rem; text-align: center;">
                    <h3 style="color: var(--primary-color); font-size: 2rem;">
                        <?php
                        include 'db.php';
                        $sql = "SELECT COUNT(*) as count FROM rooms";
                        $result = $conn->query($sql);
                        echo $result->fetch_assoc()['count'];
                        ?>
                    </h3>
                    <p style="color: var(--text-muted);">Total Rooms</p>
                </div>
                <div
                    style="padding: 1.5rem; background: rgba(255,255,255,0.05); border-radius: 0.5rem; text-align: center;">
                    <h3 style="color: var(--success); font-size: 2rem;">
                        <?php
                        $sql = "SELECT COUNT(*) as count FROM rooms WHERE status='Available'";
                        $result = $conn->query($sql);
                        echo $result->fetch_assoc()['count'];
                        ?>
                    </h3>
                    <p style="color: var(--text-muted);">Available</p>
                </div>
                <div
                    style="padding: 1.5rem; background: rgba(255,255,255,0.05); border-radius: 0.5rem; text-align: center;">
                    <h3 style="color: var(--danger); font-size: 2rem;">
                        <?php
                        $sql = "SELECT COUNT(*) as count FROM rooms WHERE status='Occupied'";
                        $result = $conn->query($sql);
                        echo $result->fetch_assoc()['count'];
                        ?>
                    </h3>
                    <p style="color: var(--text-muted);">Occupied</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> LuxeStay Hotel Management System. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>