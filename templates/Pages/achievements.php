<?php
$this->assign('title', 'My Achievements');

//external css
$this->Html->css('external/achievement', ['block' => true]);
?>

<div class="container-fluid p-4">
    <!-- Achievement Progress Overview -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-light border-0">
                <div class="card-body">
                    <h4 class="card-title mb-3">Achievement Progress</h4>
                    <div class="progress" style="height: 25px;">
                        <?php
                        $nextMilestone = ceil($totalPoints / 50) * 50;
                        $progress = ($totalPoints % 50) / 50 * 100;
                        ?>
                        <div class="progress-bar" role="progressbar" 
                             style="width: <?= $progress ?>%;" 
                             aria-valuenow="<?= $progress ?>" 
                             aria-valuemin="0" 
                             aria-valuemax="100">
                            <?= number_format($totalPoints, 1) ?> / <?= $nextMilestone ?> Points
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Achievement Categories -->
    <div class="row g-4">
        <!-- Merit Milestones -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-award me-2"></i>Merit Milestones</h5>
                </div>
                <div class="card-body">
                    <div class="achievement-list">
                        <!-- Bronze Achievement -->
                        <div class="achievement-item mb-4 <?= $totalPoints >= 50 ? 'achieved' : 'locked' ?>">
                            <div class="d-flex align-items-center">
                                <div class="achievement-icon me-3">
                                    <i class="fas fa-medal fa-2x <?= $totalPoints >= 50 ? 'text-warning' : 'text-secondary' ?>"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Bronze Achiever</h6>
                                    <p class="mb-0 small text-muted">Earn 50 merit points</p>
                                </div>
                            </div>
                        </div>

                        <!-- Silver Achievement -->
                        <div class="achievement-item mb-4 <?= $totalPoints >= 100 ? 'achieved' : 'locked' ?>">
                            <div class="d-flex align-items-center">
                                <div class="achievement-icon me-3">
                                    <i class="fas fa-medal fa-2x <?= $totalPoints >= 100 ? 'text-secondary' : 'text-secondary' ?>"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Silver Achiever</h6>
                                    <p class="mb-0 small text-muted">Earn 100 merit points</p>
                                </div>
                            </div>
                        </div>

                        <!-- Gold Achievement -->
                        <div class="achievement-item <?= $totalPoints >= 200 ? 'achieved' : 'locked' ?>">
                            <div class="d-flex align-items-center">
                                <div class="achievement-icon me-3">
                                    <i class="fas fa-medal fa-2x <?= $totalPoints >= 200 ? 'text-warning' : 'text-secondary' ?>"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1">Gold Achiever</h6>
                                    <p class="mb-0 small text-muted">Earn 200 merit points</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Achievements -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-success text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-star me-2"></i>Activity Achievements</h5>
                </div>
                <div class="card-body">
                    <div class="achievement-item mb-4">
                        <div class="d-flex align-items-center">
                            <div class="achievement-icon me-3">
                                <i class="fas fa-running fa-2x text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Sports Enthusiast</h6>
                                <p class="mb-0 small text-muted">Participate in sports activities</p>
                            </div>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="d-flex align-items-center">
                            <div class="achievement-icon me-3">
                                <i class="fas fa-users fa-2x text-success"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Team Player</h6>
                                <p class="mb-0 small text-muted">Join group activities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Special Achievements -->
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-header bg-info text-white">
                    <h5 class="card-title mb-0"><i class="fas fa-trophy me-2"></i>Special Achievements</h5>
                </div>
                <div class="card-body">
                    <div class="achievement-item mb-4">
                        <div class="d-flex align-items-center">
                            <div class="achievement-icon me-3">
                                <i class="fas fa-graduation-cap fa-2x text-info"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Academic Excellence</h6>
                                <p class="mb-0 small text-muted">Excel in academic activities</p>
                            </div>
                        </div>
                    </div>
                    <div class="achievement-item">
                        <div class="d-flex align-items-center">
                            <div class="achievement-icon me-3">
                                <i class="fas fa-hands-helping fa-2x text-info"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Community Leader</h6>
                                <p class="mb-0 small text-muted">Lead community service activities</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>