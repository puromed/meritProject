<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>
<?= $this->Html->css('external/landing.css') ?>
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css') ?>

<style>
/* Default color for the title */
.hero-title {
    color: while;
}

/* Force the text color to white in dark mode */
@media (prefers-color-scheme: dark) {
    .hero-title {
        color: white !important;
    }
}

/* Smooth Scrolling */
html {
    scroll-behavior: smooth;
}

/* Feature Card Hover Effects */
.feature-card {
    text-align: center;
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.feature-icon i {
    font-size: 40px;
    color: #007bff;
    margin-bottom: 10px;
}

/* Stats Section Counter */
.stats-section .glass-effect {
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

/* How It Works Step Number */
.step-number {
    display: inline-block;
    width: 50px;
    height: 50px;
    background: #007bff;
    color: #fff;
    border-radius: 50%;
    line-height: 50px;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
    transition: transform 0.3s;
}

.text-center:hover .step-number {
    transform: scale(1.2);
}

/* CTA Section */
.cta-section {
    background: linear-gradient(135deg, #007bff, #6c63ff);
    color: #fff;
    text-align: center;
    padding: 60px 20px;
}

.cta-section .btn-primary {
    background: #fff;
    color: #007bff;
    border: none;
    font-size: 18px;
    padding: 10px 30px;
    border-radius: 50px;
    transition: background 0.3s, color 0.3s;
}

.cta-section .btn-primary:hover {
    background: #007bff;
    color: #fff;
}

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
<section class="hero-section rounded-4" style="
    background: url('<?= $this->Url->build('/img/convo.jpg') ?>') center center / cover no-repeat;
    color: white;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: relative;
    margin-bottom: 50px;">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInLeft hero-title">Track Your Academic Journey</h1>
                <p class="lead mb-4 text-white animate__animated animate__fadeInLeft animate__delay-1s">
                    Transform your university experience with our comprehensive merit tracking system. Record, manage, and showcase your achievements all in one place.
                </p>
                <?= $this->Html->link('Get Started', ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-primary btn-lg px-5 py-2 rounded-pill animate__animated animate__fadeInUp animate__delay-2s']) ?>
                <p class="mt-3 animate__animated animate__fadeIn animate__delay-3s text-white">
                    Already have an account? <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'text-white fw-bold']) ?>
                </p>
            </div>
        </div>
    </div>
</section>

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
