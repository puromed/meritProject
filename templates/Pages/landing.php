<?php
$this->Html->css([
    'landing/main',
    'landing/animations',
    'landing/dark-mode',
    'external/landing'
], ['block' => true]);

// Load external CDN resources
$this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css', ['block' => true]);
$this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', ['block' => true]);
?>

<style>


/* Preloader */
#preloader {
    position: fixed;
    width: 100%;
    height: 100%;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
}

.spinner {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #007bff;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}
</style>

<div id="preloader">
    <div class="spinner"></div>
</div>

<div class="landing-page">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light glass-effect sticky-top rounded-2">
        <div class="container">
            <?= $this->Html->link('Emerit', ['controller' => 'Pages', 'action' => 'landing'], ['class' => 'navbar-brand']) ?>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if (!$this->Identity->isLoggedIn()): ?>
                        <li class="nav-item">
                            <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'nav-link']) ?>
                        </li>
                        <li class="nav-item">
                            <?= $this->Html->link('Register', ['controller' => 'Users', 'action' => 'register'], ['class' => 'nav-link btn btn-primary text-white px-4 ms-2']) ?>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

  <!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to Maradock</h1>
            <p class="hero-subtitle">Your one-stop student hub for managing courses, assignments, and academic progress</p>
            <div class="hero-cta">
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']) ?>" 
                   class="btn btn-light btn-lg me-3">
                    <i class="fas fa-sign-in-alt me-2"></i>Login
                </a>
                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']) ?>" 
                   class="btn btn-outline-light btn-lg">
                    <i class="fas fa-user-plus me-2"></i>Sign Up
                </a>
            </div>
        </div>
    </div>
    
    <!-- Shape Divider -->
    <div class="custom-shape-divider-bottom">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" 
                  class="shape-fill"></path>
        </svg>
    </div>
</div>

<!-- Features Section -->
<section class="features-section" style="padding-top: 50px;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Why Emerit?</h2>
                <p class="text-muted">Emerit is a comprehensive merit tracking system designed to help students manage and showcase their academic achievements.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-medal"></i>
                        </div>
                        <h5>Merit Tracking</h5>
                        <p>Automatically track your merits and achievements.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-calendar"></i>
                        </div>
                        <h5>Activity Management</h5>
                        <p>Manage your activities and events.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card h-100">
                        <div class="feature-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <h5>College Letters</h5>
                        <p>Generate and manage college letters effortlessly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <!-- How It Works Section -->
    <section class="how-it-works-section py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">How It Works</h2>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number mb-3">1</div>
                        <h5>Register Account</h5>
                        <p class="text-muted">Create your student account with your university credentials</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number mb-3">2</div>
                        <h5>Join Activities</h5>
                        <p class="text-muted">Browse and participate in various university activities</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number mb-3">3</div>
                        <h5>Earn Points</h5>
                        <p class="text-muted">Get merit points for your participation and achievements</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number mb-3">4</div>
                        <h5>Track Progress</h5>
                        <p class="text-muted">Monitor your growth and download merit letters</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
<section class="cta-section py-5" style="background: linear-gradient(135deg, #007bff, #6c63ff); color: white;">
    <div class="container">
        <div class="glass-effect p-5 rounded-4 text-center">
            <h2 class="fw-bold mb-4 animate__animated animate__fadeInDown">Ready to Start Your Journey?</h2>
            <p class="lead mb-4 animate__animated animate__fadeInUp">Discover a platform designed to help you track and showcase your academic achievements effortlessly.</p>
            <?= $this->Html->link('Register Now', ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-primary btn-lg px-5 py-2 rounded-pill animate__animated animate__pulse animate__infinite']) ?>
        </div>
    </div>
</section>


<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') ?>

<script>
// Preloader Removal
window.addEventListener('load', function () {
    document.getElementById('preloader').style.display = 'none';
});

// Counter Animation
const counters = document.querySelectorAll('.counter');
const speed = 200; // Adjust speed of animation (lower = faster)

counters.forEach(counter => {
    const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(updateCount, 10);
        } else {
            counter.innerText = target;
        }
    };

    updateCount();
});
</script>
