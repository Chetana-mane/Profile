<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = htmlspecialchars($_POST['Name']);
    $email = htmlspecialchars($_POST['Email']);
    $subject = htmlspecialchars($_POST['Subject']);
    $message = htmlspecialchars($_POST['Message']);

    // Email settings
    $to = "your-email@example.com"; // Replace with your email address
    $headers = "From: " . $email . "\r\n" . "Reply-To: " . $email . "\r\n" . "X-Mailer: PHP/" . phpversion();

    // Email subject and message content
    $email_subject = "New Contact Form Submission: " . $subject;
    $email_message = "You have received a new message from the contact form:\n\n";
    $email_message .= "Name: " . $name . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Subject: " . $subject . "\n";
    $email_message .= "Message:\n" . $message;

    // Send email
    if (mail($to, $email_subject, $email_message, $headers)) {
        // Success message
        echo "Thank you for contacting us! We will get back to you soon.";
    } else {
        // Error message
        echo "Oops! Something went wrong, please try again later.";
    }
}
?>
