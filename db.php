<?php
/**
 * Database Connection File
 * This file automatically:
 * 1. Tries multiple MySQL credentials (XAMPP, MAMP, Linux)
 * 2. Creates the database if it doesn't exist
 * 3. Imports tables from SQL file automatically
 */

$servername = "localhost";
$dbname = "hotel_management";

// Credentials to try (covers most common setups)
$possible_credentials = [
    ["root", ""],                   // XAMPP Default (Windows/Linux)
    ["root", "root"],               // MAMP Default (Mac)
    ["root", "password"],           // Some Linux installations
    ["hotel_owner", "password123"], // Custom user (if created)
];

$conn = null;
$connected_to_server = false;
$active_credential = null;
$connection_errors = [];

mysqli_report(MYSQLI_REPORT_OFF);

// STEP 1: Try to connect to MySQL Server
foreach ($possible_credentials as $creds) {
    try {
        $test_conn = @new mysqli($servername, $creds[0], $creds[1]);
        if (!$test_conn->connect_error) {
            $conn = $test_conn;
            $connected_to_server = true;
            $active_credential = $creds;
            break;
        } else {
            $connection_errors[] = "User '{$creds[0]}': " . $test_conn->connect_error;
        }
    } catch (Exception $e) {
        $connection_errors[] = "User '{$creds[0]}': " . $e->getMessage();
        continue;
    }
}

if (!$connected_to_server) {
    // Show detailed error message
    $error_html = "
    <!DOCTYPE html>
    <html>
    <head>
        <title>Database Connection Error</title>
        <style>
            body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; background: #f5f5f5; }
            .error-box { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            h1 { color: #e74c3c; }
            h2 { color: #333; margin-top: 30px; }
            .step { background: #ecf0f1; padding: 15px; margin: 10px 0; border-radius: 5px; }
            .step strong { color: #2c3e50; }
            code { background: #34495e; color: #ecf0f1; padding: 2px 6px; border-radius: 3px; }
            ul { line-height: 1.8; }
        </style>
    </head>
    <body>
        <div class='error-box'>
            <h1>❌ Database Connection Failed</h1>
            <p><strong>Could not connect to MySQL Server.</strong></p>
            
            <h2>🔍 What Went Wrong?</h2>
            <p>Tried the following credentials:</p>
            <ul>";

    foreach ($connection_errors as $err) {
        $error_html .= "<li>" . htmlspecialchars($err) . "</li>";
    }

    $error_html .= "
            </ul>
            
            <h2>✅ How to Fix This:</h2>
            
            <div class='step'>
                <strong>Step 1:</strong> Make sure MySQL is running
                <ul>
                    <li><strong>XAMPP Users:</strong> Open XAMPP Control Panel → Click 'Start' next to MySQL</li>
                    <li><strong>MAMP Users:</strong> Open MAMP → Click 'Start Servers'</li>
                    <li><strong>Linux Users:</strong> Run <code>sudo service mysql start</code></li>
                </ul>
            </div>
            
            <div class='step'>
                <strong>Step 2:</strong> Verify your MySQL credentials
                <ul>
                    <li>Open phpMyAdmin: <a href='http://localhost/phpmyadmin' target='_blank'>http://localhost/phpmyadmin</a></li>
                    <li>If you can log in, note the username and password you used</li>
                    <li>Most XAMPP installations use: <code>username: root</code>, <code>password: (empty)</code></li>
                </ul>
            </div>
            
            <div class='step'>
                <strong>Step 3:</strong> If using custom credentials, update db.php
                <ul>
                    <li>Open <code>db.php</code> in your project folder</li>
                    <li>Add your credentials to the <code>\$possible_credentials</code> array</li>
                    <li>Example: <code>[\"your_username\", \"your_password\"]</code></li>
                </ul>
            </div>
            
            <h2>📞 Still Having Issues?</h2>
            <p>Make sure:</p>
            <ul>
                <li>✓ XAMPP/MAMP is installed</li>
                <li>✓ MySQL service is running (green light in XAMPP)</li>
                <li>✓ Port 3306 is not blocked by firewall</li>
                <li>✓ No other MySQL instance is running</li>
            </ul>
        </div>
    </body>
    </html>";

    die($error_html);
}

// SUCCESSFUL CONNECTION! Set charset to utf8mb4
$conn->set_charset("utf8mb4");

// STEP 2: Check if database exists, create if not
$db_selected = $conn->select_db($dbname);

if (!$db_selected) {
    echo "<!-- Database not found, creating... -->";
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($dbname);
    } else {
        die("Error creating database: " . $conn->error);
    }
}

// STEP 3: Check if both main tables exist
$rooms_exists = $conn->query("SHOW TABLES LIKE 'rooms'")->num_rows > 0;
$members_exists = $conn->query("SHOW TABLES LIKE 'members'")->num_rows > 0;

if (!$rooms_exists || !$members_exists) {
    echo "<!-- Database tables missing, initializing schema... -->";
    $sqlFile = __DIR__ . '/DATABASE/hotel_management.sql';

    if (file_exists($sqlFile)) {
        $sqlContent = file_get_contents($sqlFile);

        // Use multi_query to run the entire script
        if ($conn->multi_query($sqlContent)) {
            do {
                // Clear the results buffer
                if ($res = $conn->store_result()) {
                    $res->free();
                }
            } while ($conn->more_results() && $conn->next_result());

            if ($conn->errno) {
                die("<h1>SQL Setup Error</h1><p>Error during table creation: " . $conn->error . "</p>");
            }
        } else {
            die("<h1>SQL Setup Failed</h1><p>Could not execute setup script: " . $conn->error . "</p>");
        }
    } else {
        die("<h1>Setup File Missing</h1><p>The file <code>DATABASE/hotel_management.sql</code> was not found.</p>");
    }
}

// Success! Connection is ready
?>