
<?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css') ?>
<?= $this->Html->css('external/landing.css') ?>

<div class="landing-page">
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
        <div class="container">
            <?= $this->Html->link('Emerit', ['controller' => 'Pages', 'action' => 'landing'], ['class' => 'navbar-brand fw-bold']) ?>
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
    <section class="hero-section text-center py-5 bg-light rounded-4">
        <div class="container">
            <h1 class="display-4 fw-bold">Collect, Store, and View Your e-Merit</h1>
            <p class="lead text-muted mt-3">We provide a smooth and organized way to preserve students' merits with integrity.</p>
            <?= $this->Html->link('Get Started', ['controller' => 'Users', 'action' => 'register'], ['class' => 'btn btn-primary btn-lg mt-3']) ?>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-layer-group" style="font-size: 3rem; color: #0d6efd;"></i>
                    </div>
                    <h5 class="fw-bold">Collect</h5>
                    <p class="text-muted">Gather information such as Name, Matrix Number, and where the merits were gained.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-cloud-arrow-up" style="font-size: 3rem; color: #0d6efd;"></i>
                    </div>
                    <h5 class="fw-bold">Store</h5>
                    <p class="text-muted">Securely store merits in our cloud-based system for easy access anytime.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-icon mb-3">
                        <i class="fa-solid fa-chart-line" style="font-size: 3rem; color: #0d6efd;"></i>
                    </div>
                    <h5 class="fw-bold">View</h5>
                    <p class="text-muted">Easily view and track your merit points and achievements.</p>
                </div>
            </div>
        </div>
    </section>

</div>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js') ?>