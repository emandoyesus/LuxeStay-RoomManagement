<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team - LuxeStay</title>
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
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="members.php" class="active">Team</a></li>
            </ul>
        </nav>
    </header>

    <main class="container animate-fade-in">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h1>Meet the Team</h1>
                <p style="color: var(--text-muted);">The brilliant minds behind the LuxeStay Hotel Management System.
                </p>
            </div>
        </div>

        <section class="members-grid">
            <?php
            $sql = "SELECT * FROM members";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Generate a consistent gradient based on ID
                    $colors = [
                        ['#6366f1', '#ec4899'], // Default
                        ['#10b981', '#3b82f6'], // Green-Blue
                        ['#f59e0b', '#ef4444'], // Orange-Red
                        ['#8b5cf6', '#ec4899'], // Purple-Pink
                    ];
                    $gradientIdx = $row['id'] % 4;
                    $gradient = "linear-gradient(135deg, {$colors[$gradientIdx][0]}, {$colors[$gradientIdx][1]})";

                    echo "<div class='card member-card'>
                        <div class='member-avatar' style='background: $gradient;'>
                            {$row['avatar']}
                        </div>
                        <h3>{$row['name']}</h3>
                        <p style='color: var(--primary-color); margin-bottom: 0.5rem;'>{$row['student_id']}</p>
                        <p style='color: var(--text-muted); font-size: 0.9rem;'>{$row['section']}</p>
                    </div>";
                }
            } else {
                echo "<p style='text-align: center; grid-column: 1/-1;'>No team members found.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> LuxeStay Hotel Management System. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>