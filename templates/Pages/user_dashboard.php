<?php

echo $this->Html->css([
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css",
    "external/dashboard.css"
], ['block' => 'css']);

// custom css
echo $this->Html->css("custom.css");
echo $this->Html->css("external/dashboard.css");



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
                    '<i class="fas fa-medal me-2"></i>  Achievements',
                    ['controller' => 'Pages', 'action' => 'achievements'],
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
                <h2 class="mb-0">
                    <span id="welcomeMessage" class="me-1"></span>, <?= h($student->name ?? 'Student') ?>
                </h2>
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
                            <h2 class="mt-3 mb-0"><?= number_format($totalMerits->total ?? 0) ?></h2>
                            <div class="progress mt-3">
                                <div class="progress-bar" role="progressbar" style="width: <?= min(($totalMerits->total ?? 0) * 10, 100) ?>%"></div>
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
                            <h2 class="mt-3 mb-0"><?= $activitiesCount ?></h2>
                            <?php if (!empty($upcomingActivities)): ?>
                                <p class="text-muted mb-0"><?= count($upcomingActivities) ?> upcoming</p>
                            <?php else: ?>
                                <p class="text-muted mb-0">No upcoming activities</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!--Recent Activity -->
            <div class="col-md-4">
                <div class="card stat-card bg-light border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-clock text-info me-2"></i>
                            <h6 class="mb-0">Latest Activity</h6>
                        </div>
                        <?php if ($latestMerit): ?>
                            <h4 class="mt-3 mb-0"><?= h($latestMerit->activity->activity_name ?? 'N/A') ?></h4>
                            <p class="text-muted mb-0"><?= $latestMerit->created->format('d M Y') ?></p>
                        <?php else: ?>
                            <p class="mt-3 mb-0">No activities yet</p>
                                <?php endif; ?>
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
            <div class="row g-4 mb-5">
                <!-- Monthly progress Chart -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Merit Progress</h5>
                            <canvas id="monthlyProgressChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Merit Distribution Chart -->
                 <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Merit Distribution</h5>
                            <canvas id="distributionChart"></canvas>
                        </div>
                    </div>
                 </div>

                 <!-- Recent Merit History -->
                  <div class="row">
                    <div class="col-12">
                        <div class="card" style="margin-top: 20px;">
                            <div class="card-body">
                                <h5 class="card-title">Recent Merit History</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Activity</th>
                                                <th>Merit Type</th>
                                                <th>Points</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($recentMerits as $merit): ?>
                                                <tr>
                                                    <td><?= h($merit->activity->activity_name ?? 'N/A') ?></td>
                                                    <td><?= h($merit->merit->merit_type ?? 'N/A') ?></td>
                                                    <td><?= number_format($merit->points ?? 2) ?></td>
                                                    <td><?= $merit->created->format('d M Y') ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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

                <!-- Hint Card 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tip of the Day</h5>
                            <p class="card-text">Remember to check your merit points regularly to stay updated on your achievements!</p>
                        </div>
                    </div>
                </div>

                <!-- Hint Card 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Did You Know?</h5>
                            <p class="card-text">Participating in extracurricular activities can boost your merit points significantly!</p>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>


<!-- Greeting message -->
<script>
    document.addEventListener('DOMContentLoaded', function(){
        // Arrays of greetings for different times of the day
        const morningGreetings = [
            "Good morning",
            "Don't go hollow",
            "Welcome back",
            "Good day",
            "Frail Limb Nursery"
        ];

        const afternoonGreetings = [
            "Good afternoon",
            "Hello there",
            "Been Busy?",

        ];

        const eveningGreetings = [
            "Good evening",
            "Salutations",
            "Wrapping up for today",
            "Rage against the dying of the light"
        ];

        function getRandomGreeting() {
            const hour = new Date().getHours();
            let greetings = [];

            if (hour < 12) {
                greetings = morningGreetings;
            } else if (hour < 17) {
                greetings = afternoonGreetings;
            } else {
                greetings = eveningGreetings;
            }

            const randomIndex = Math.floor(Math.random() * greetings.length);
            return greetings[randomIndex];
        }

        // Get the welcome message element
        const welcomeElement = document.getElementById('welcomeMessage');

        // Set initial greeting with fade-in animation
        welcomeElement.style.opacity = 0;
        welcomeElement.textContent = getRandomGreeting();

        // Fade in the greeting
        setTimeout(() =>{
            welcomeElement.style.transition = 'opacity 0.5s ease-in-out';
            welcomeElement.style.opacity = '1';
        }, 100);
    });
</script>

<!-- css -->
<style>
   #welcomeMessage {
        display: inline-block;
        min-width: 150px;
        color: var(--bs-body-color); /* Use Bootstrap's body color variable */
    }

    /* Remove the media query and use Bootstrap's theme attribute */
    [data-bs-theme="dark"] #welcomeMessage {
        color: var(--bs-light);
    }

    h2 {
        color: inherit !important;
    }

   
</style>

<!-- Chart initialization -->
<?php $this->Html->script('https://cdn.jsdelivr.net/npm/chart.js', ['block' => true]); ?>
<?php $this->append('script'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Monthly Progress Chart
    const monthlyProgressChart = new Chart(document.getElementById('monthlyProgressChart'), {
        type: 'line',
        data: {
            labels: <?= json_encode(!empty($monthlyProgress) ? 
                collection($monthlyProgress)->extract('month')->toArray() : 
                array_map(function($m) { return date('F', mktime(0, 0, 0, $m, 1)); }, range(1, 12))
            ) ?>,
            datasets: [{
                label: 'Merit Points',
                data: <?= json_encode(!empty($monthlyProgress) ? 
                    collection($monthlyProgress)->extract('total')->toArray() : 
                    array_fill(0, 12, 0)
                ) ?>,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1,
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Merit Progress'
                },
                legend: {
                    display: true,
                    position: 'bottom'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Merit Distribution Chart
    new Chart(document.getElementById('distributionChart'), {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(collection($meritDistribution)->extract('merit_type')->toArray()) ?>,
            datasets: [{
                data: <?= json_encode(collection($meritDistribution)->extract('total')->toArray()) ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
<?php $this->end(); ?>


