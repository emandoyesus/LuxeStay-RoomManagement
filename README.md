# How to Run the LuxeStay Hotel Management System

Since this project uses **PHP** and **MySQL**, you need a server environment to run it. Here are the steps to get it running on your Linux machine.

## 1. Prerequisites
You currently don't have PHP installed. You need to install PHP and a Database server.

### Install via Terminal (Ubuntu/Debian)
Run these commands in your terminal:
```bash
sudo apt update
sudo apt install php php-mysql mysql-server
```

## 2. Prepare the Database
1. **Start the MySQL service**:
   ```bash
   sudo service mysql start
   ```

2. **Import the Database**:
   You need to import the `DATABASE/hotel_management.sql` file.
   
   **Option A: Command Line**
   ```bash
   sudo mysql < DATABASE/hotel_management.sql
   ```
   
   **Option B: Setup User (if needed)**
   By default, the project uses `root` with no password (`""`). If your MySQL setup requires a password, open `db.php` and update it:
   ```php
   $password = "your_password"; 
   ```

## 3. Run the Application
The easiest way is to use PHP's built-in server.

1. Open your terminal in this project folder:
   ```bash
   cd /home/emando/Desktop/webProject
   ```
2. Start the server:
   ```bash
   php -S localhost:8000
   ```
3. Open your browser and go to:
   [http://localhost:8000](http://localhost:8000)

## Troubleshooting
- **Database Connection Error**: Check `db.php` and ensure your MySQL service is running (`sudo service mysql status`).
- **Missing Driver**: Ensure you installed `php-mysql`.

## Option 2: Run with LAMP Stack (Linux, Apache, MySQL, PHP)
If you prefer using a traditional web server (Apache) instead of the command line, follow these steps.

### 1. Install LAMP Stack
```bash
sudo apt install apache2 mysql-server php php-mysql libapache2-mod-php
```

### 2. Deploy the Project
Move your project folder to the web server's root directory:
```bash
sudo mkdir -p /var/www/html/hotel
sudo cp -r * /var/www/html/hotel/
```

### 3. Set Permissions
Ensure Apache can read the files:
```bash
sudo chown -R www-data:www-data /var/www/html/hotel
sudo chmod -R 755 /var/www/html/hotel
```

### 4. Access the Site
Open your browser and go to:
[http://localhost/hotel](http://localhost/hotel)

## 📦 How to Move to Another PC (e.g., Windows with XAMPP)
Yes, this project works on any computer with PHP and MySQL. Here is how to transfer it:

1. **Copy the Folder**: Copy the entire `webProject` folder to the new computer.
   - If using **XAMPP**, put it inside `C:\xampp\htdocs\`.
   - If using **WAMP**, put it inside `C:\wamp64\www\`.

2. **Import the Database**:
   - Open **phpMyAdmin** (usually http://localhost/phpmyadmin).
   - Create a new database named `hotel_management`.
   - Click **Import** and select the file: `DATABASE/hotel_management.sql`.

3. **Update Connection (Important)**:
   - On most personal computers (like XAMPP users), the database user is `root` with **no password**.
   - Open `db.php` and update it to match the new computer:
     ```php
     $username = "root";
     $password = ""; // Default for XAMPP
     ```


