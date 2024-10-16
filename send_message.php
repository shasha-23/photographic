<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate form inputs
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Set up the email variables
        $to = "your-email@example.com";  // Replace with your email address
        $subject = "New message from $name";
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";
        
        // Email headers
        $headers = "From: $name <$email>";

        // Send the email
        if (mail($to, $subject, $email_content, $headers)) {
            // Redirect to contact.html with success status
            header("Location: contact.html?status=success");
        } else {
            // Redirect to contact.html with error status
            header("Location: contact.html?status=error");
        }
    } else {
        // Redirect to contact.html with error status (validation failed)
        header("Location: contact.html?status=error");
    }
} else {
    // Redirect to contact.html if accessed directly
    header("Location: contact.html");
}
exit();
