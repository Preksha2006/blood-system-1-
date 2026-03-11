<?php
require_once('includes/config.php');
require_once __DIR__ . '/includes/header.php';

$bg = $_GET['blood_group'] ?? '';
$city = $_GET['city'] ?? '';

$results = [];
if ($bg || $city) {
    $sql = "SELECT full_name, phone, email, blood_group, city, last_donated FROM donors WHERE 1=1";
    $types = '';
    $params = [];
    if ($bg) { $sql .= " AND blood_group = ?"; $types .= 's'; $params[] = $bg; }
    if ($city) { $sql .= " AND city LIKE ?"; $types .= 's'; $params[] = "%$city%"; }

    $stmt = $mysqli->prepare($sql);
    if ($types) $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();
    while($r = $res->fetch_assoc()) $results[] = $r;
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search Results - Blood Donation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    margin: 0;
    color: white;
    background-image: url('assets/images/11.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

/* Header */




.donor-card {
    background: rgba(0,0,0,0.8);
    padding: 20px;
    border-radius: 15px;
    margin-bottom: 20px;
    color: white;
    transition: all 0.3s ease;
}

.donor-card:hover {
    box-shadow: 0 0 45px rgba(64,16,16,0.7);
    transform: scale(1.03);
}

footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #b30000;
    color: white;
    text-align: center;
    padding: 12px 0;
    font-weight: bold;
}
</style>
</head>
<body>


<div class="container">
    <h3 class="text-center mb-4" style="margin-top:30px;">Search Results</h3>
    <?php if ($results): ?>
        <div class="row g-3 justify-content-center">
            <?php foreach($results as $row): ?>
                <div class="col-md-4">
                    <div class="donor-card">
                        <h5>
                            <?php echo htmlspecialchars($row['full_name']); ?>
                            <span class="badge float-end" style="color:white; background-color:#b30000">
                                <?php echo htmlspecialchars($row['blood_group']); ?>
                            </span>
                        </h5>
                        <div class="small"><?php echo htmlspecialchars($row['city']); ?></div>
                        <p class="small mt-2">
                            Phone: <?php echo htmlspecialchars($row['phone']); ?><br>
                            Email: <?php echo htmlspecialchars($row['email']); ?>
                        </p>
                        <a href="tel:<?php echo htmlspecialchars($row['phone']); ?>" class="btn btn-danger" style="color:white; background-color:#b30000;">Call</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center mt-3">No donors found.</div>
    <?php endif; ?>
</div>

<footer>
    © BloodDonation 2025 | Save Life, Donate Blood
</footer>

</body>
</html>
