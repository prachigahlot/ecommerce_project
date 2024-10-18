<?php
include 'db.php'; // Database connection

// Function to process orders and reduce stock
function process_orders($orders) {
    global $conn;
    foreach ($orders as $order) {
        $product_id = $order['product_id'];
        $quantity = $order['quantity'];

        // Get current stock
        $result = mysqli_query($conn, "SELECT stock FROM products WHERE product_id = $product_id");
        $product = mysqli_fetch_assoc($result);

        if ($product['stock'] >= $quantity) {
            // Reduce stock
            $new_stock = $product['stock'] - $quantity;
            mysqli_query($conn, "UPDATE products SET stock = $new_stock WHERE product_id = $product_id");
            echo "<div class='success'>Order processed: Product ID $product_id, Quantity: $quantity</div>";
        } else {
            echo "<div class='error'>Insufficient stock for Product ID $product_id. Available: {$product['stock']}</div>";
        }
    }
}

// Function to restock products
function restock_items($products) {
    global $conn;
    foreach ($products as $product) {
        $product_id = $product['product_id'];
        $quantity = $product['quantity'];

        // Increase stock
        mysqli_query($conn, "UPDATE products SET stock = stock + $quantity WHERE product_id = $product_id");
        echo "<div class='success'>Restocked Product ID $product_id with $quantity units.</div>";
    }
}

// Example usage
$orders = [
    ['product_id' => 1, 'quantity' => 2],
    ['product_id' => 2, 'quantity' => 5]
];

$restocks = [
    ['product_id' => 1, 'quantity' => 10],
    ['product_id' => 3, 'quantity' => 20]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory Management</title>
    <style>
        /* Global Container Styling */
.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
}

/* Heading Styles */
h1, h2 {
    text-align: center;
    color: #333;
}

/* Success and Error Messages */
.success {
    background-color: #d4edda;
    color: #155724;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Inventory Management</h1>

        <h2>Processing Orders</h2>
        <?php process_orders($orders); ?>

        <h2>Restocking Products</h2>
        <?php restock_items($restocks); ?>
    </div>
</body>
</html>
