<?php
require_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Find Donor - Blood Donation</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
body {
    font-family: 'Poppins', sans-serif;
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-image: url('assets/images/11.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    color: white;
}

/* Header */
header {
    width: 100%;
    background-color: rgba(179,0,0,0.9);
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 22px;
    position: fixed;
    top: 0;
    z-index: 1000;
}
  .navbar-brand img {
      height: 50px;
      margin-right: 10px;
    }
    .nav-link {
      font-size: 1.1rem;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #fff !important;
      transform: scale(1.05);
      transition: 0.3s;
    }
   
/* Form Card */
.form-card {
    background: rgba(0,0,0,0.8);
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 0 25px rgba(255,0,0,0.3);
    width: 100%;
    max-width: 500px;
    color: white;
    margin-top: 70px; /* space for fixed header */
}

.form-select, .form-control {
    background-color: rgba(255,255,255,0.1);
    border: none;
    color: white; /* blood group text in black */
    border-radius: 8px;
}

.form-select option {
    color: black; /* dropdown options text black */
}

.form-control::placeholder {
    color: #ccc;
}

.form-select:focus, .form-control:focus {
    background-color: rgba(255,255,255,0.15);
    box-shadow: 0 0 10px rgba(255,0,0,0.4);
    color: black;
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

h3 {
    text-align: center;
    margin-bottom: 20px;
}

/* Footer */
footer {
    width: 100%;
    background-color: rgba(179,0,0,0.9);
    color: white;
    text-align: center;
    padding: 12px 0;
    font-weight: bold;
    position: fixed;
    bottom: 0;
}
</style>
</head>
<body>

<header>
 <nav class="navbar navbar-expand-lg navbar-dark py-3" style="background-color: #b30000;">
  <div class="container">
    <a class="navbar-brand fw-bold d-flex align-items-center" href="index.php" style="font-size:30px;">
      <img src="assets/images/logo.png" alt="Logo"> Blood Donation
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto align-items-center" >
        <li class="nav-item"><a href="index.php" style="font-size:20px" class="nav-link text-light">Home</a></li>
        <li class="nav-item"><a href="index.php#about" style="font-size:20px" class="nav-link text-light">About</a></li>
            <li class="nav-item"><a href="register.php"style="font-size:20px"  class="nav-link text-light ">Donate</a></li>
        <li class="nav-item"><a href="request_blood.php"style="font-size:20px"  class="nav-link text-light">Request</a></li>
        <li class="nav-item"><a href="find.php" style="font-size:20px" class="nav-link text-light">Search</a></li>
                <li class="nav-item"><a href="contact.php"style="font-size:20px"  class="nav-link text-light">Contact</a></li>

    
        <li class="nav-item"><a href="admin/login.php" style="font-size:20px" class="nav-link text-light">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>

<div class="form-card">
    <h3>Find Donor</h3>
    <form action="search.php" method="GET" target="_blank">
        <div class="mb-3">
            <select name="blood_group" class="form-select">
                <option value="">Select Blood Group</option>
                <?php foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $g): ?>
                    <option value="<?php echo $g; ?>"><?php echo $g; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <input name="city" class="form-control" placeholder="City (optional)">
        </div>
        <div class="text-center">
            <button class="btn btn-danger px-4">Search</button>
        </div>
    </form>
</div>

<footer>
    © BloodDonation 2025 | Save Life, Donate Blood
</footer>

</body>
</html>
