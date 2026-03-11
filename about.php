<?php
require_once('includes/config.php');
require_once __DIR__ . '/includes/header.php'; // header include
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About Blood Donation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #ffffff; /* white background */
    color: #333;
}

/* Card Styles */
.content-card {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 15px;
    margin: 30px 0;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.content-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

h2 {
    color: #b30000;
    margin-bottom: 15px;
}

ul li {
    margin-bottom: 10px;
}

/* Footer override if needed */
footer {
    width: 100%;
}
</style>
</head>
<body>

<div class="container">
    <!-- About Card -->
    <div class="content-card">
        <h2>About Blood Donation</h2>
        <p>Blood donation is a voluntary and life-saving act. Donated blood is used for emergencies, surgeries, chronic illnesses, and patients in need.</p>
        <p>Each donation can help multiple people and is a critical part of healthcare support.</p>
    </div>

    <!-- Eligibility Card -->
    <div class="content-card">
        <h2>Eligibility Criteria</h2>
        <ul>
            <li>Age: 18-65 years</li>
            <li>Weight: Minimum 50 kg</li>
            <li>Must be healthy and free from infections</li>
            <li>Blood pressure and hemoglobin must be normal</li>
            <li>At least 3 months gap between whole blood donations</li>
            <li>Pregnant or breastfeeding women should not donate</li>
        </ul>
    </div>

    <!-- Types of Donors Card -->
    <div class="content-card">
        <h2>Types of Donors</h2>
        <ul>
            <li><strong>Voluntary Donor:</strong> Donates blood without compensation.</li>
            <li><strong>Replacement Donor:</strong> Donates for a patient, usually family or friends.</li>
            <li><strong>Regular Donor:</strong> Donates periodically and consistently.</li>
            <li><strong>First-Time Donor:</strong> Donates for the first time.</li>
        </ul>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/footer.php'; // footer include
?>
</body>
</html>
