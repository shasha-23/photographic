<?php
if (isset($_GET['product'])) {
    $productId = $_GET['product'];
    // In a real application, the product info would be pulled from a database.
    $products = [
        1 => ['name' => 'Photo Print 1', 'price' => 50],
        2 => ['name' => 'Photo Print 2', 'price' => 75]
    ];

    if (array_key_exists($productId, $products)) {
        $product = $products[$productId];
    } else {
        die("Product not found!");
    }
} else {
    die("No product selected!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <section class="checkout">
        <h1>Checkout</h1>
        <p>You are purchasing: <strong><?php echo $product['name']; ?></strong></p>
        <p>Total price: <strong>$<?php echo $product['price']; ?></strong></p>

        <form action="process_payment.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>

            <button type="submit" class="btn
