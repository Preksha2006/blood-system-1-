<?php
require_once('includes/config.php');
require_once __DIR__ . '/includes/header.php';

$errors = [];
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['full_name'] ?? '');
  $phone = trim($_POST['phone'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $blood = trim($_POST['blood_group'] ?? '');
  $city = trim($_POST['city'] ?? '');
  $gender = $_POST['gender'] ?? null;
  $last_donated = !empty($_POST['last_donated']) ? $_POST['last_donated'] : null;

  if (!$name || !$phone || !$blood) $errors[] = "Name, phone and blood group are required.";

  if (empty($errors)) {
    $stmt = $mysqli->prepare("INSERT INTO donors (full_name,email,phone,gender,blood_group,city,last_donated) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssss', $name, $email, $phone, $gender, $blood, $city, $last_donated);
    $ok = $stmt->execute();
    if ($ok) $success = true;
    else $errors[] = "Database error: " . $stmt->error;
    $stmt->close();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Donor Registration - Blood Donation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;
  margin: 0;
  display: flex;
  flex-direction: column;
  color: white;
  background-image: url('assets/images/11.jpg'); /* Your background image */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
}

.container {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: center;
}

.form-card {
  background: rgba(28, 23, 23, 0.8);
  padding: 30px;
  border-radius: 15px;
  width: 100%;
  max-width: 600px;
  box-shadow: 0 0 25px rgba(255,0,0,0.3);
  transition: all 0.3s ease;
}

.form-card:hover {
  box-shadow: 0 0 45px rgba(64,16,16,0.7);
  transform: scale(1.03);
}

.form-card h3 {
  text-align: center;
  margin-bottom: 20px;
  font-weight: bold;
  color: white;
}

.form-control, .form-select {
  background-color: rgba(255,255,255,0.1);
  border: none;
  color: white;
  border-radius: 8px;
}

.form-control::placeholder {
  color: #ccc;
}

.form-control:focus, .form-select:focus {
  background-color: rgba(255,255,255,0.15);
  box-shadow: 0 0 10px rgba(255,0,0,0.4);
  color: white;
}

.btn-donate {
  background-color: #b30000;
  color:white;
  border: none;
  border-radius: 8px;
  font-weight: bold;
  transition: all 0.3s ease;
}

.btn-donate:hover {
  background-color: #ff1a1a;
  box-shadow: 0 0 15px rgba(255,0,0,0.6);
  transform: scale(1.05);
}

footer {
  background-color: #b30000;
  color: white;
  text-align: center;
  padding: 12px 0;
  font-weight: bold;
}
</style>
</head>
<body>

<div class="container my-5">
  <div class="form-card">
    <h3>Donor Registration</h3>
    <?php if ($success): ?>
      <div class="alert alert-success text-center">Thanks! You are registered as a donor.</div>
    <?php endif; ?>
    <?php if ($errors): ?>
      <div class="alert alert-danger text-center"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
    <?php endif; ?>

    <form method="post" class="row g-3">
      <div class="col-md-12">
        <label class="form-label">Full Name</label>
        <input required name="full_name" class="form-control" value="<?php echo htmlspecialchars($name ?? ''); ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone</label>
        <input required name="phone" class="form-control" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
      </div>
      <div class="col-md-12">
        <label class="form-label">Email</label>
        <input name="email" class="form-control" value="<?php echo htmlspecialchars($email ?? ''); ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Blood Group</label>
        <select required name="blood_group" class="form-select">
          <option  style="color:black" value="">Choose</option>
          <?php foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg): ?>
            <option   style="color:black"<?php if (($blood ?? '') === $bg) echo 'selected'; ?>><?php echo $bg; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-md-6">
        <label class="form-label">City</label>
        <input name="city" class="form-control" value="<?php echo htmlspecialchars($city ?? ''); ?>">
      </div>
      <div class="col-md-6">
        <label class="form-label">Gender</label>
        <select name="gender" class="form-select">
          <option value="" style="color:black">Prefer not to say</option>
          <option  style="color:black" <?php if (($gender ?? '') === 'Male') echo 'selected'; ?>>Male</option>
          <option  style="color:black" <?php if (($gender ?? '') === 'Female') echo 'selected'; ?>>Female</option>
          <option  style="color:black" <?php if (($gender ?? '') === 'Other') echo 'selected'; ?>>Other</option>
        </select>
      </div>

      <div class="col-md-12">
        <label class="form-label">Last Donated (optional)</label>
        <input type="date" name="last_donated" class="form-control" value="<?php echo htmlspecialchars($last_donated ?? ''); ?>">
      </div>

      <div class="col-12 mt-3 text-center">
        <button class="btn btn-donate px-5">Register as Donor</button>
        <a href="/blood-system/" class="btn btn-donate ms-2">Cancel</a>
      </div>
    </form>
  </div>
</div>

<footer>
  © BloodDonation 2025 | Save Life Donate Blood
</footer>

</body>
</html>
