<?php

echo $this->Html->css([
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css",
    "external/dashboard.css"
], ['block' => 'css']);



// Add required JavaScript
echo $this->Html->script([
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js",
    "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" // static chart
], ['block' => 'script']);
?>



<div class="d-flex h-100">
    <!-- Sidebar -->
    <div class="sidebar bg-white shadow-sm p-3" style="width: 250px;">
        <div class="d-flex align-items-center mb-4 px-2">
            <i class="fas fa-graduation-cap fs-4 me-2"></i>
            <span class="fs-4">Student Merit System</span>
        </div>


        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <?= $this->Html->link(
                    '<i class="fas fa-home me-2"></i> Dashboard',
                    ['controller' => 'Pages', 'action' => 'display', 'user_dashboard'],
                    ['class' => 'nav-link active', 'escape' => false]
                ) ?>
            </li>
            <li class="nav-item mb-2">
                <?= $this->Html->link(
                    '<i class="fas fa-trophy me-2"></i> My Activities',
                    ['controller' => 'Activities', 'action' => 'myActivities'],
                    ['class' => 'nav-link', 'escape' => false]
                ) ?>
            </li>
            <li class="nav-item mb-2">
                <?= $this->Html->link(
                    '<i class="fas fa-medal me-2"></i>  My Merits',
                    ['controller' => 'StudentMerits', 'action' => 'display', 'merit'],
                    ['class' => 'nav-link', 'escape' => false]
                ) ?>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 bg-light">
        <div class="container-fluid p-4">
            <!-- Welcome Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">Welcome back, <?= h($student->name ?? 'Student') ?></h2>
                <div class="text-muted">Last login: <?= date('d M Y') ?></div>
            </div>

            <!-- notification -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Upcoming Event:</strong> Sports Carnival registration closes in 3 days.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            </div>

            <!-- Key Stats Row -->
            <div class="row g-4 mb-5">
                <!-- Total Merit Points -->
                <div class="col-12">
                    <div class="card stat-card bg-light border-0">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-star text-primary me-2"></i>
                                <h6 class="mb-0">Total Merit Points</h6>
                            </div>
                            <h2 class="mt-3 mb-0">30</h2>
                            <div class="progress mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 30%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Secondary Stats Row -->
            <div class="row g-4 mb-5">
                <!-- Activities Joined -->
                <div class="col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-trophy text-success me-2"></i>
                                <h6 class="mb-0">Activities Joined</h6>
                            </div>
                            <h2 class="mb-2">3</h2>
                            <p class="text-muted mb-0">2 upcoming activities</p>
                        </div>
                    </div>
                </div>

                <!-- Current College -->
                <div class="col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-university text-primary me-2"></i>
                                <h6 class="mb-0">Current College</h6>
                            </div>
                            <h2 class="mb-0">Kolej Jasmine</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts and Activities Row -->
            <div class="row g-4">
                <!-- Merit Progress Chart -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Merit Progress</h5>
                            <canvas id="meritChart" height="300"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Activities -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Upcoming Activities</h5>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-0">
                                    <h6 class="mb-1">Sports Carnival</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        Saturday, 28th December 2024
                                    </small>
                                </div>
                                <div class="list-group-item border-0 px-0">
                                    <h6 class="mb-1">Placeholder Events</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        Saturday, 25th December 2024
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>

<?php $this->append('script'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('meritChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Merit Points',
                data: [30, 45, 60, 70, 90, 120],
                borderColor: 'rgb(13, 110, 253)',
                tension: 0.4,
                fill: true,
                backgroundColor: 'rgba(13, 110, 253, 0.1)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
<?php $this->end(); ?>


