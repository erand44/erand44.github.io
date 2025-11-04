<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // your email address
  $to = "bowayij235@fergetic.com";

  // sanitize input data
  $name = htmlspecialchars(trim($_POST["name"]));
  $subject = htmlspecialchars(trim($_POST["subject"]));
  $email = htmlspecialchars(trim($_POST["email"]));
  $message = htmlspecialchars(trim($_POST["message"]));

  // email content
  $email_subject = "New message from: $name — $subject";
  $email_body = "You have received a new message from your website contact form.\n\n" .
                "Name: $name\n" .
                "Email: $email\n" .
                "Subject: $subject\n\n" .
                "Message:\n$message\n";

  $headers = "From: noreply@yourdomain.com\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

  // try sending email
  if (mail($to, $email_subject, $email_body, $headers)) {
    echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
  } else {
    echo "<script>alert('There was an error sending your message.'); window.location.href='index.html';</script>";
  }
} else {
  // redirect if accessed directly
  header("Location: index.html");
  exit();
}
?>
