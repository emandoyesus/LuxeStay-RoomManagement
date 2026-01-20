    GROUP MEMBERS                          ID NUMBER                 SECTION-1
    1.	Emandoyesus Tesfay                   UGR/188057/16
    2.	Dawit Gerezgiher                     UGR/188001/16
    3.	Kiros Gebremariam                    UGR/188336/16
    4.	Edlawit Kalau                        UGR/188034/16
    5.	saron Felege                         UGR /188639/16
    6.	haftom  Gebrehiwot                   UGR/188215/16
    7.	Abeba  Gebru                         EITM/TUR182021/17




# 🏨 LuxeStay Hotel Management System
A beginner-friendly project built with **PHP** and **MySQL** to manage hotel rooms and team members.
---
## 🚀 How to Run this Project (Beginner Guide)
You can run this project on any computer (Windows, Mac, or Linux). The most common way is using **XAMPP**.
### Step 1: Install XAMPP
If you don't have it, download and install **XAMPP** from [apachefriends.org](https://www.apachefriends.org/).  
*(It installs PHP and MySQL for you automatically!)*
---
### Step 2: Setup the Project Folder
1.  Go to the folder where you installed XAMPP (usually `C:\xampp`).
2.  Open the `htdocs` folder inside it.
3.  Copy this entire `webProject` folder and paste it there.
    *   *Result:* `C:\xampp\htdocs\webProject`
---
### Step 3: Setup the Database
1.  Open the **XAMPP Control Panel** and click **Start** for both `Apache` and `MySQL`.
2.  Open your browser and visit:  
    [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
3.  Click **New** (on the left sidebar) to create a database.
4.  Name it: `hotel_management` and click **Create**.
5.  Click **Import** (top menu bar).
6.  Click **Choose File** and select the file from your project:  
    [webProject/DATABASE/hotel_management.sql](cci:7://file:///home/emando/Desktop/webProject/DATABASE/hotel_management.sql:0:0-0:0)
7.  Click **Import** (at the bottom).
---
### Step 4: Run the Website!
That's it! Now open your browser and go to:  
👉 **[http://localhost/webProject](http://localhost/webProject)**
---
## ⚠️ Common Issues & Fixes
**1. "Database Connection Failed" Error**
If you see an error saying "Access denied", it means your database username/password is wrong.
- Open the file [db.php](cci:7://file:///home/emando/Desktop/webProject/db.php:0:0-0:0) in the project.
- Change the credentials to match your computer (Default XAMPP settings):
  ```php
  $username = "root";  // Default user for XAMPP
  $password = "";      // Default password is empty
