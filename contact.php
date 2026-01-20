<?php
$msg = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Here you would typically send an email or save to DB
        $msg = "Thank you for contacting us, $name! We will get back to you soon.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - LuxeStay</title>
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
                <li><a href="contact.php" class="active">Contact</a></li>
                <li><a href="members.php">Team</a></li>
            </ul>
        </nav>
    </header>

    <main class="container animate-fade-in" style="max-width: 600px;">
        <h1 style="text-align: center; margin-bottom: 2rem;">Contact Us</h1>

        <?php if ($msg): ?>
            <div
                style="background: rgba(16, 185, 129, 0.1); color: var(--success); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid var(--success);">
                <?php echo $msg; ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div
                style="background: rgba(239, 68, 68, 0.1); color: var(--danger); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid var(--danger);">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="contact.php" class="card" novalidate>
            <div class="form-group">
                <label for="name">Your Name *</label>
                <input type="text" id="name" name="name" required>
                <span class="error-msg" style="color: var(--danger); font-size: 0.875rem; display: none;">Name is
                    required.</span>
            </div>

            <div class="form-group">
                <label for="email">Email Address *</label>
                <input type="email" id="email" name="email" required>
                <span class="error-msg" style="color: var(--danger); font-size: 0.875rem; display: none;">Valid email is
                    required.</span>
            </div>

            <div class="form-group">
                <label for="message">Message *</label>
                <textarea id="message" name="message" rows="5" required></textarea>
                <span class="error-msg" style="color: var(--danger); font-size: 0.875rem; display: none;">Message is
                    required.</span>
            </div>

            <button type="submit" class="btn" style="width: 100%;">Send Message</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> LuxeStay Hotel Management System. All rights reserved.</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>