<<<<<<< HEAD
# E-commerce System
# E-commerce System

## 📋 Introduction
This project is a simplified **E-commerce System** built using **HTML, CSS, PHP, and MySQL**. It allows users to:
- **Register an account**
- **View available products**
- **Manage inventory** with stock handling
- Track **orders** and **payments**

The goal of this project is to showcase a functional e-commerce system with a backend inventory management system and a relational database.

---

## 🚀 Features
- **User Registration**: Users can register with their name and email.
- **Product Listing**: Display all available products in a card-based layout.
- **Inventory Management**: Track product stock and manage restocking.
- **Order Management**: Users can create and view orders with multiple products.
- **Payment System**: Track payments and order statuses (e.g., pending, completed).

---

## 🛠️ Tech Stack
- **Frontend**: HTML5, CSS3
- **Backend**: PHP 8.x
- **Database**: MySQL (via phpMyAdmin)
- **Web Server**: Apache (using XAMPP)

---

## 📂 Folder Structure
ecommerce_project/ ├── index.php # Main frontend page ├── register.php # User registration handling ├── inventory.php # Inventory management logic ├── db.php # Database connection script ├── styles.css # CSS styling file ├── images/ # Folder for product images │ └── placeholder.png # Placeholder product image ├── sql/ │ └── ecommerce.sql # SQL file to create database and tables └── README.md # Project documentation (this file)



---

## 🛑 Prerequisites
1. **XAMPP**: Download and install XAMPP from [https://www.apachefriends.org](https://www.apachefriends.org).
2. **Browser**: Any modern browser (e.g., Chrome, Firefox).
3. **Text Editor**: (Optional) Visual Studio Code for editing files.

---

## 🛠️ Setup Instructions

### 1. Install and Run XAMPP
- Start **Apache** and **MySQL** services from the XAMPP Control Panel.

### 2. Clone or Copy the Project Files
- Place the **ecommerce_project** folder inside `C:\xampp\htdocs`.

### 3. Create the MySQL Database and Tables
1. Open **phpMyAdmin**: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Create a new database named **`ecommerce`**.
3. Import the SQL file:
   - Go to the **SQL tab** in phpMyAdmin.
   - Paste the content from `sql/ecommerce.sql` or upload the file.
4. Click **Go** to create the tables.

### 4. Verify the Database Connection
- Ensure the `db.php` file contains the correct connection details:
  ```php
  <?php
  $conn = mysqli_connect('localhost', 'root', '', 'ecommerce');
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  ?>

1. Open the Project in the Browser
Visit:
http://localhost/ecommerce_project/index.php

2. Register a New User
Fill out the name and email fields in the form.
Click Register to add the user to the database.
3. View Available Products
The products are displayed in a card layout with images, names, and prices.
4. Inventory Management
Use inventory.php to handle:
Order processing: Deduct stock based on orders.
Restocking: Increase stock levels when items are replenished.
📝 SQL Queries for Additional Features
in the file  "sql/ecommerce queries.sql



🧰 Troubleshooting
Issue: Directory Listing Shown Instead of Website
Ensure your main file is named index.php.
Access the project with the correct URL:
arduino

http://localhost/ecommerce_project/
If directory listing persists, disable it:
Open httpd.conf (Apache Config).
Search for:
mathematica

Options Indexes FollowSymLinks
Change it to:
mathematica

Options -Indexes +FollowSymLinks
Restart Apache from the XAMPP Control Panel.
Issue: PHP Code is Displayed as Text
Ensure PHP is installed and enabled.
Verify Apache and MySQL are running.
Create a test.php file with:
php

<?php
echo "PHP is working!";
?>
Visit: http://localhost/ecommerce_project/test.php to confirm.
=======
# ecommerce_project
intenship project
>>>>>>> dfa5ba3bbe86a4c5481de0fa2b4419d033d18572
