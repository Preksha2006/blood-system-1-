
<?php
require_once('includes/config.php'); // ✅ FIRST
include('includes/header.php');
?>

<!-- ===== Hero Section ===== -->
<section class="hero d-flex align-items-center text-center text-light" 
         style="background: url('assets/images/11.jpg') no-repeat center center/cover; height: 80vh;">
  <div class="container">
    <h1 class="display-4 fw-bold text-shadow">Donate Blood - Save a Life</h1>
    <p class="lead mt-3 fw-bold" style="font-size: 25px;">
      Join our mission to make every drop count. Register, find donors, or request help - all in one place.
    </p>
    <div class="mt-4">
      <a href="register.php" class="btn btn-danger btn-lg me-3 shadow-lg hover-btn">Become Donor</a>
      <a href="find.php" class="btn btn-danger btn-lg shadow-lg hover-btn">Find Donor</a>
    </div>
  </div>
</section>

<!-- ===== About Us Section ===== -->
<section class="about py-5 bg-light">
  <div class="container text-center" style="font-size: 22px;">
    <h2 class="fw-bold mb-4" style="color: #b30000; font-size: 40px;" id="about">About Us</h2>
    <p class="lead text-muted mx-auto" style="max-width: 1100px; font-size: 22px;">
      Our Blood Donation Management System connects voluntary donors with those in urgent need of blood. 
      We aim to simplify the donation process by creating a digital bridge between hospitals, donors, and patients. 
      Every contribution counts, and together we can make a difference.
    </p>

    <div class="row mt-5">
      <div class="col-md-4 mb-4">
        <div class="card p-4 border-0 custom-card text-center">
          <i class="bi bi-heart-fill display-5 mb-3" style="color: #b30000;"></i>
          <h5 class="fw-bold" style="color: #b30000; font-size: 30px;">Our Mission</h5>
          <p class="text-muted">To ensure no life is lost due to the unavailability of blood and to promote voluntary donation.</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card p-4 border-0 custom-card text-center">
          <i class="bi bi-people-fill display-5 mb-3" style="color: #b30000;"></i>
          <h5 class="fw-bold" style="color: #b30000; font-size: 30px;">Community</h5>
          <p class="text-muted">We bring together donors and recipients, fostering a culture of care and compassion.</p>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="card p-4 border-0 custom-card text-center">
          <i class="bi bi-droplet-half display-5 mb-3" style="color: #b30000;"></i>
          <h5 class="fw-bold" style="color: #b30000; font-size: 30px;">Transparency</h5>
          <p class="text-muted">Every donation is tracked with integrity, ensuring fairness and trust in our system.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

<!-- ===== Custom Styles ===== -->
<style>
/* ===== Hero Section ===== */
.text-shadow {
  text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
}

/* ===== Hover Button ===== */
.hover-btn {
  background-color: #b30000;
  color: white;
  transition: all 0.3s ease-in-out;
  border: none;
}
.hover-btn:hover {
  background-color: #ff1a1a;
  color: #fff;
  transform: scale(1.05);
  box-shadow: 0 0 15px rgba(255, 0, 0, 0.6);
}

/* ===== Cards ===== */
.custom-card {
  border-radius: 15px;
  background: white;
  box-shadow: 0 5px 15px rgba(0,0,0,0.15);
  transition: all 0.3s ease-in-out;
}
.custom-card:hover {
  transform: translateY(-10px) scale(1.03);
  box-shadow: 0 10px 25px rgba(179, 0, 0, 0.3);
}

/* ===== Navbar Hover ===== */
.navbar-nav .nav-link {
  color: #fff !important;
  font-weight: 500;
  position: relative;
  transition: all 0.3s;
}
.navbar-nav .nav-link::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -4px;
  width: 0%;
  height: 2px;
  background-color: #fff;
  transition: all 0.3s ease-in-out;
}
.navbar-nav .nav-link:hover::after {
  width: 100%;
}
.navbar-nav .nav-link:hover {
  color: #ffd700 !important;
}
</style>
