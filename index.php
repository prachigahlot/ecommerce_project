<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>E-commerce System</h1>
        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">Orders</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        <section class="form-section">
            <h2>Register User</h2>
            <form action="register.php" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">Register</button>
            </form>
        </section>

        <section class="product-section">
            <h2>Available Products</h2>
            <div class="product-list">
                <?php
                include 'db.php';
                $result = mysqli_query($conn, "SELECT * FROM products");
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                    <div class='product-card'>
                        <img src='images/placeholder.png' alt='{$row['name']}'>
                        <div class='product-info'>
                            <h3>{$row['name']}</h3>
                            <p>\${$row['price']}</p>
                        </div>
                    </div>";
                }}
                else {
                    echo "No products found.";
                }
                ?>
            </div>
        </section>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 E-commerce System. All rights reserved.</p>
    </footer>
</body>
</html>

