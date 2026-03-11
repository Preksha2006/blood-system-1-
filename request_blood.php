<?php
require_once('includes/config.php');
require_once __DIR__ . '/includes/header.php';

$errors = [];
$ok = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patient = trim($_POST['patient_name'] ?? '');
    $blood = trim($_POST['required_blood'] ?? '');
    $units = intval($_POST['units'] ?? 1);
    $city = trim($_POST['city'] ?? '');
    $phone = trim($_POST['contact_phone'] ?? '');
    $details = trim($_POST['details'] ?? '');

    if (!$patient || !$blood || !$phone) $errors[] = "Patient name, blood group and contact phone required.";

    if (!$errors) {
        $stmt = $mysqli->prepare("INSERT INTO requests (patient_name, required_blood, units_required, city, contact_phone, details) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('ssisss', $patient, $blood, $units, $city, $phone, $details);
        $ok = $stmt->execute();
        if (!$ok) $errors[] = "DB Error: " . $stmt->error;
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Request Blood - Blood Donation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
    color: white;
    background-image: url('assets/images/11.jpg'); /* Replace with your image path */
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
    background: rgba(0,0,0,0.8); /* Black transparent box */
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

.form-card h4 {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
    color: white;
}

.form-control, .form-select, textarea {
    background-color: rgba(255,255,255,0.1);
    border: none;
    color: white;
    border-radius: 8px;
}

.form-control::placeholder, textarea::placeholder {
    color: #ccc;
}

.form-control:focus, .form-select:focus, textarea:focus {
    background-color: rgba(255,255,255,0.15);
    box-shadow: 0 0 10px rgba(255,0,0,0.4);
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
        <h4>Request Blood</h4>

        <?php if ($ok): ?>
            <div class="alert alert-success text-center">Request submitted. Volunteers will contact you.</div>
        <?php endif; ?>

        <?php if ($errors): ?>
            <div class="alert alert-danger text-center"><?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?></div>
        <?php endif; ?>

        <form method="post" class="row g-3">
            <div class="col-md-12">
                <label class="form-label">Patient Name</label>
                <input name="patient_name" class="form-control" required value="<?php echo htmlspecialchars($patient ?? ''); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Blood Group</label>
                <select name="required_blood" class="form-select" required>
                    <option style="color:black" value="">Choose</option>
                    <?php foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $bg): ?>
                        <option  style="color:black" <?php if (($blood ?? '') === $bg) echo 'selected'; ?>><?php echo $bg; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Units</label>
                <input type="number" name="units" value="<?php echo htmlspecialchars($units ?? 1); ?>" min="1" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">City</label>
                <input name="city" class="form-control" value="<?php echo htmlspecialchars($city ?? ''); ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Phone</label>
                <input name="contact_phone" class="form-control" required value="<?php echo htmlspecialchars($phone ?? ''); ?>">
            </div>

            <div class="col-12">
                <label class="form-label">Details</label>
                <textarea name="details" class="form-control" rows="3"><?php echo htmlspecialchars($details ?? ''); ?></textarea>
            </div>

            <div class="col-12 text-center mt-3">
                <button class="btn btn-danger px-5">Submit Request</button>
            </div>
        </form>
    </div>
</div>

<footer>
    © BloodDonation 2025 | Save Life Donate Blood
</footer>

</body>
</html>
