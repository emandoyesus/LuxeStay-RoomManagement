<?php
include 'db.php';
$error = '';
$success = '';
$room = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM rooms WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $room = $result->fetch_assoc();
        $stmt->close();
    } else {
        $error = "Database error: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $room_number = trim($_POST['room_number']);
    $type = trim($_POST['type']);
    $price = trim($_POST['price']);
    $status = $_POST['status'];
    $description = trim($_POST['description']);

    if (empty($room_number) || empty($type) || empty($price)) {
        $error = "Please fill in all required fields.";
    } elseif (!is_numeric($price)) {
        $error = "Price must be a number.";
    } else {
        $stmt = $conn->prepare("UPDATE rooms SET room_number=?, type=?, price=?, status=?, description=? WHERE id=?");

        if ($stmt === false) {
            $error = "Database error: " . $conn->error . ". Please ensure the database and tables are set up correctly.";
        } else {
            $stmt->bind_param("ssdssi", $room_number, $type, $price, $status, $description, $id);

            if ($stmt->execute()) {
                $success = "Room updated successfully!";
                // Refresh data
                $stmt_refresh = $conn->prepare("SELECT * FROM rooms WHERE id = ?");
                if ($stmt_refresh) {
                    $stmt_refresh->bind_param("i", $id);
                    $stmt_refresh->execute();
                    $room = $stmt_refresh->get_result()->fetch_assoc();
                    $stmt_refresh->close();
                }
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

if (!$room && !isset($_POST['id'])) {
    header("Location: rooms.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room - LuxeStay</title>
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
                <li><a href="members.php">Team</a></li>
            </ul>
        </nav>
    </header>

    <main class="container animate-fade-in" style="max-width: 600px;">
        <h1 style="margin-bottom: 2rem; text-align: center;">Edit Room</h1>

        <?php if ($error): ?>
            <div
                style="background: rgba(239, 68, 68, 0.1); color: var(--danger); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid var(--danger);">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div
                style="background: rgba(16, 185, 129, 0.1); color: var(--success); padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem; border: 1px solid var(--success);">
                <?php echo $success; ?>
                <a href="rooms.php" style="color: inherit; text-decoration: underline; margin-left: 0.5rem;">Return to
                    list</a>
            </div>
        <?php endif; ?>

        <form action="edit_room.php?id=<?php echo $room['id']; ?>" method="POST" class="card" id="editRoomForm"
            novalidate>
            <input type="hidden" name="id" value="<?php echo $room['id']; ?>">

            <div class="form-group">
                <label for="room_number">Room Number *</label>
                <input type="text" id="room_number" name="room_number"
                    value="<?php echo htmlspecialchars($room['room_number']); ?>" required>
                <span class="error-msg" style="color: var(--danger); font-size: 0.875rem; display: none;">Room number is
                    required.</span>
            </div>

            <div class="form-group">
                <label for="type">Room Type *</label>
                <select id="type" name="type" required>
                    <option value="">Select Type</option>
                    <option value="Single" <?php if ($room['type'] == 'Single')
                        echo 'selected'; ?>>Single</option>
                    <option value="Double" <?php if ($room['type'] == 'Double')
                        echo 'selected'; ?>>Double</option>
                    <option value="Suite" <?php if ($room['type'] == 'Suite')
                        echo 'selected'; ?>>Suite</option>
                    <option value="Deluxe" <?php if ($room['type'] == 'Deluxe')
                        echo 'selected'; ?>>Deluxe</option>
                </select>
                <span class="error-msg" style="color: var(--danger); font-size: 0.875rem; display: none;">Please select
                    a room type.</span>
            </div>

            <div class="form-group">
                <label for="price">Price per Night ($) *</label>
                <input type="number" id="price" name="price" step="0.01" min="0"
                    value="<?php echo htmlspecialchars($room['price']); ?>" required>
                <span class="error-msg" style="color: var(--danger); font-size: 0.875rem; display: none;">Valid price is
                    required.</span>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Available" <?php if ($room['status'] == 'Available')
                        echo 'selected'; ?>>Available
                    </option>
                    <option value="Occupied" <?php if ($room['status'] == 'Occupied')
                        echo 'selected'; ?>>Occupied
                    </option>
                    <option value="Maintenance" <?php if ($room['status'] == 'Maintenance')
                        echo 'selected'; ?>>Maintenance
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"
                    rows="4"><?php echo htmlspecialchars($room['description']); ?></textarea>
            </div>

            <div style="display: flex; gap: 1rem;">
                <button type="submit" class="btn" style="flex: 1;">Update Room</button>
                <a href="rooms.php" class="btn btn-secondary" style="flex: 1; text-align: center;">Cancel</a>
            </div>
        </form>
    </main>

    <script src="js/script.js"></script>
</body>

</html>