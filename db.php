<?php
$servername = "localhost";
$dbname = "hotel_management";

// Credentials to try (Priority: Custom Setup -> XAMPP -> MAMP)
$credentials = [
    ["hotel_owner", "password123"], // Linux Script Setup
    ["root", ""],                   // XAMPP Default
    ["root", "root"]                // MAMP Default
];

$conn = null;
$connected = false;

// Enable error reporting for debugging
mysqli_report(MYSQLI_REPORT_OFF);

foreach ($credentials as $cred) {
    try {
        $conn = new mysqli($servername, $cred[0], $cred[1], $dbname);
        // If we get here, connection changed successfully
        $connected = true;
        break;
    } catch (Exception $e) {
        continue; // Try next credentials
    }
}

if (!$connected) {
    // If all attempts failed, simulate a failed connection for the error handler below
    // We create a dummy connection object or just let the error handler run
    // Since the error handler below uses exit(), we can just trigger it.
    // However, the original code relied on the catch block catching the *last* exception.
    // Instead, we will manually trigger the error page if not connected.
    // Graceful error handling - Prevents "Crash"
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>System Error</title>
        <style>
            body {
                font-family: system-ui, sans-serif;
                background: #0f172a;
                color: #f8fafc;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }

            .error-card {
                background: #1e293b;
                padding: 2rem;
                border-radius: 1rem;
                border: 1px solid #ef4444;
                max-width: 500px;
                text-align: center;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
            }

            h1 {
                color: #ef4444;
                margin-top: 0;
            }

            code {
                background: #334155;
                padding: 0.2rem 0.4rem;
                border-radius: 0.25rem;
                font-family: message-box;
            }

            .btn {
                display: inline-block;
                margin-top: 1.5rem;
                padding: 0.75rem 1.5rem;
                background: #6366f1;
                color: white;
                text-decoration: none;
                border-radius: 0.5rem;
            }
        </style>
    </head>

    <body>
        <div class="error-card">
            <h1>⚠️ Database Connection Failed</h1>
            <p>The system cannot connect to the database. This usually happens if the database user doesn't exist yet.</p>
            <p style="margin: 1.5rem 0; font-size: 1.1rem;"><strong>Please run this command in your terminal:</strong></p>
            <code>bash setup_db.sh</code>
            <br>
            <a href="index.php" class="btn">Try Again</a>
        </div>
    </body>

    </html>
    <?php
    exit(); // Stop further execution
}
?>