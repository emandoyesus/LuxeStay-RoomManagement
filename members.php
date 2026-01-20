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
        <section class="hero">
            <h1>Meet the Team</h1>
            <p>The brilliant minds behind the LuxeStay Hotel Management System.</p>
        </section>

        <section class="members-grid">
            <!-- Project Member 1 -->
            <div class="card member-card">
                <div class="member-avatar">ET</div>
                <h3>Emandoyesus Tesfay</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">UGR/188057/16</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-1</p>
            </div>

            <!-- Project Member 2 -->
            <div class="card member-card">
                <div class="member-avatar"
                    style="background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));">DG</div>
                <h3>Dawit Gerezgiher</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">UGR/188001/16</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-1</p>
            </div>

            <!-- Project Member 3 -->
            <div class="card member-card">
                <div class="member-avatar"
                    style="background: linear-gradient(135deg, var(--success), var(--primary-color));">HG</div>
                <h3>Haftom Gebrehiwot</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">UGR/188215/16</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-2</p>
            </div>

            <!-- Project Member 4 -->
            <div class="card member-card">
                <div class="member-avatar"
                    style="background: linear-gradient(135deg, #f59e0b, var(--secondary-color));">KG</div>
                <h3>Kiros Gebremariam</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">UGR/188336/16</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-1</p>
            </div>

            <!-- Project Member 5 -->
            <div class="card member-card">
                <div class="member-avatar">EK</div>
                <h3>Edilawit Kalau</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">UGR/188034/16</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-1</p>
            </div>

            <!-- Project Member 6 -->
            <div class="card member-card">
                <div class="member-avatar">SF</div>
                <h3>Saron Felege</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">UGR/188639/16</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-1</p>
            </div>

            <!-- Project Member 7 -->
            <div class="card member-card">
                <div class="member-avatar">AG</div>
                <h3>Abeba Gebru</h3>
                <p style="color: var(--primary-color); margin-bottom: 0.5rem;">EITM/TUR182021/17</p>
                <p style="color: var(--text-muted); font-size: 0.9rem;">Section-1</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> LuxeStay Hotel Management System. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>