<?php
// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    // Server settings
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';     // SMTP server address
    $mail->SMTPAuth   = true;                   // Enable SMTP authentication
    $mail->Username   = 'sandeepgreenxyz@gmail.com'; // Replace with your email address
    $mail->Password   = 'bbka xxjr zocy ctpr';  // Replace with your email password
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
    $mail->Port       = 587;                    // TCP port to connect to

    // Send notification email to you
    $mail->setFrom('sandeepgreenxyz@gmail.com', 'Sandeep');  // Use your email address
    $mail->addAddress('sandeepgreenxyz@gmail.com');  // Replace with the email address where you want to receive the messages

    // Email content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = 'Contact Form Submission';  // Email subject
    $mail->Body    = '<h1>Contact Form Submission</h1>
                      <p><strong>Name:</strong> ' . htmlspecialchars($_POST['name']) . '</p>
                      <p><strong>Email:</strong> ' . htmlspecialchars($_POST['email']) . '</p>
                      <p><strong>Phone Number:</strong> ' . htmlspecialchars($_POST['number']) . '</p>
                      <p><strong>Subject:</strong> ' . htmlspecialchars($_POST['subject']) . '</p>
                      <p><strong>Message:</strong> ' . nl2br(htmlspecialchars($_POST['message'])) . '</p>';

    // Set the 'reply-to' address to the email provided in the form
    $mail->addReplyTo(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['name']));

    // Send the notification email
    $mail->send();

    // Now, send the confirmation email to the user
    $mail->clearAddresses();  // Clear the previous addresses
    $mail->clearReplyTos();   // Clear the previous reply-to addresses

    // Set recipient for the confirmation email
    $mail->addAddress(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['name']));

    // Email content for confirmation
    $mail->Subject = 'Greetings from Sandeep!';  // Email subject
    $mail->Body    = '<h1>Thankyou for contacting me!</h1>
                      <p>Hello ' . htmlspecialchars($_POST['name']) . ',</p>
                      <p>Thankyou for reaching out. I have received your message and will get back to you shortly...</p>
                      <p>Best regards,<br>Sandeep S</p>';

    // Send the confirmation email
    $mail->send();

    echo 'Message has been sent and a confirmation email has been sent to you.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
