<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms - LuxeStay</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <a href="index.php" class="logo">LuxeStay</a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="rooms.php" class="active">Rooms</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="members.php">Team</a></li>
            </ul>
        </nav>
    </header>

    <main class="container animate-fade-in">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h1>Room Directory</h1>
            <a href="add_room.php" class="btn">Add New Room</a>
        </div>

        <section class="card">
            <form method="GET" action="rooms.php" style="display: flex; gap: 1rem; margin-bottom: 1.5rem;">
                <input type="text" name="search" placeholder="Search by room number or type..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn">Search</button>
                <?php if (isset($_GET['search'])): ?>
                    <a href="rooms.php" class="btn btn-secondary">Clear</a>
                <?php endif; ?>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Room #</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
                    $sql = "SELECT * FROM rooms";
                    if ($search) {
                        $sql .= " WHERE room_number LIKE '%$search%' OR type LIKE '%$search%'";
                    }
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $statusClass = 'status-' . strtolower($row['status']);
                            echo "<tr>
                                <td>{$row['room_number']}</td>
                                <td>{$row['type']}</td>
                                <td>$" . number_format($row['price'], 2) . "</td>
                                <td><span class='status-badge $statusClass'>{$row['status']}</span></td>
                                <td>" . substr($row['description'], 0, 50) . "...</td>
                                <td>
                                    <a href='edit_room.php?id={$row['id']}' class='btn btn-secondary' style='padding: 0.25rem 0.75rem; font-size: 0.875rem;'>Edit</a>
                                    <a href='delete_room.php?id={$row['id']}' class='btn btn-danger' style='padding: 0.25rem 0.75rem; font-size: 0.875rem;' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' style='text-align: center; color: var(--text-muted); padding: 2rem;'>No rooms found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> LuxeStay Hotel Management System. All rights reserved.</p>
    </footer>
</body>

</html>