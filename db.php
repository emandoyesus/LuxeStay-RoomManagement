<?php
$servername = "localhost";
$dbname = "hotel_management";

// Credentials to try
$possible_credentials = [
    ["hotel_owner", "password123"], // 1. Linux Setup
    ["root", ""],                   // 2. XAMPP Default
    ["root", "root"]                // 3. MAMP Default
];

$conn = null;
$connected_to_server = false;
$active_credential = null;

mysqli_report(MYSQLI_REPORT_OFF);

// STEP 1: Connect to MySQL Server (Without selecting DB yet)
foreach ($possible_credentials as $creds) {
    try {
        $conn = @new mysqli($servername, $creds[0], $creds[1]);
        if (!$conn->connect_error) {
            $connected_to_server = true;
            $active_credential = $creds;
            break;
        }
    } catch (Exception $e) {
        continue;
    }
}

if (!$connected_to_server) {
    // Fatal Error: MySQL Server not running or bad credentials
    die("<h1>Fatal Error</h1><p>Could not connect to MySQL Server. Please ensure XAMPP/MySQL is running.</p>");
}

// STEP 2: Check/Create Database
$db_selected = $conn->select_db($dbname);

if (!$db_selected) {
    // Database doesn't exist! Let's create it.
    $sql = "CREATE DATABASE $dbname";
    if ($conn->query($sql) === TRUE) {
        $conn->select_db($dbname);

        // STEP 3: Auto-Import Tables
        $sqlFile = __DIR__ . '/DATABASE/hotel_management.sql';
        if (file_exists($sqlFile)) {
            $sqlContent = file_get_contents($sqlFile);

            // Execute multi-query
            if ($conn->multi_query($sqlContent)) {
                do {
                    // Consume all results to clear the buffer
                    if ($result = $conn->store_result()) {
                        $result->free();
                    }
                } while ($conn->more_results() && $conn->next_result());
            }
        }
    } else {
        die("Error creating database: " . $conn->error);
    }
}

// Check connection one last time
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>