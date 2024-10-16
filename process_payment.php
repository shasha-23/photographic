<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $product_id = intval($_POST['product_id']);

    // Example product list (in a real application, you'd fetch this from a database)
    $products = [
        1 => ['name' => 'Photo Print 1', 'price' => 50],
        2 => ['name' => 'Photo Print 2', 'price' => 75]
    ];

    // Check if the product exists
    if (array_key_exists($product_id, $products)) {
        $product = $products[$product_id];
    } else {
        die("Product not found!");
    }

    // In a real application, here you'd integrate with a payment gateway (e.g., Stripe, PayPal)
    // For this example, we'll just simulate a successful payment

    // Payment simulation
    $payment_success = true; // Simulating a payment process
    
    if ($payment_success) {
        // Payment successful, display a success message or redirect to a thank-you page
        echo "<h1>Payment Successful!</h1>";
        echo "<p>Thank you, <strong>$name</strong>, for purchasing <strong>{$product['name']}</strong> for <strong>${$product['price']}</strong>.</p>";
        echo "<p>A confirmation email will be sent to <strong>$email</strong>.</p>";
    } else {
        // Payment failed, show an error message
        echo "<h1>Payment Failed!</h1>";
        echo "<p>Sorry, your payment could not be processed. Please try again.</p>";
    }
} else {
    // Redirect back to the checkout page if the form was not submitted
    header("Location: checkout.php");
    exit();
}
?>
