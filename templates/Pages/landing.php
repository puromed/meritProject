
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>
<?= $this->Html->css('external/landing.css') ?>

<div class="landing-page">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light glass-effect sticky-top">
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
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Track Your Academic Journey</h1>
                    <p class="lead mb-4">Transform your university experience with our comprehensive merit tracking system. Record, manage, and showcase your achievements all in one place.</p>
                    <?= $this->Html->link('Get Started', ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-primary btn-lg']) ?>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://illustrations.popsy.co/white/student-work.svg" alt="Student Achievement" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold"> Why Emerit?</h2>
                <p class="text-muted">Emerit is a comprehensive merit tracking system designed to help students manage and showcase their academic achievements. Whether you're a high school student or a university scholar, Emerit provides a seamless way to collect, store, and view your e-merits.</p>
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

    <!-- Stats Section -->
    <section class="stats-section py-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <div class="glass-effect p-4 rounded-4">
                        <h2 class="fw-bold mb-0">1000+</h2>
                        <p class="text-muted">Active Students</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-effect p-4 rounded-4">
                        <h2 class="fw-bold mb-0">500+</h2>
                        <p class="text-muted">Activities Available</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-effect p-4 rounded-4">
                        <h2 class="fw-bold mb-0">5000+</h2>
                        <p class="text-muted">Merit Points Awarded</p>
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

     <section class="cta-section py-5">
        <div class="container">
            <div class="glass-effect p5 rounded-4 text-center">
                <h2 class="fw-bold mb-4">Ready to Start Your Journey?</h2>
                <p class="lead mb-4">Join Thousands of Students already enrolled</p>
                <?= $this->Html->link('Get Started', ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-primary btn-lg']) ?>
                <p class="text-muted mt-3">Already have an account? <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'text-white']) ?></p>
            </div>
        </div>
    </section>
</div>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') ?>