<?php
$servername = "localhost";
$dbname = "hotel_management";

/**
 * SMART DATABASE CONNECTION
 * This script automatically tries standard credentials for:
 * 1. Our Linux Setup (hotel_owner)
 * 2. XAMPP Windows (root with no password)
 * 3. MAMP Mac (root with root password)
 */

$possible_credentials = [
    // [Username, Password]
    ["hotel_owner", "password123"],
    ["root", ""],
    ["root", "root"]
];

$conn = null;
$success = false;

// Disable error reporting for valid connection attempts to avoid ugly warnings
mysqli_report(MYSQLI_REPORT_OFF);

foreach ($possible_credentials as $creds) {
    try {
        // The @ symbol suppresses warnings if this specific login fails
        $conn = @new mysqli($servername, $creds[0], $creds[1], $dbname);

        if (!$conn->connect_error) {
            $success = true;
            break; // It worked! Stop checking others.
        }
    } catch (Exception $e) {
        // Login failed, silently try the next one
        continue;
    }
}

// If all attempts failed, show the error page
if (!$success) {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Connection Error</title>
        <style>
            body {
                font-family: sans-serif;
                background: #0f172a;
                color: #ef4444;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                text-align: center;
            }

            .box {
                background: #1e293b;
                padding: 2rem;
                border-radius: 1rem;
                border: 1px solid #334155;
            }

            code {
                background: #334155;
                color: #f8fafc;
                padding: 0.2rem 0.5rem;
                border-radius: 0.3rem;
            }
        </style>
    </head>

    <body>
        <div class="box">
            <h1>⚠️ Database Connection Failed</h1>
            <p>Could not connect to database <strong>hotel_management</strong>.</p>
            <p>We tried connecting as <code>hotel_owner</code> and <code>root</code> but both failed.</p>
            <p>Please checks your XAMPP MySQL is running.</p>
        </div>
    </body>

    </html>
    <?php
    exit();
}
?>