<?php
// Include database connection
include 'db.php';

// Initialize variables to store form input and messages
$name = $email = $message = "";
$error = false;

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validate input
    if (empty($name) || empty($email)) {
        $message = "Both name and email are required.";
        $error = true;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
        $error = true;
    } else {
        // Insert user into the database
        $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $name, $email);

        if (mysqli_stmt_execute($stmt)) {
            $message = "User registered successfully!";
        } else {
            $message = "Error: " . mysqli_error($conn);
            $error = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <style>
        .form-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.alert {
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

.alert.success {
    background-color: #d4edda;
    color: #155724;
}

.alert.error {
    background-color: #f8d7da;
    color: #721c24;
}

input {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ddd;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

.back-link {
    display: block;
    text-align: center;
    margin-top: 10px;
    text-decoration: none;
    color: #007bff;
}

    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register User</h2>
        <?php if ($message): ?>
            <div class="alert <?= $error ? 'error' : 'success' ?>">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <input type="text" name="name" placeholder="Enter your name" value="<?= htmlspecialchars($name) ?>" required>
            <input type="email" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($email) ?>" required>
            <button type="submit">Register</button>
        </form>
        <a href="index.php" class="back-link">Go Back</a>
    </div>
</body>
</html>
