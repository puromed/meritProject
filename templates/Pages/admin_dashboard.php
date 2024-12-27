<?php 
echo $this->Html->css("custom.css", ['block' => true]);
echo $this->Html->css("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css");
?>

<div class="container-fluid dashboard-container py-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-card bg-primary text-white rounded-4 p-4">
                <h2 class="mb-3"><i class="fas fa-chart-line me-2"></i>Admin Dashboard</h2>
                <p class="mb-0 opacity-75">Welcome back! Here's what's happening with your merit system.</p>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="stat-card h-100 rounded-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Total Students</p>
                            <h3 class="mb-0"><?= isset($studentCount) ? $studentCount : 0 ?></h3>
                        </div>
                        <div class="stat-icon bg-primary-subtle rounded-circle p-3">
                            <i class="fas fa-users text-primary"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success-subtle text-success">
                            <i class="fas fa-arrow-up me-1"></i>12% increase
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card h-100 rounded-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Total Merits</p>
                            <h3 class="mb-0"><?= isset($meritCount) ? $meritCount : 0 ?></h3>
                        </div>
                        <div class="stat-icon bg-success-subtle rounded-circle p-3">
                            <i class="fas fa-award text-success"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success-subtle text-success">
                            <i class="fas fa-arrow-up me-1"></i>8% increase
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card h-100 rounded-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Active Activities</p>
                            <h3 class="mb-0"><?= isset($activityCount) ? $activityCount : 0 ?></h3>
                        </div>
                        <div class="stat-icon bg-warning-subtle rounded-circle p-3">
                            <i class="fas fa-calendar-alt text-warning"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-warning-subtle text-warning">
                            <i class="fas fa-minus me-1"></i>Same as last week
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card h-100 rounded-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <p class="text-muted mb-1">Pending Requests</p>
                            <h3 class="mb-0"><?= isset($pendingRequests) ? $pendingRequests : 0 ?></h3>
                        </div>
                        <div class="stat-icon bg-danger-subtle rounded-circle p-3">
                            <i class="fas fa-clock text-danger"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-danger-subtle text-danger">
                            <i class="fas fa-arrow-up me-1"></i>3 new requests
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activities and Quick Actions -->
    <div class="row g-4">
        <!-- Recent Activities -->
        <div class="col-md-8">
            <div class="card rounded-4 border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-history me-2"></i>Recent Activities
                        </h5>
                        <a href="<?= $this->Url->build(['controller' => 'Activities', 'action' => 'index']) ?>" class="btn btn-sm btn-outline-primary rounded-pill">View All</a>
                    </div>
                    <?php if (!empty($recentActivities)): ?>
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Activity</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentActivities as $activity): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="activity-icon bg-primary-subtle rounded-circle p-2 me-3">
                                                    <i class="fas fa-trophy text-primary"></i>
                                                </div>
                                                <?= h($activity->title) ?>
                                            </div>
                                        </td>
                                        <td><?= $activity->created->format('M d, Y') ?></td>
                                        <td>
                                            <span class="badge bg-<?= $activity->availability === 'open' ? 'success' : 'secondary' ?>-subtle text-<?= $activity->availability === 'open' ? 'success' : 'secondary' ?> rounded-pill">
                                                <?= ucfirst(h($activity->availability)) ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= $this->Url->build(['controller' => 'Activities', 'action' => 'view', $activity->id]) ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?= $this->Url->build(['controller' => 'Activities', 'action' => 'edit', $activity->id]) ?>" class="btn btn-sm btn-outline-secondary rounded-pill">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No recent activities found</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-md-4">
            <div class="card rounded-4 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-4">
                        <i class="fas fa-bolt me-2"></i>Quick Actions
                    </h5>
                    <div class="quick-actions">
                        <?= $this->Html->link(
                            '<i class="fas fa-plus-circle me-2"></i>New Activity',
                            ['controller' => 'Activities', 'action' => 'add'],
                            ['class' => 'btn btn-primary w-100 mb-3 rounded-pill', 'escape' => false]
                        ) ?>
                        <?= $this->Html->link(
                            '<i class="fas fa-user-plus me-2"></i>Add Student',
                            ['controller' => 'Students', 'action' => 'add'],
                            ['class' => 'btn btn-outline-primary w-100 mb-3 rounded-pill', 'escape' => false]
                        ) ?>
                        <?= $this->Html->link(
                            '<i class="fas fa-medal me-2"></i>Manage Merits',
                            ['controller' => 'Merits', 'action' => 'index'],
                            ['class' => 'btn btn-outline-primary w-100 rounded-pill', 'escape' => false]
                        ) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>