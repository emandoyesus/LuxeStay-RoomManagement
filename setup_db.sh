#!/bin/bash
# setup_db.sh - Fix Database Permissions and Import Data

# 1. Create Database if it doesn't exist
sudo mysql -e "CREATE DATABASE IF NOT EXISTS hotel_management;"

# 2. Create a dedicated user for the web app (since root requires sudo)
sudo mysql -e "CREATE USER IF NOT EXISTS 'hotel_owner'@'localhost' IDENTIFIED BY 'password123';"
sudo mysql -e "GRANT ALL PRIVILEGES ON hotel_management.* TO 'hotel_owner'@'localhost';"
sudo mysql -e "FLUSH PRIVILEGES;"

# 3. Import the table structure
sudo mysql hotel_management < DATABASE/hotel_management.sql

echo "Database setup complete! User 'hotel_owner' created."
