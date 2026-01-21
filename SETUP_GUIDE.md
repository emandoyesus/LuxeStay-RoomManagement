# 🚀 LuxeStay Setup Guide - For Any PC

This guide will help you run the LuxeStay Hotel Management System on **any computer** (Windows, Mac, or Linux).

---

## ✅ What You Need

1. **XAMPP** (includes PHP + MySQL) - [Download here](https://www.apachefriends.org/)
2. This project folder
3. 5 minutes of your time

---

## 📋 Step-by-Step Setup

### **Step 1: Install XAMPP**

1. Download XAMPP from [apachefriends.org](https://www.apachefriends.org/)
2. Install it (default settings are fine)
3. Installation location:
   - **Windows:** `C:\xampp`
   - **Mac:** `/Applications/XAMPP`
   - **Linux:** `/opt/lampp`

---

### **Step 2: Copy Project Files**

1. Find your XAMPP installation folder
2. Open the `htdocs` folder inside it
3. **Copy** the entire `Group-9-WebProject` folder into `htdocs`

**Result:** You should have `C:\xampp\htdocs\Group-9-WebProject\` (Windows example)

---

### **Step 3: Start MySQL**

1. Open **XAMPP Control Panel**
2. Click **Start** next to **Apache**
3. Click **Start** next to **MySQL**
4. Both should show **green** lights

**Important:** If MySQL doesn't start, check if port 3306 is already in use by another program.

---

### **Step 4: Open the Application**

1. Open your web browser
2. Go to: **http://localhost/Group-9-WebProject/**
3. **That's it!** 🎉

---

## 🔄 What Happens Automatically?

The application will **automatically**:

✅ Try multiple MySQL username/password combinations  
✅ Create the `hotel_management` database if it doesn't exist  
✅ Import all tables from the SQL file  
✅ Set up everything for you  

**You don't need to manually create anything in phpMyAdmin!**

---

## ❌ Troubleshooting

### Problem: "Database Connection Failed" Error

**Solution:**

1. **Make sure MySQL is running** (green light in XAMPP)
2. The error page will show you:
   - Which credentials were tried
   - What went wrong
   - Step-by-step fix instructions

### Problem: "Access Denied" Error

**Solution:**

1. Open phpMyAdmin: http://localhost/phpmyadmin
2. Check what username/password you can log in with
3. If it's not `root` with empty password, edit `db.php`:
   - Find the `$possible_credentials` array
   - Add your credentials: `["your_username", "your_password"]`

### Problem: Tables Don't Exist

**Solution:**

The app creates tables automatically, but if it fails:

1. Make sure the file `DATABASE/hotel_management.sql` exists
2. Check that MySQL user has CREATE TABLE permission
3. Try manually importing via phpMyAdmin

---

## 🎯 Quick Test

After setup, you should see:

- **Home Page:** Shows room statistics (Total, Available, Occupied)
- **Rooms Page:** Lists all rooms in a table
- **Add Room:** Form to create new rooms
- **Edit/Delete:** Buttons work for each room

---

## 💡 Tips

- **First time?** The database setup happens on first visit (takes 2-3 seconds)
- **Already have data?** The app won't overwrite existing tables
- **Moving to another PC?** Just copy the folder and repeat steps 2-4

---

## 📞 Still Having Issues?

Check that:
- ✓ XAMPP is installed correctly
- ✓ Both Apache and MySQL are running (green in XAMPP)
- ✓ You're using the correct URL: `http://localhost/Group-9-WebProject/`
- ✓ The `DATABASE` folder exists with `hotel_management.sql` inside

---

## 🎓 For Developers

**Database Credentials Tried (in order):**
1. `root` / `` (empty) - XAMPP default
2. `root` / `root` - MAMP default
3. `root` / `password` - Some Linux setups
4. `hotel_owner` / `password123` - Custom user

**Auto-Setup Features:**
- Creates database with UTF-8 encoding
- Imports all tables from SQL file
- Verifies tables exist before running queries
- Shows detailed error messages for debugging

---

**Enjoy using LuxeStay! 🏨**
