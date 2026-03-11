<?php
require_once __DIR__ . '/includes/config.php'; // ensures $mysqli is available
require_once __DIR__ . '/includes/header.php';

$sent = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $subject = trim($_POST['subject'] ?? '');
  $msg = trim($_POST['message'] ?? '');

  if (!$name || !$email || !$msg) $errors[] = 'Name, Email, and Message are required.';

  if (!$errors) {
    $stmt = $mysqli->prepare("INSERT INTO contact_messages (name,email,phone,subject,message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param('sssss', $name, $email, $phone, $subject, $msg);
    $sent = $stmt->execute();
    $stmt->close();
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Contact Us - Blood Donation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>


.container {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Smaller and lighter box */
body {
  color: white;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  font-family: 'Poppins', sans-serif;
  background-image: url('assets/images/11.jpg'); /* Path to your background image */
  background-size: cover; /* Makes the image cover the whole page */
  background-position: center; /* Centers the image */
  background-repeat: no-repeat; /* Prevents tiling */
  background-attachment: fixed; /* Makes background stay on scroll */
}

.contact-box {
    background: rgba(0,0,0,0.8); /* Black transparent box */
    padding: 30px;
    border-radius: 15px;
    width: 100%;
    max-width: 600px;
    box-shadow: 0 0 25px rgba(255,0,0,0.3);
    transition: all 0.3s ease;
}

.contact-box:hover {
  box-shadow: 0 0 45px rgba(64, 16, 16, 0.7);
  transform: scale(1.03);
}

h4 {
  color: white;
  text-align: center;
  margin-bottom: 20px;
  font-size: 32px;
  font-weight: bold;
}



.form-control {
  background-color: rgba(255,255,255,0.1);
  border: none;
  color: white;
  border-radius: 8px;
}

.form-control::placeholder {
  color: #ccc;
}

.form-control:focus {
  background-color: rgba(255, 255, 255, 0.15);
  box-shadow: 0 0 10px rgba(255, 0, 0, 0.4);
  color: white;
}

.btn-danger {
  background-color: #cc0000;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  transition: all 0.3s ease;
}

.btn-danger:hover {
  background-color: #ff1a1a;
  box-shadow: 0 0 15px rgba(255, 0, 0, 0.6);
  transform: scale(1.05);
}

footer {
  background-color: #b30000;
  color: white;
  text-align: center;
  padding: 15px;
  font-weight: bold;
  letter-spacing: 0.5px;
}
</style>
</head>
<body>

<div class="container">
  <div class="contact-box">
    <h4>Contact Us</h4>

    <?php if ($sent): ?>
      <div class="alert alert-success text-center">Message sent successfully. We'll reach out soon!</div>
    <?php endif; ?>

    <?php if ($errors): ?>
      <div class="alert alert-danger text-center"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
    <?php endif; ?>

    <form method="post" class="row g-3">
      <div class="col-12"><input class="form-control" name="name" placeholder="Your Name" required></div>
      <div class="col-12"><input class="form-control" name="email" placeholder="Your Email" required></div>
      <div class="col-12"><input class="form-control" name="phone" placeholder="Your Phone Number"></div>
      <div class="col-12"><input class="form-control" name="subject" placeholder="Subject"></div>
      <div class="col-12"><textarea name="message" rows="4" class="form-control" placeholder="Your Message" required></textarea></div>
      <div class="col-12 text-center"><button class="btn btn-danger px-5">Send</button></div>
    </form>
  </div>
</div>

<footer>
  © BloodDonation 2025 | Save Life Donate Blood
</footer>

</body>
</html>
